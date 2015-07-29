<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data['page_heading'] = 'Dashboard';
        $data['content_view'] = 'admin/dashboard';
        $this->template->call_backend_template($data);
    }

}

