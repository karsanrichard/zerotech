<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use RandomLib\Factory as RandomLib;

class MY_Controller extends MX_Controller{
    protected $RandomLib;
    function __construct() {
        parent::__construct();
        $factory = new RandomLib;
        $this->RandomLib = $factory->getMediumStrengthGenerator();
        $this->load->module('template');
    }
}
