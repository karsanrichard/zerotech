<?php
/**
* 
*/
class Products_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function add_product($name,$brand,$category,$color,$price,$description)
	{
		$sql = "INSERT INTO `products`
					(`product_name`,`description`,`price`,`color`,`brand_id`,`category_id`)
				VALUES
					('$name','$description','$price','$color','$brand','$category')";

		$insert = $this->db->query($sql);

		return $insert;
	}

	function get_all_products()
	{
		$sql = "SELECT * FROM products";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_products($product_id = NULL)
	{
		$addition = isset($product_id)? "AND p.product_id = $product_id": NULL;
		// $sql = "SELECT * FROM products WHERE product_id = $id";
		$sql = "
		SELECT 
		p.product_id,
		p.product_name,
		p.description,
		p.price,
		p.status,
		p.added_on,
		p.color,
		b.brand_name,b.brand_description,b.brand_id,
		c.category_name,c.category_description,
		c.category_id

		FROM products p,brand b,category c
		WHERE p.brand_id = b.brand_id
		AND p.category_id = c.category_id
		$addition
				";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_products_by_category($category_id){
		$sql = "SELECT * FROM products WHERE category_id = $category_id";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_categories($category_id = NULL){
		$addition = isset($category_id)? "WHERE category_id = $category_id" : NULL ; 
		$sql = "SELECT * FROM category $addition";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_brands($brand_id = NULL){
		$addition = isset($brand_id)? "WHERE brand_id = $brand_id" : NULL ; 
		$sql = "SELECT * FROM brand $addition";

		$result = $this->db->query($sql);

		return $result->result_array();
	}
}

?>