<?php
/**
* 
*/
class Categories extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model');
	}

	function get_parent_categories()
	{
		$parents = $this->categories_model->parent_categories();

		return $parents;
	}

	function get_sub_categories($parent_id)
	{
		$sub = $this->categories_model->sub_categories($parent_id);

		return $sub;
	}
}
?>