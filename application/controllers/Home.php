<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true){
			redirect('membersArea');
		}
	}

	public function index()	{	
		$viewData['title'] = 'Home';
		$viewData['bodyContent'] = 'home/home';
		$this->load->view('templates/template', $viewData);
	}
}
