<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_account extends MY_Controller
{

	protected $user_id;
	function __construct($user_id = NULL)
	{
		parent::__construct();
		if ($this->session->userdata('user_id') == $user_id) {
			$this->user_id = $user_id;
		}
	}

	function index()
	{

	}
}