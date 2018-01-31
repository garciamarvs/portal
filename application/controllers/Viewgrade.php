<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewgrade extends CI_controller {
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
	$data['sem'] = $this->viewgrade_model->getSemForSelect();

	$this->load->view('templates/header');
	$this->load->view('viewgrade/index', $data);
	$this->load->view('templates/footer');
	}

	function populateTable(){
		$id = $this->input->post('id');

		if($this->input->post('type') == 'populateTable'){
			$data = $this->viewgrade_model->populateTable($id);

			echo json_encode(array('status' => 'success', 'courses' => $data));
		}
	}
}