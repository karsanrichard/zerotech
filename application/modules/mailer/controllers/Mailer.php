<?php

class Mailer extends MY_Controller
{
	protected $mailer;
	function __construct()
	{
		parent::__construct();
		$this->mailer = new PHPMailer;
		$this->mailer->isSMTP();
		$this->mailer->Host = 'smtp.gmail.com';
		$this->mailer->SMTPAuth = true;
		$this->mailer->SMTPSecure = 'tls';
		$this->mailer->Port = 587;
		$this->mailer->Username = 'johnaustin898@gmail.com';
		$this->mailer->Password = 'Chrispine2013';

		$this->mailer->isHTML(true);
	}

	public function send($template, $data, $callback)
	{
		$message = new Message($this->mailer);
		$message->body($this->load->view($template, $data, true));
		call_user_func($callback, $message);
		return $this->mailer->send();
	}
}

class Message
{
	protected $mailer;

	public function __construct($mailer)
	{
		$this->mailer = $mailer;
	}

	public function to($address)
	{
		$this->mailer->addAddress($address);
	}

	public function subject($subject)
	{
		$this->mailer->Subject = $subject;
	}

	public function body($body)
	{
		$this->mailer->Body = $body;
	}
}