<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }

    function get_brands()
    {
    	$sql = "SELECT * FROM `brand`";

    	$result = $this->db->query($sql);

    	return $result->result_array();
    }
}
