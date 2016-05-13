<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class emailModel extends Ci_Model {

	public function sendEmail() {
		/**
		$config = array (
		    'protocol'   => "smtp",
		    'smtp_host'  => "ssl://smtp.gmail.com",
		    'smtp_port'  => 465,
		    'smtp_user'  => "",
		    'smtp_pass'  => "",
		    'useragent'  => "",
		    'mailtype'   => "html",
		    'charset'    => "utf-8",
		    'newline'    => "\r\n",
		 );
		  

		$this->load->library('email', $config);
		$this->email->from($_SESSION['userEmail'], $_SESSION['username']);
		$this->email->to($this->input->post('email_to'));
		$this->email->subject($this->input->post('subject'));
		$this->email->message($this->input->post('message'));

		if ($this->email->send()) {
			return true;
		}
		**/
		return false;
	}

	public function sendEmailValidation() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email_to', '"Email to"', 'trim|required');
		$this->form_validation->set_rules('subject', '"Subject"', 'trim|required');
		$this->form_validation->set_rules('message', '"Message"', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="form_errors">', '</p>');

		if ($this->form_validation->run()) {
			return true;
		}
		return false;
	}
}