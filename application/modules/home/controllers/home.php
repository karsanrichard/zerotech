<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends MY_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index(){
    	$data['content_view'] = 'home/home';
        $this->template->call_frontend_template($data);
    }
    
    
}

