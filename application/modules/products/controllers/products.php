<?php
/**
* 
*/
class Products extends MY_Controller
{
	var $sub_drop, $brand_drop;
	function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
		$data['page_heading'] = 'Products';
	}

	public function index($access_level = NULL){
		//SESSION DATA SELECTION FOR ACCESS LEVEL HERE. EQUATE TO ABOVE PARAM
		switch ($access_level) {
			case 'admin':
				$this->product_list();
		    	// $data['page_heading'] = 'Products';
		    	// $data['content_view'] = 'products/products_v';
		    	// $data['product_data'] = $this->products_model->get_products();
		    	// $this->template->call_backend_template($data);
    		case 'member':
    			// redirect("home");
				break;
			
			default:
				// MEMBER
				break;
		}

    }

    function add()
    {
    	$data['content_view'] = 'products/add_products';
    	$data['categories'] = $this->parent_categories_dropdown();
    	$data['brands'] = $this->brand_drop_down();
    	$this->template->call_backend_template($data);
    }

    function add_products()
    {
    	$upload_image = 'cover';
		$upload_path = '././assets/product_images/products_uploads/covers/';
		$files = $_FILES['cover'];

		$file_ext = explode(".", $files['name']);
        $file_ext = end($file_ext);

		$allowed = array('gif','jpg','png','jpeg');

		if(in_array($file_ext, $allowed)){
			$image_name = $files['name'];
    		$temp_path = $files['tmp_name'];
    		move_uploaded_file($temp_path, $upload_path.$image_name);
    		$path = base_url().'assets/product_images/products_uploads/covers/'.$image_name;
    		
		}else{
			print "Image format not supported";
		}

		$insert = $this->products_model->add_product($path);

    	if(!$insert){print "An error occured as the product was being inserted please try again or if the problem persist contact the administrator.!!";}
    	else{redirect(base_url().'products/product_list');}
    }

    function view_products($access_level = NULL){
    	//SESSION DATA SELECTION FOR ACCESS LEVEL HERE. EQUATE TO ABOVE PARAM
		switch ($access_level) {
			case 'admin':
		    	$data['page_heading'] = 'Products';
		    	$data['content_view'] = 'products/products_v_all';
		    	$data['product_data'] = $this->products_model->get_products();
		    	// echo "<pre>";print_r($data['product_data']);
		    	$this->template->call_backend_template($data);
    		case 'member':
    			// redirect("home");
				break;
			
			default:
				// MEMBER
				break;
		}
    }

    public function product_list()
	{
		// $data['display_date'] = $this->getlatestaddition();
		// $data['model_count'] = $this->m_models->getmodelcount();
		$products = $this->products_model->get_products();
		$data['table'] = $this->createproducts($products,'table');
		$data['grid'] = $this->createproducts($products);
		$data['categories'] = $this->parent_categories_dropdown();
		$data['pages'] = $this->product_pagination();
		$data['content_view'] = 'products/products_v_all';
		// echo "<pre>";print_r($data['grid']);die();
		$this->template->call_backend_template($data);
	}

    public function createproducts($products,$type = 'grid')
	{
		$products_section = '';
		
		// echo "<pre>";print_r($products);die();
		if($products)
		{
			switch ($type) {
			case 'grid':
				foreach ($products as $key => $value) {
					// $display_date = date('dS F, Y', strtotime($value['dob']));
					$products_section .= '<div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation" style="padding:0px;">
                            	<img src="'.$value['cover_image'].'" class="img-responsive" alt="Cover Image" style="width: 252.75px; height: 168.5px;" />
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    Ksh. '.$value['price'].'
                                </span>
                                <small class="text-muted">
                                    '.$value['category_name'].'
                                </small>
                                <a href="#" class="product-name"> 
                                    '. $value['product_name'].'
                                </a>
                                <div class="small m-t-xs">
                                    '.$value['description'].'
                                </div>
                                <div class="m-t text-righ">

                                    <a href="'.base_url().'products/product_profile/'.$value['product_id'].'" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
				}
				break;
			
			case 'table':
				$counter = 1;
				foreach ($products as $key => $value) {
					$edit_redirect = base_url().'index.php/products/edit_product/'.$value['product_id'];
					$products_section .= '<tr>';
					$products_section .= '<td>'.$counter.'</td>';
					$products_section .= '<td>'.$value['category_name'].'</td>';
					$products_section .= '<td>'.$value['product_name'].'</td>';
					$products_section .= '<td>'.$value['price'].'</td>';
					$products_section .= '<td>'.$value['brand_name'].'</td>';
					$products_section .= '<td>'.$value['added_on'].'</td>';
					$products_section .= '<td><a class="btn btn-w-m btn-primary" href="'.$edit_redirect.'">Edit Product</a></td>';
					$products_section .= '</tr>';

					$counter++;
				}
				break;
			default:
				
				break;
			}
		}
		else
		{
			$products_section = '<div class = "empty"><center><h2>No Products Added Yet. </h2><a class = "btn btn-primary btn-outline" href = "'.base_url().'products/add">Add one Here</a></center>
			</div>';
		}

		return $products_section;
	}

	function product_profile($id)
	{
		$data['page_heading'] = 'Products';
    	$data['content_view'] = 'products/product_profile';
    	$data['product_details'] = $this->products_model->get_products($id);
    	// echo "<pre>";print_r($data['product_data']);
    	$this->template->call_backend_template($data);
		// echo "<pre>";print_r($data);
	}

    function edit_product($product_id){
    	$product_details = $this->products_model->get_products($product_id);
    	$categories = $this->products_model->get_categories();
    	$brands = $this->products_model->get_brands();
    	// echo "<pre>";print_r($product_details);
    	// echo "<pre>";print_r($categories);
    	// echo "<pre>";print_r($brands);
    	$data['product_details'] = $product_details;
    	$data['categories'] = $categories;
    	$data['brands'] = $brands;

    	$data['page_heading'] = 'Edit Product';
    	$data['content_view'] = 'products/edit_products_v';

    	$this->template->call_backend_template($data);

    }

    function update_details(){
    	// echo "<pre>"; print_r($this->input->post());
    	$product_id = $this->input->post('product_id');
    	$product_name = $this->input->post('product_name');
    	$desc = $this->input->post('description');
    	$color = $this->input->post('color');
    	$price = $this->input->post('price');
    	$brand = $this->input->post('brand');
    	$category = $this->input->post('category');
    	// UPDATE `zerocorp`.`products` SET `brand_id` = '5' WHERE `products`.`product_id` = 2;
    	$sql = "
    	UPDATE products SET 
    	product_name = '$product_name',
    	description = '$desc',
    	color = '$color',
    	price = $price,
    	brand_id = $brand,
    	category_id = $category
    	WHERE product_id = $product_id
    	";

		$result = $this->db->query($sql);
		if ($result) {
			redirect(base_url().'index.php/products/index/admin');
		}
    }

	function get_all_products()
	{
		$products = $this->products_model->get_all_products();

		echo "<pre>";print_r($products);
	}

	function get_product($id = NULL)
	{
		$product = $this->products_model->get_product($id);

		echo "<pre>";print_r($product);
	}
	function get_products_by_category($category_id){
		$product = $this->products_model->get_products_by_category($category_id);

		echo "<pre>";print_r($product);
	}

	function brand_drop_down()
	{
		$brands_data = $this->products_model->get_brands();

		$this->brand_drop .= '<select class="chosen-select form-control required" style="width:320px;" tabindex="2" name="brand" id="brand">';
		$this->brand_drop .= '<option value="" selected="true" disabled="true">**Select a Brand**</option>';
		foreach ($brands_data as $key => $value) {
			$this->brand_drop .= '<option value="'.$value["brand_id"].'">'.$value["brand_name"].'</option>';
		}
		$this->brand_drop .= '</select>';

		return $this->brand_drop;

	}

	function ajax_get_sub_categories($id)
	{
		$sub_categories_data = $this->products_model->get_sub_categories($id);

		foreach ($sub_categories_data as $key => $value) {
			$this->sub_drop .= '<option value="'.$value["category_id"].'">'.$value["category_name"].'</option>';
		}

		echo json_encode($this->sub_drop);
	}


	function ajax_products_images($id)
	{
		

		$return_data = array();
		$pictures_section = '';
		$all_pictures = '';
		$product_images = $this->products_model->get_product_image($id);
		// $model_images = $this->m_models->getmodelimages($model_id);

		if ($product_images) {
			$pictures_section .= '<div class="carousel slide" id="carousel2">
                                <ol class="carousel-indicators">';
            $counter = 0;
            $first_five = array_slice($product_images, 0, 5);
			foreach ($first_five as $key => $value) {
				if($counter == 0){
					$pictures_section .= '<li data-slide-to = "'.$counter.'" data-target = "#carousel2" class = "active"></li>';
				}
				else
				{
					$pictures_section .= '<li data-slide-to = "'.$counter.'" data-target = "#carousel2"></li>';
				}
				$counter++;
			}
			$pictures_section .='</ol>
			<div class="carousel-inner">';

			$counter = 0;
			foreach ($first_five as $key => $value) {
				if ($counter == 0) {
					$pictures_section .= '<div class = "item active">';
				}
				else
				{
					$pictures_section .= '<div class = "item">';
				}

				$pictures_section .= '<img alt="image"  class="img-responsive carousel_image" src="'.$value['path'].'">
				<div class = "carousel-caption">
					<p>#</p>
				</div></div>';

				$counter++;

			}
			$pictures_section .= '
                                <a data-slide="prev" href="#carousel2" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel2" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div></div>';
            $first_three = array_slice($product_images, 0, 3);
            $pictures_section .= '<br/><center><div class = "row">';
            foreach ($first_three as $key => $value) {
            	$pictures_section .= '<a href = "'.$value['path'].'" class = "fancybox" title = "#">
            	<img src = "'.$value['path'].'" alt = "Product Image"
            	</a>';
			}
            $pictures_section .= '</div></center>';

            foreach ($product_images as $key => $value) {
            	$all_pictures .= '<a href = "'.$value['path'].'" class = "fancybox" title = "Product Image">
            	<img src = "'.$value['path'].'" alt = "product_images"
            	</a>';
            }
		}
		else
		{
			$pictures_section .= '<div class = "no_data">
			<center><h1>No images Here!</h1>
			<a class = "btn btn-danger btn-outline upload_caller">Scroll Down to Upload Some</a></center>
			</div>';

			$all_pictures = $pictures_section;
		}

		$return_data['pictures_section'] = $pictures_section;
		$return_data['all_pictures'] = $all_pictures;

		echo json_encode($return_data);
	}

	function display_products(){
		$data['table'] = $this->createproducts('table');
		$data['grid'] = $this->createproducts();
		$data['categories'] = $this->parent_categories_dropdown();
		$products = $this->products_model->get_products();
		// echo "<pre>";print_r($products);echo "</pre>";exit;
		$salenda = NULL;
		$div_split_counter = 0;
		foreach ($products as $key => $value) {
		$div_split_counter = $div_split_counter + 1;
		if (($div_split_counter % 4) == 0) {
			$salenda .= '<div class = "row">';
		}
		$products_img = $this->products_model->get_product_image($value['product_id']);
// echo "<pre>";print_r($products_img);die();
			$salenda .= '
			<div class="col-md-3">
	            <div class="ibox">
	                <div class="ibox-content-products product-box">

	                    <div class="product-imitation">
        					<img src="'.$products_img[0]['path'].'">
	                    </div>
	                  <div class="product-desc">
                                <a href="#" class="product-name"> 
                                    '. $value['product_name'].'
                                </a>
                                <span class="product-price">
                                    '.$value['price'].'
                                </span>
                                </br>
                                <small class="text-muted">
                                    '.$value['category_name'].'
                                </small>
                                <div class="small m-t-xs">
                                    '.$value['description'].'
                                </div>
	                        <div class="m-t text-righ">
	                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
	                            <a href="#"><i style = "float:right;" class = "ion ion-bag fa-2x"></i></a>
	                        </div>
	                    </div>
	                </div>
	            </div>
    		</div>
			';

			if (($div_split_counter%4) == 0) {
			$salenda .= '</div>';
			}
			
		}//foreach
		$categories = $this->products_model->get_parent_categories();
		$sidebar = NULL;

		// echo "<pre>";print_r($categories);echo "</pre>";exit;
		foreach ($categories as $key => $value) {
			$sub_categories = $this->products_model->get_sub_categories($value['category_id']);
			$sidebar .= '<ul>';
			$sidebar .= '<li class="has-sub">';
			$sidebar .= '
        	<a href="#" >'.$value['category_name'].'</a>
			';
			if (count($sub_categories)>0) {
				// echo "FIRED";
				$sidebar.= '
				<ul>';
				foreach ($sub_categories as $key => $value) {
				$sidebar.= '<li style = "color:red;"><a href="#">'.$value['category_name'].'</a></li>';
				}
				$sidebar .= '</ul>';
			}
			$sidebar .= '</li>';
			$sidebar .= '</ul>';
		}
		$data['sidebar'] = $sidebar;
		$data['products_grid'] = $salenda;
		$data['content_view'] = 'products/products_public';


		// $data['content_view'] = 'products/products_grid';

    	$this->template->call_frontend_template($data);
	}

	function ajax_grid($search_parameter='')
	{
		$search = $this->products_model->search_product($search_parameter);

		$grid = $this->createproducts($search);
		// echo "<pre>";print_r($grid);die();
		echo json_encode($grid);
	}

	function ajax_category_filter($category_id)
	{
		if($category_id == 0){$category_id = NULL;}
		$products = $this->products_model->get_products($product_id=NULL,$category_id);

		$grid = $this->createproducts($products);
		// echo "<pre>";print_r($grid);die();
		echo json_encode($grid);
	}

	function product_pagination()
	{
		$pages = $this->products_model->product_pagination();
		// echo $pages;
		return $pages;
	}

}
?>