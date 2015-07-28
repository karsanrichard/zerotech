<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Controller extends MX_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->module('template');
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
}
