<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$this->load->view('templates/header');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}

	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('lname');
		$this->session->unset_userdata('image');
		$this->session->unset_userdata('usertype');
		$this->session->unset_userdata('college');
		$this->session->unset_userdata('course');
		$this->session->unset_userdata('user_ID');

		// Set message
		$this->session->set_flashdata('loggedout', true);

		redirect('login');
	}
}
