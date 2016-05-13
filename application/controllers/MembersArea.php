<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MembersArea extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] !== true){
			redirect('home');
		}
	}

	public function index() {
		$this->viewData['title'] = 'Contact';
		$this->viewData['bodyContent'] = 'membersArea/home';	
		$this->load->view('templates/template', $this->viewData);
	}

	public function contact() {
		$this->viewData['title'] = 'Contact';
		$this->viewData['bodyContent'] = 'membersArea/contact';	
		$this->load->view('templates/template', $this->viewData);
	}

	public function about() {
		$this->viewData['title'] = 'About';
		$this->viewData['bodyContent'] = 'membersArea/about';	
		$this->load->view('templates/template', $this->viewData);
	}

	public function sendEmail() {
		if (isset($_SESSION['username'])){
			$this->load->model('accountModel');
			$data = array(
				'userEmail' => $this->accountModel->getUserEmail($_SESSION['username'])
				);
			$this->session->set_userdata($data);
		}
		 
		$this->viewData['title'] = 'Send Email';
		$this->viewData['bodyContent'] = 'membersArea/sendEmail';	
		$this->load->view('templates/template', $this->viewData);
	}

	public function logout() {
		if (isset($_SESSION)) {
			$this->session->sess_destroy();
			redirect('home');
		}
	}
}