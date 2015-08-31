<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in'))
        {
            redirect('home');
        }
        $this->load->model("admin/admin_model");

        $this->load->module(
        	array(
        	'contact',
            'user'
        ));
    }
    
    public function index(){
        $data['page_heading'] = 'Dashboard';
        $data['content_view'] = 'admin/dashboard';
        $this->template->call_backend_template($data);
    }

    public function contact()
    {
    	$data['contact_table'] = $this->contact->customer_contact();
    	$data['page_heading'] = 'Customer Page';
    	$data['content_view'] = 'admin/contact_page';
    	$this->template->call_backend_template($data);
    }

    public function user()
    {
        $data['user_table'] = $this->user->create_user_table();
        $data['page_heading'] = 'User Management';
        $data['content_view'] = 'user/user_page';
        $this->template->call_backend_template($data);
    }

}

