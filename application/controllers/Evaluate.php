<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluate extends CI_Controller {
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$this->load->view('templates/header');
		$this->load->view('evaluate/index');
		$this->load->view('templates/footer');
	}

}