<?php 

$this->load->view('templates/header');
if (isset($this->session->userdata['is_logged_in'])) {
	$this->load->view('templates/navigation');
}
$this->load->view($bodyContent);
$this->load->view('templates/footer');