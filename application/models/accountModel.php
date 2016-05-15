<?php

class accountModel extends Ci_Model {
	
	public function doLogin() {
		if ($this->checkUserPermission($this->input->post('username'))) {
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);

			$this->session->set_userdata($data);
			return true;			
		}
		return false;
	}

	public function loginValidation() {
		$this->load->library('form_validation');

		//global_xss_filtering == TRUE
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_error_delimiters('<p class="form_errors">', '</p>');

		if ($this->form_validation->run()) {
			return true;			
		}
		return false;
	}
	

	public function createUser() {
		$userData = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
		);

		if ($this->db->insert('users', $userData)) {
			return true;
		}
		return false;
	}

	public function signupValidation() {
		$this->load->library('form_validation');

		//global_xss_filtering == TRUE
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Password confirmation', 'trim|required|matches[password]');

		$this->form_validation->set_message('is_unique', 'The %s already exists!');

		$this->form_validation->set_error_delimiters('<p class="form_errors">', '</p>');

		if ($this->form_validation->run()) {
			return true;			
		}
		return false;
	}


	public function changeEmail() {
		if ($this->checkUserPermission($_SESSION['username'])) {
			$data = array(
				'email' => $this->input->post('newEmail')
			);

			if ($this->db->update('users', $data)) {
				return true;
			}
		}
		return false;
	}
		

	public function changeEmailValidation() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('newEmail', 'Email address', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$this->form_validation->set_message('is_unique', 'The %s already exists!');

		$this->form_validation->set_error_delimiters('<p class="form_errors">', '</p>');

		if ($this->form_validation->run()) {
			return true;
		}
		return false;
	}

	/**
	 * @param username
	 * verify if the inputed password matches with the user's password
	 */
	public function checkUserPermission($username) {
		$this->db->select('username, password');
		$this->db->where('username', $username);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) {
			if (password_verify($this->input->post('password'), $query->row('password'))) {
				return true;
			}
		}
		return false;
	}

	public function getUserEmail($username) {
		$this->db->where('username', $username);
		$query = $this->db->get('users');

		return $query->row('email');		
	}
}