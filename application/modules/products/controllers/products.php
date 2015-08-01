<?php
/**
* 
*/
class Products extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();

        $this->load->module('categories');
		$this->load->model('products_model');
	}

	function add()
	{
		
	}

	function get_parent_categories()
	{
		$parent_cat = $this->categories->get_parent_categories();

		echo "<pre>";print_r($parent_cat);
	}

	function get_child_categories($parent_id=100)
	{
		$child_cat = $this->categories->get_sub_categories($parent_id);

		echo "<pre>";print_r($child_cat);
	}
}
?>