<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Template extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_categories()
	{
		$query = $this->db->query("SELECT * FROM category WHERE parent_id = 0");
		$result = $query->result();

		return $result;
	}

	function get_sub_categories($category_id)
	{
		$this->db->where('parent_id', $category_id);
		$query = $this->db->get("category");

		$result = $query->result();
		return $result;
	}

	function get_category_brands($category_id)
	{
		$query = $this->db->query("
			SELECT DISTINCT b.brand_id, b.brand_name FROM brand b
			JOIN products p ON p.brand_id = b.brand_id
			JOIN category c ON  c.category_id = p.category_id
			WHERE p.category_id = {$category_id} OR c.parent_id = {$category_id}
		");

		$result = $query->result();
		return $result;
	}

	function get_latest_product_by_category($category_id)
	{
		$query = $this->db->query("
			SELECT p.*, pi.path FROM products p
			JOIN product_images pi ON pi.product_id = p.product_id
			WHERE p.category_id = {$category_id}
			ORDER BY p.added_on DESC
			LIMIT 1
		");

		$result = $query->row();
		return $result;
	}
}