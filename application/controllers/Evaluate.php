<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluate extends CI_Controller {
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$status = $this->evaluate_model->getEvalStatus();
		$data = array();
			if($status['active'] == '1'){
				$data['courses'] = $this->evaluate_model->getCourse($status['sem_id'], $this->session->userdata('user_id'));
			} else {
				$data['courses'] = NULL;
			}

		$this->load->view('templates/header');
		$this->load->view('evaluate/index', $data);
		$this->load->view('templates/footer');
	}

}