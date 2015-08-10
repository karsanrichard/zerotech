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
		    	$data['page_heading'] = 'Products';
		    	$data['content_view'] = 'products/products_v';
		    	$data['product_data'] = $this->products_model->get_products();
		    	$this->template->call_backend_template($data);
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
    	$insert = $this->products_model->add_product();

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
		$data['table'] = $this->createproducts('table');
		$data['grid'] = $this->createproducts();
		$data['categories'] = $this->parent_categories_dropdown();
		$data['content_view'] = 'products/products_v_all';
		// echo "<pre>";print_r($data['grid']);die();
		$this->template->call_backend_template($data);
	}

    public function createproducts($type = 'grid')
	{
		$products_section = '';
		$products = $this->products_model->get_products();
		if($products)
		{
			switch ($type) {
			case 'grid':
				foreach ($products as $key => $value) {
					// $display_date = date('dS F, Y', strtotime($value['dob']));
					$products_section .= '<div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ PHOTO ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    '.$value['price'].'
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

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
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
			$products_section = '<div class = "empty"><center><h2>No Products Added Yet. </h2><a class = "btn btn-primary btn-outline" href = "'.base_url().'models/newmodel">Add one Here</a></center>
			</div>';
		}

		return $products_section;
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
			$sidebar .= '<li>';
			$sidebar .= '
        	<a href="#">'.$value['category_name'].'</a>
			';
			if (count($sub_categories)>0) {
				// echo "FIRED";
				$sidebar.= '
				<ul class="indented">';
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


}
?>