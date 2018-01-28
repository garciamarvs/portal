<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends CI_Controller {
	public function enrolled($sy = FALSE, $offset = 0)
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

		if(isset($_POST['sy'])){
			redirect('semester/enrolled/'.$_POST['sy']);
		}

		$data['sy'] = $this->semester_model->getSem();

		if($sy==FALSE){
			$sy = $data['sy'][0]['id'];
		}

		$this->load->library('pagination');

		// Pagination Config
		$total = $this->semester_model->getTotalStud($sy);
		$config['base_url'] = base_url().'semester/enrolled/'.$sy.'/';
		$config['total_rows'] = $total;
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		$config['last_link'] = "<i class=\"fa fa-angle-double-right\"></i>";
		$config['first_link'] = "<i class=\"fa fa-angle-double-left\"></i>";
		$config['cur_tag_open'] = "<button class=\"btn btn-white active\">";
		$config['cur_tag_close'] = "</button>";
		$config['prev_link'] = "<i class=\"fa fa-chevron-left\"></i>";
		$config['next_link'] = "<i class=\"fa fa-chevron-right\"></i>";
		$config['attributes'] = array('class' => 'btn btn-white');
		$config['attributes']['rel'] = FALSE;

		// Init Pagination
		$this->pagination->initialize($config);

		$data['currSY'] = $sy;
		$data['students'] = $this->semester_model->getStudentSem($sy, $config['per_page'], $offset);

		$this->load->view('templates/header');
		$this->load->view('semester/enrolled', $data);
		$this->load->view('templates/footer');
	}
}