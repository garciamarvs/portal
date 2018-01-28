<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {
	public function index($sem_id = false)
	{	
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 2){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['courses'] = $this->course_model->getCoursesBySem($sem_id);

		if($sem_id && $data['courses']){
			$sy = $this->course_model->getSemById($sem_id);
			$data['sem']['name'] = $sy['name'];
			$data['sem']['id'] = $sy['id'];

			$this->load->view('templates/header');
			$this->load->view('course/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('403');
		}
	}

	public function details($course_id = false)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 2){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['course'] = $this->course_model->getCourseById($course_id);
		$data['students'] = $this->course_model->getCourseStudent($course_id);

		if($course_id){
			$this->load->view('templates/header');
			$this->load->view('course/details', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('403');
		}
	}
}