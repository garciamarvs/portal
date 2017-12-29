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

	public function form()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$this->load->view('templates/header');
		$this->load->view('evaluate/form');
		$this->load->view('templates/footer');
	}

	public function q($course_id)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		if($this->evaluate_model->getTaposNa($course_id)){
			redirect('evaluate/form');
		}

		$data['course_id'] = $course_id;
		
		$As = $this->evaluate_model->getQuestionsByCategory('A');
		$Bs = $this->evaluate_model->getQuestionsByCategory('B');
		$Cs = $this->evaluate_model->getQuestionsByCategory('C');
		$Ds = $this->evaluate_model->getQuestionsByCategory('D');
		$Es = $this->evaluate_model->getQuestionsByCategory('E');

		foreach ($As as $a) {
			$this->form_validation->set_rules('A'.$a['id'], 'A'.$a['id'], 'required');
		}

		foreach ($Bs as $b) {
			$this->form_validation->set_rules('B'.$b['id'], 'B'.$b['id'], 'required');
		}

		foreach ($Cs as $c) {
			$this->form_validation->set_rules('C'.$c['id'], 'C'.$c['id'], 'required');
		}

		foreach ($Ds as $d) {
			$this->form_validation->set_rules('D'.$d['id'], 'D'.$d['id'], 'required');
		}

		foreach ($Es as $e) {
			$this->form_validation->set_rules('E'.$e['id'], 'E'.$e['id'], 'required');
		}

		$this->form_validation->set_rules('comment', 'Comment', 'trim|max_length[255]');


		if ($this->form_validation->run() === FALSE)
		{
			$data['c'] = $this->evaluate_model->getCourseById($course_id);

			$this->load->view('templates/header');
			$this->load->view('evaluate/q', $data);
			$this->load->view('templates/footer');
		} else {

			$i = array();

			foreach ($As as $a) {
				$x = array('ID' => $a['category'].$a['id'], 'Value' => $this->input->post($a['category'].$a['id']));
				array_push($i, $x);
			}

			foreach ($Bs as $b) {
				$x = array('ID' => $b['category'].$b['id'], 'Value' => $this->input->post($b['category'].$b['id']));
				array_push($i, $x);
			}

			foreach ($Cs as $c) {
				$x = array('ID' => $c['category'].$c['id'], 'Value' => $this->input->post($c['category'].$c['id']));
				array_push($i, $x);
			}

			foreach ($Ds as $d) {
				$x = array('ID' => $d['category'].$d['id'], 'Value' => $this->input->post($d['category'].$d['id']));
				array_push($i, $x);
			}

			foreach ($Es as $e) {
				$x = array('ID' => $e['category'].$e['id'], 'Value' => $this->input->post($e['category'].$e['id']));
				array_push($i, $x);
			}

			$this->evaluate_model->addEvalRes($course_id, json_encode($i));

			$this->session->set_flashdata('evaluate_success', true);
			redirect('evaluate/form');
		}
	}

	public function result()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['sem'] = $this->evaluate_model->getSem();
		$data['college'] = $this->evaluate_model->getCollege();

		$this->load->view('templates/header');
		$this->load->view('evaluate/result', $data);
		$this->load->view('templates/footer');
	}

	public function report()
	{
		$this->load->helper('pdf_helper');
    /*
        ---- ---- ---- ----
        your code here
        ---- ---- ---- ----
    */
    $this->load->view('pdfreport');
	}

	public function schedule()
	{
		$this->load->view('templates/header');
		$this->load->view('evaluate/schedule');
		$this->load->view('templates/footer');
	}

	function getEvalResult(){
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$sem = $this->input->post('sem');
		$faculty = $this->input->post('faculty');
		if($this->input->post('type') == 'getEvalResult'){
			$res = $this->evaluate_model->getEvalResult($sem, $faculty);
			
			echo json_encode(array('status' => 'success', 'res' => $res));
		}
	}

	function getFaculty(){
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$college = $this->input->post('college');
		if($this->input->post('type') == 'getFaculty'){
			$faculty = $this->evaluate_model->getFacultyByCollege($college);

			echo json_encode(array('status' => 'success', 'faculty' => $faculty));
		}
	}

}