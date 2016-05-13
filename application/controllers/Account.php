<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('accountModel');
	}

	public function login() {
		if ($this->accountModel->loginValidation()) {
			if ($this->accountModel->doLogin()) {
				redirect('membersArea');
			}
			$this->session->set_flashdata('errmsg', 'Wrong username or password!');
		}
		
		$viewData['title'] = 'login';
		$viewData['bodyContent'] = 'account/login';
		$this->load->view('templates/template', $viewData);
	}

	public function signUp() {
		if ($this->accountModel->signupValidation()) {
			if ($this->accountModel->createUser()) {
				$this->session->set_flashdata('infomsg', 'Congratulations!<br> Your account has been created.<br> ' . anchor('account/login', 'Login'));
				redirect('account/showInfoMsg');
			}
		}

		$viewData['title'] = 'Sign Up';
		$viewData['bodyContent'] = 'account/signup';
		$this->load->view('templates/template', $viewData);
	}

	public function changeEmail() {
		if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true){
			redirect('Home');
		}
		if ($this->accountModel->changeEmailValidation()) {
			if ($this->accountModel->changeEmail()) {
				$_SESSION['userEmail'] = $this->input->post('newEmail');
				$this->session->set_flashdata('infomsg', 'Your email address has been changed.<br>' . anchor('membersArea/sendEmail', 'Send Email'));
				redirect('account/showInfoMsg');
			} else {
			$this->session->set_flashdata('errmsg', 'Wrong password!');
			}
		}

		$this->viewData['title'] = 'Change Email';
			$this->viewData['bodyContent'] = 'account/change_email';
		$this->load->view('templates/template', $this->viewData);
	}

	public function showInfoMsg() {
		if ($this->session->flashdata()) {
			$viewData['title'] = 'Info';
			$viewData['bodyContent'] = 'info_message_page';
			$this->load->view('templates/template', $viewData);
		} else {
			redirect('home');
		}
	}
}