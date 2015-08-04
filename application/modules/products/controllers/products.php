<?php
/**
* 
*/
class Products extends MY_Controller
{
	var $brands_drop, $sub_drop;
	function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
		
	}

	public function index($access_level = 'admin'){
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
    	$data['page_heading'] = 'Products | Add Product';
    	$data['content_view'] = 'products/add_products';
    	$data['catetgories'] = $this->parent_categories_dropdown();
    	$data['brands'] = $this->get_brands();

    	$this->template->call_backend_template($data);
    }

    function add_products()
    {
    	$name = $this->input->post('product_name');
    	$brand = $this->input->post('brand');
    	$category = $this->input->post('sub_cat');
    	$color = $this->input->post('color');
    	$price = $this->input->post('price');
    	$description = $this->input->post('description');

    	$insert = $this->products_model->add_product($name,$brand,$category,$color,$price,$description);

    	redirect('products');

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

	function get_brands()
	{
		$brands_data = $this->products_model->get_brands();

		$this->brands_drop .= '<select class="chosen-select form-control" style="width:320px;" tabindex="2" name="brand" id="brand">';
		$this->brands_drop .= '<option value="" selected="true" disabled="true">**Select a Brand**</option>';
		foreach ($brands_data as $key => $value) {
			$this->brands_drop .= '<option value="'.$value["brand_id"].'">'.$value["brand_name"].'</option>';
		}
		$this->brands_drop .= '</select>';

		return $this->brands_drop;
	}


	function ajax_get_sub_categories($parent_id)
	{
		$sub_categories = $this->categories->get_sub_categories($parent_id);

            $this->sub_drop .= '<option value="" selected="true" disabled="true">** Choose a Sub-Category **</option>';
        foreach ($sub_categories as $key => $value) {
            $this->sub_drop .= '<option value="'.$value["category_id"].'">'.$value["category_name"].'</option>';
        }

		$sub_categories = json_encode($this->sub_drop ,JSON_PRETTY_PRINT);

		echo $sub_categories;
	}

}
?>