<?php

class M_Shop extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_latest_order_details($customer_id)
	{
		$query = $this->db->query(
			"SELECT c.*, o.* FROM customer c
			LEFT JOIN orders o ON c.customer_id = o.customer_id
			WHERE c.customer_id = {$customer_id}
			ORDER BY o.order_date DESC
			LIMIT 1"
		);

		$result = $query->row();
		return $result;
	}
}