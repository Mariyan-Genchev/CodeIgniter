<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function sendEmail() {
		$this->load->model('emailModel');
		if ($this->emailModel->sendEmailValidation()) {
			if ($this->emailModel->sendEmail()) {
			} else {
				$this->session->set_flashdata('infomsg', 'Sorry, this functionality is not available right now. Please try again later.<br> ' . anchor('membersArea/sendEmail', 'Back'));
				redirect('account/showInfoMsg');
			}
		}
			
		$viewData['title'] = 'Send Email';
		$viewData['bodyContent'] = 'membersArea/sendEmail';
		$this->load->view('templates/template', $viewData);
	}

	public function emailError() {
		$this->viewData['title'] = 'Error';
		$this->viewData['bodyContent'] = 'email/emailError';
		$this->load->view('templates/template', $this->viewData);
	}
}