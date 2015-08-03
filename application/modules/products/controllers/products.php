<?php
/**
* 
*/
class Products extends MY_Controller
{
	var $category, $brands;
	function __construct()
	{
		parent::__construct();

        $this->load->module('categories');
		$this->load->model('products_model');
	}

	function add()
	{
		$data['page_heading'] = 'Products';
        $data['content_view'] = 'products/add_products';
        $data['categoties'] = $this->parent_categories();
        $data['brand'] = $this->brands();
        $this->template->call_backend_template($data);
		
	}

	public function parent_categories()
	{
		$parent_cat = $this->categories->get_parent_categories();

		$this->category .= '<select class="form-control m-b" name="category" id="category">';
		$this->category .= '<option value="" selected="true" disabled="true">**Select a Category**</option>';
			foreach ($parent_cat as $key => $value) {
				$this->category .= '<option value="'.$value["category_id"].'">'.$value["category_name"].'</option>';
			}
		$this->category .= '</select>';
		// echo "<pre>";print_r($this->category);die();
		return $this->category;
	}

	function get_child_categories($parent_id=100)
	{
		$child_cat = $this->categories->get_sub_categories($parent_id);
		$child_cat = json_encode($child_cat);
		echo $child_cat;
	}

	function brands()
	{
		$brand = $this->products_model->get_brands();

		$this->brands .= '<select class="form-control m-b" name="brand" id="brand">';
		$this->brands .= '<option value="" selected="true" disabled="true">**Select a Brand**</option>';
			foreach ($brand as $key => $value) {
				$this->brands .= '<option value="'.$value["brand_id"].'">'.$value["brand_name"].'</option>';
			}
		$this->brands .= '</select>';
		// echo "<pre>";print_r($this->category);die();
		return $this->brands;

	}
}
?>