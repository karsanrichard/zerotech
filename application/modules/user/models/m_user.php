<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function add_user($insert_array = [])
	{
		$query = $this->db->insert('users', $insert_array);

		return $query;
	}

	function add_customer($insert_array = [])
	{
		$query = $this->db->insert('customer', $insert_array);

		return $query;
	}
	function get_inactive_user($email)
	{
		$query = $this->db->get_where(
			'users',
			[
				'email_address' => $email,
				'active' => 0
			]
		);

		$result = $query->row();

		return $result;
	}

	function get_active_user($email)
	{
		$query = $this->db->get_where(
			'users',
			[
				'email_address' => $email,
				'active' => 1,
				'status' => 0
			]
		);

		$result = $query->row();

		return $result;
	}

	function activateUser($identifier)
	{
		$holder = (is_numeric($identifier)) ? 'id' : 'email_address';
		$this->db->where($holder, $identifier);
		$query = $this->db->update('users', ['active' => 1, 'active_hash' => NULL]);

		return $query;
	}

	function get_user_details()
	{
		// $query = $this->db->get('customer');
		$result = $this->db->query('SELECT * FROM `customer` JOIN `users` ON `customer`.`user_id` = `users`.`user_id`');
		$result = $result->result();
		return $result;
	}

	function get_user_details_spec($user_id)
	{
		$query = $this->db->query("SELECT c.*, u.* FROM customer c
			JOIN users u ON u.user_id = c.user_id
			WHERE u.user_id = {$user_id}
			LIMIT 1"
		);

		$result = $query->row();
		return $result;
	}
}