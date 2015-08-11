<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact/m_contact');
	}

	function index()
	{
		$data['content_view'] = 'contact/contact_v';
		$this->template->call_frontend_template($data);
	}

	function post_contact()
	{
		$posted = $this->m_contact->post_contact();
		$data = array();
		if ($posted) {
			$data['type'] = 'success';
			$data['message'] = 'Thank you for contacting us. We will get back to you as soon as possible';
		}
		else
		{
			$data['type'] = 'error';
			$data['message'] = 'An Error occured while processing your request. Please try again later';
		}

		echo json_encode($data);
	}

	function customer_contact()
	{
		$contact_list = $message_section = '';
    	$contacts = $this->m_contact->get_customer_contacts();

    	if($contacts)
    	{
    		$number = 0;
    		foreach ($contacts as $contact) {
    			$number++;
    			$formatted_date = date('d.m.Y', strtotime($contact->date_created));
    			$formatted_date_time = date('l, d F Y, h:i a');
    			if ($contact->viewed == 0) {
    				$lower_end = '<span class="label pull-right label-primary">NEW</span>';
    			}

    			$class = ($number == 1) ? 'active' : '';
    			$contact_list .= '<li class="list-group-item '.$class.'">
				<a data-toggle="tab" href="#tab-'.$number.'">
					<small class="pull-right text-muted"> '.$formatted_date.'</small>
					<strong>'.$contact->contact_name.'</strong>
					<div class="small m-t-xs">
						<p>
							'.implode(' ', array_slice(explode(' ', strip_tags($contact->contact_message)), 0, 16)).'
						</p>
						<p class="m-b-none">
							'.$lower_end.'
						</p>
					</div>
				</a>
				</li>';

				$message_section .= '<div id="tab-'.$number.'" class="tab-pane '.$class.'">

					<div class="pull-right">
						<div class="tooltip-demo">
						<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="left" title="Plug this message"><i class="fa fa-plug"></i> Plug it</button>
						<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
						<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important"><i class="fa fa-exclamation"></i> </button>
						<button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>

						</div>
						</div>
						<div class="small text-muted">
						<i class="fa fa-clock-o"></i> '.$formatted_date_time.'
						</div>

						<h1>
						'.$contact->contact_subject.'
						</h1>

						<p>'.$contact->contact_message.'</p>
						<div class="m-t-lg">
						
						<div class="clearfix"></div>
						
						</div>

				</div>';
    		}
    	}

    	$contact_section = array();

    	$contact_section['contact_list'] = $contact_list;
    	$contact_section['message_section'] = $message_section;
    	
    	return $contact_section;
	}
}