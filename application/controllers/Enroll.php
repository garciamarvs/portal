<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enroll extends CI_Controller {
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 1){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$status = $this->enroll_model->getEnrollStatus();
		if($status['active'] == '1' && strtotime($status['date']) > time() && time() > strtotime($status['start_date'])){
			$this->load->helper('pdf_helper');
    	$this->load->view('enroll/index');
		} else {
			$this->load->view('templates/header');
			$this->load->view('enroll/error');
			$this->load->view('templates/footer');
		}		
	}

	public function schedule()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 5){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$this->form_validation->set_rules('sem_id', 'School Year/Semester', 'required|callback_checkActiveSched');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');

		$data['sem'] = $this->enroll_model->getSem();
		$data['sched'] = $this->enroll_model->getEnrollSched();

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('enroll/schedule', $data);
			$this->load->view('templates/footer');
		} else {
			$name = 'enroll';
			$sem_id = $this->input->post('sem_id');
			$active = 1;
			$start_date = $this->input->post('start_date').' 00:00:00';
			$end_date		= $this->input->post('end_date').' 24:00:00';

			$this->enroll_model->addEnrollSched($name, $sem_id, $active, $start_date, $end_date);

			$this->session->set_flashdata('checkActiveSched_false', true);

			redirect('enroll/schedule');
		}
	}

	//Callbacks
	public function checkActiveSched(){
		if($this->enroll_model->getActiveSched()){
			$this->session->set_flashdata('checkActiveSched', true);
			return false;
		} else {
			return true;
		}
	}
}