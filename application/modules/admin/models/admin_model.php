<?php 
class Admin_model extends MX_Controller
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_products()
	{
		$sql = "SELECT * FROM products";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_product($id)
	{
		$sql = "SELECT * FROM products WHERE product_id = $id";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_products_by_category($category_id){
		$sql = "SELECT * FROM products WHERE category_id = $category_id";

		$result = $this->db->query($sql);

		return $result->result_array();
	}
}
 ?>