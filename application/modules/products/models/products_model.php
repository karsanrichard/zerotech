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

	function add_product($upload_path)
	{
		$name = $this->input->post('product_name');
		$brand = $this->input->post('brand');
		$category = $this->input->post('category');
		$color = $this->input->post('color');
		$price = $this->input->post('price');
		$description = $this->input->post('description');

		$sql = "INSERT INTO `products`
					(`product_name`,`description`,`price`,`color`,`brand_id`,`category_id`,`cover_image`)
				VALUES
					('$name','$description','$price','$color','$brand','$category','$upload_path')";

		$insert = $this->db->query($sql);

		return $insert;
	}

	// function get_all_products()
	// {
	// 	$sql = "SELECT * FROM products";

	// 	$result = $this->db->query($sql);

	// 	return $result->result_array();
	// }

	function get_products($product_id = NULL,$category_id = NULL)
	{
		$addition = isset($product_id)? "AND p.product_id = $product_id": NULL;
		$category = isset($category_id)? "AND c.category_id = $category_id": NULL;
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
		p.cover_image,
		b.brand_name,b.brand_description,b.brand_id,
		c.category_name,c.category_description,
		c.category_id

		FROM products p,brand b,category c
		WHERE p.brand_id = b.brand_id
		AND p.category_id = c.category_id
		$addition
		$category
				";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_product_image($product_id = NULL){
		$query = "
		SELECT * from product_images WHERE product_id = $product_id
		";
		$result = $this->db->query($query);
		return $result ->result_array(); 
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

	function get_parent_categories($category_id = NULL){
		$addition = isset($category_id)? "AND category_id = $category_id" : NULL ; 
		$sql = "SELECT * FROM category WHERE parent_id = 0 $addition";

		$result = $this->db->query($sql);

		return $result->result_array();
	}


	function get_brands($brand_id = NULL){
		$addition = isset($brand_id)? "WHERE brand_id = $brand_id" : NULL ; 
		$sql = "SELECT * FROM brand $addition";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_sub_categories($id)
	{
		$sql = "SELECT * FROM `category` WHERE `parent_id` = '$id'";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function search_product($search)
	{
		$sql = "
				SELECT 
					p.product_id,
					p.product_name,
					p.description,
					p.price,
					p.status,
					p.added_on,
					p.color,
					p.cover_image,
					b.brand_name,b.brand_description,b.brand_id,
					c.category_name,c.category_description,
					c.category_id

				FROM products p
					JOIN brand b
						ON p.brand_id = b.brand_id
					JOIN category c
						ON p.category_id = c.category_id
				WHERE p.product_name LIKE '%$search%' OR brand_name LIKE '%$search%' OR p.color LIKE '%$search%' OR c.category_name  LIKE '%$search%'";
		// echo $sql;die();
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function product_pagination()
	{
		$sql = "SELECT COUNT(`product_id`) AS `number` FROM `products`";

		$result = $this->db->query($sql);
		$result = $result->result_array();
		// echo "<pre>";print_r($result[0]['number']);echo "<br />";
		// echo intval(18/10);
		// die();
		$count = 0;
		$page_count = 1;
		for ($i=0; $i < $result[0]['number']; $i++) { 
			$count++;
		}
		$grouping = $count/10;
		// echo $grouping;echo "<br />";
		if($grouping<1){
			$pages = $page_count;
		}
		else{
			$pages = intval($grouping);
			if ($grouping>$pages) {
				$pages++;
			} else {
				$pages;
			}
			
		}
		
		return $pages;
	}

	
}

?>