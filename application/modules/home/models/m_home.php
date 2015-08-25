<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function get_latest_products($limit)
	{
		$query = $this->db->query("SELECT * FROM products ORDER BY added_on DESC LIMIT {$limit}");
		$result = $query->result();

		return $result;
	}

	function get_categories()
	{
		// $this->db->where('parent_id', 0);
		$query = $this->db->get("category");
		$result = $query->result();

		return $result;
	}

	function get_category_sub_categories($category_id)
	{
		$this->db->where('parent_id', $category_id);
		$query = $this->db->get("category");
		$result = $query->result();

		return $result;
	}
}