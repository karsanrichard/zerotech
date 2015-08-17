<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use RandomLib\Factory as RandomLib;

class MY_Controller extends MX_Controller{
    protected $RandomLib;
    var $category_drop;
    function __construct() {
        parent::__construct();
        $factory = new RandomLib;
        $this->RandomLib = $factory->getMediumStrengthGenerator();
        $this->load->module('template');
        $this->load->module('categories');
    }

    	function send_email($email, $message)
	{
		$time=date('Y-m-d');
		
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => "chrisrichrads@gmail.com",
			'smtp_pass' => "joshuaSUN"
			);
		// echo $email."<pre>";print_r($config);die();
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('chrisrichrads@gmail.com', 'STRATHMORE UNIVERSITY NOTIFICATION');
		$this->email->to($email);
		$this->email->subject('WELCOME TO STRATHMORE UNIVERSITY');
		$this->email->message($message);
		$this->email->set_mailtype("html");
		
		
		if($this->email->send())
			{	
				// $this->admin_model->store_sent_email($recipient, $subject, $message, $time);
				// $this->load->view('students_view');
				print "Email sent";
				
			} else 
			{
				show_error($this->email->print_debugger());
			}
	}

	function parent_categories_dropdown()
	{
		$categories_data = $this->categories->get_parent_categories();

		$this->category_drop .= '<select class="chosen-select form-control required" tabindex="2" name="category" id="category">';
		$this->category_drop .= '<option value="" selected="true" disabled="true">**Select a Category**</option>';
		foreach ($categories_data as $key => $value) {
			$this->category_drop .= '<option value="'.$value["category_id"].'">'.$value["category_name"].'</option>';
		}
		$this->category_drop .= '</select>';

		return $this->category_drop;

	}

	public static function truncateStringWords($str, $maxlen=32)
	{
	    if (strlen($str) <= $maxlen) return $str;

	    $newstr = substr($str, 0, $maxlen);
	    if (substr($newstr, -1, 1) != ' ') $newstr = substr($newstr, 0, strrpos($newstr, " "));

	    return $newstr;
	}


}
