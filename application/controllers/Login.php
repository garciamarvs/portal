<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('logged_in')){
			redirect('home');
		}

	$this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('login');
			$this->session->set_flashdata('dump', $this->input->post('username'));
		} else {
			// Get username
			$username = $this->input->post('username');
			// Get and encrypt the password
			$password = $this->input->post('password');

			$user= $this->login_model->login($username, $password);

				if($user){
				// Create session
				$user_data = array(
					'user_id'   => $user['id'],
					'fname' 	  => $user['first_name'],
					'mname'			=> $user['middle_name'],
					'lname' 	  => $user['last_name'],
					'usertype'  => $user['usertype'],
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);

				redirect('home');

				} else {
					$this->session->set_flashdata('dump', $this->input->post('username'));
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('login');
				}
			}
	}

}
