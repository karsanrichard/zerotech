<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact/m_contact');
	}

	function index()
	{
		$data['content_view'] = 'contact/contact_v';
		$this->template->call_frontend_template($data);
	}

	function post_contact()
	{
		$posted = $this->m_contact->post_contact();
		$data = array();
		if ($posted) {
			$data['type'] = 'success';
			$data['message'] = 'Thank you for contacting us. We will get back to you as soon as possible';
		}
		else
		{
			$data['type'] = 'error';
			$data['message'] = 'An Error occured while processing your request. Please try again later';
		}

		echo json_encode($data);
	}
}