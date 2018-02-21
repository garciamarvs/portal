<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignfaculty extends CI_Controller {
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 3){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['faculties'] = $this->assignfaculty_model->getFaculty();
		$data['sy'] = $this->assignfaculty_model->getSem();
		$data['courses'] = $this->assignfaculty_model->getCourses();

		$this->load->view('templates/header');
		$this->load->view('assignfaculty/index', $data);
		$this->load->view('templates/footer');
	}

	function populatePanel()
	{
		$sy = $this->input->post('sy');
		$course = $this->input->post('course');

		if($this->input->post('type')=='populatePanel'){
			$a = $this->assignfaculty_model->populatePanel($sy, $course);

			echo json_encode(array('status' => 'success', 'out' => $a));
		}
	}

	function setFaculty()
	{
		$course = $this->input->post('id');
		$faculty = $this->input->post('sel');
		if($this->input->post('type')=='setFaculty'){
			$this->assignfaculty_model->setFaculty($course, $faculty);

			echo json_encode(array('status' => 'success'));
		}
	}
}