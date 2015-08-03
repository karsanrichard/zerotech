<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller
{
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['outside_main'] = 'about/outside_main';
		$data['content_view'] = 'about/about_v';
		$this->template->call_frontend_template($data);
	}
}