<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Contact extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function post_contact()
	{
		$insert_data = $this->input->post();

		$inserted = $this->db->insert('contact', $insert_data);

		return $inserted;
	}

	function get_customer_contacts()
	{
		$this->db->order_by('date_created', 'asc');
		$contacts = $this->db->get('contact');

		return $contacts->result();
	}
}