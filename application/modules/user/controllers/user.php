<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
	{
		$this->load->module([
			'Hash',
			'mailer'
		]);
		$this->load->model('user/M_user');
		parent::__construct();
		if($this->session->userdata('is_logged_in'))
		{
			redirect('home');
		}
	}

	public function login()
	{
		$data['content_view'] = 'user/front_end_login_registration';
		$this->template->call_frontend_template($data);
	}

	public function registration()
	{
		$data['content_view'] = 'user/registration_page';
		$this->template->call_frontend_template($data);
	}

	public function complete_registration()
	{
		$identifier = $this->RandomLib->generateString(128);
		$password = $this->hash->password($this->input->post('password'));

		$inserted = $this->M_user->add_user([
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'other_names' => $this->input->post('othernames'),
			'email_address' => $this->input->post('email_address'),
			'active_hash' => $identifier,
			'password' => $password
		]);

		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['identifier'] = $identifier;
		$data['email_address'] = $this->input->post('email_address');

		$sent = $this->mailer->send('user/email_registration_template', $data, function($message){
			$message->to($this->input->post('email_address'));
			$message->subject("Thank you for registering");
		});

		if ($sent) {
			$data['content_view'] = 'user/after_registration';
			$this->template->call_frontend_template($data);
		}
	}

	function activate($email, $identifier)
	{
		$hashedIdentifier = $this->hash->hash($identifier);
		$user = $this->M_user->get_inactive_user($email);

		if(!$user || $this->hash->hashCheck($user->active_hash, $hashedIdentifier))
		{
			$data['content_view'] = 'user/after_registration';
			$data['error'] = array(
				'Could not activate this account. Please try again later'
			);
			$this->template->call_frontend_template($data);
		}
		else
		{
			$this->M_user->activateUser($email);
			$this->session->set_flashdata('success', 'Successfully Registered. You can now login');
			redirect(base_url() . 'user/login');
		}
	}

	function test_activate()
	{
		$data['content_view'] = 'user/after_registration';
		$this->template->call_frontend_template($data);
	}

	function authenticate()
	{
		$user = $this->M_user->get_active_user($this->input->post('email_address'));

		if($user && $this->hash->passwordCheck($this->input->post('password'), $user->password))
		{
			$this->session->set_userdata([
				'customer_id' => $user->id,
				'is_logged_in' => TRUE
			]);
			redirect(base_url() . 'home');
		}
		else
		{
			$this->session->set_flashdata('error', 'Username or password is wrong');
			redirect(base_url() . 'user/login');
		}
	}

	function create_user_table()
	{
		$user_table = '';
		$user_details = $this->M_user->get_user_details();
		$status_column = '';
		if ($user_details) {
			$number = 1;
			foreach ($user_details as $user) {
				if ($user->active == 1) {
					$status_column = '<td><span class = "label label-primary">Active</span><a href = "#" style = "color: red;"><i class = "fa fa-times"></i></a></td>';
				}
				else
				{
					$status_column = '<td><span class = "label label-danger">Not Active</span><a href = "#" style = "color: green;"><i class = "fa fa-check"></i></a></td>';
				}
				$user_table .= "<tr>
					<td>{$number}</td>
					<td>{$user->first_name}</td>
					<td>{$user->last_name}</td>
					<td>{$user->other_names}</td>
					<td>{$user->email_address}</td>
					{$status_column}
				</tr>";
				$number++;
			}
		}

		return $user_table;
	}
}