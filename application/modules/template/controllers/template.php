<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Template extends MY_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function call_frontend_template($data = NULL, $type = NULL){
        (!isset($type)) ? $this->load->view('template/frontend', $data) : $this->load->view('template/material_test');
    }
    
    function call_backend_template($data = NULL){
        $this->load->view('template/backend', $data);
    }
}
