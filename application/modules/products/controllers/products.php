<?php
/**
* 
*/
class Products extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
	}

	function get_all_products()
	{
		$products = $this->products_model->get_all_products();

		echo "<pre>";print_r($products);
	}

	function get_product($id=0)
	{
		$product = $this->products_model->get_product($id);

		echo "<pre>";print_r($product);
	}
}
?>