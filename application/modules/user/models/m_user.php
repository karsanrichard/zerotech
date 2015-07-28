<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function add_user($insert_array = [])
	{
		$query = $this->db->insert('customer', $insert_array);

		return $query;
	}

	function get_active_user($email)
	{
		$query = $this->db->get_where(
			'customer',
			[
				'email_address' => $email,
				'active' => 0
			]
		);

		$result = $query->row();

		return $result;
	}

	function activateUser($identifier)
	{
		$holder = (is_numeric($identifier)) ? 'id' : 'email_address';
		$this->db->where($holder, $identifier);
		$query = $this->db->update('customer', ['active' => 1, 'active_hash' => NULL]);

		return $query;
	}
}