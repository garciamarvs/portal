<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluate extends CI_Controller {
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

		$this->load->view('templates/header');
		$this->load->view('evaluate/index');
		$this->load->view('templates/footer');
	}

	public function form()
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

		$this->load->view('templates/header');
		$this->load->view('evaluate/form');
		$this->load->view('templates/footer');
	}

	public function q($course_id)
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
		if($this->session->userdata('usertype') != 5){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['sem'] = $this->evaluate_model->getSem();
		$data['college'] = $this->evaluate_model->getCollege();

		$this->load->view('templates/header');
		$this->load->view('evaluate/result', $data);
		$this->load->view('templates/footer');
	}

	public function report($course_id)
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

		$this->load->helper('pdf_helper');
    $data['c'] = $this->evaluate_model->getCourseById($course_id);
    $this->load->view('evaluate/report', $data);
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

		$data['sem'] = $this->evaluate_model->getSem();
		$data['sched'] = $this->evaluate_model->getEvalSched();

		if($this->form_validation->run() === FALSE){

			$this->load->view('templates/header');
			$this->load->view('evaluate/schedule', $data);
			$this->load->view('templates/footer');
		} else {
			$name = 'faculty_eval';
			$sem_id = $this->input->post('sem_id');
			$active = 1;
			$start_date = $this->input->post('start_date').' 00:00:00';
			$end_date		= $this->input->post('end_date').' 24:00:00';

			$this->evaluate_model->addEvalSched($name, $sem_id, $active, $start_date, $end_date);

			$this->session->set_flashdata('checkActiveSched_false', true);

			redirect('evaluate/schedule');
		}
	}

	public function questions()
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

		$this->load->view('templates/header');
		$this->load->view('evaluate/question');
		$this->load->view('templates/footer');
	}

	//Ajaxs
	function getEvalResult(){
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
		if($this->session->userdata('usertype') != 5){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$college = $this->input->post('college');
		if($this->input->post('type') == 'getFaculty'){
			$faculty = $this->evaluate_model->getFacultyByCollege($college);

			echo json_encode(array('status' => 'success', 'faculty' => $faculty));
		}
	}

	function disableEvalSched(){
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

		$id = $this->input->post('id');

		if($this->input->post('type') == 'disableEvalSched'){
			$this->evaluate_model->disableEvalSched($id);
			echo json_encode(array('status' => 'success'));
		}
	}

	function setEvalSched(){
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

		$id = $this->input->post('id');
		$active = $this->input->post('active');

		if($this->input->post('type') == 'setEvalSched'){
			if($this->evaluate_model->getActiveSched()){
				echo json_encode(array('status' => 'failed'));
			} else {
				$this->evaluate_model->setEvalSched($id, $active);
				echo json_encode(array('status' => 'success'));
			}
		}
	}

	function populateModal_Edit(){
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

		$id = $this->input->post('id');
		if($this->input->post('type') == 'modal_edit'){
			$q = $this->evaluate_model->getQuestionById($id);

			echo json_encode(array('status' => 'success', 'q' => $q));
		}
	}

	function saveModal_Edit(){
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

		$id = $this->input->post('id');
		$category = $this->input->post('category');
		$question = $this->input->post('question');

		if($this->input->post('type') == 'modal_save'){
			$this->evaluate_model->saveQuestionEdit($id, $category, $question);
			
			$this->session->set_flashdata('saveModal_Edit', true);
			echo json_encode(array('status' => 'success'));
		}
	}

	function chkbox(){
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

		$active = $this->input->post('active');
		$id = $this->input->post('id');

		if($this->input->post('type') == 'chkbox'){	
			$this->evaluate_model->chkbox($id, $active);

			echo json_encode(array('status' => 'success'));
		}
	}

	function addQuestion(){
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

		$category = $this->input->post('category');
		$question = $this->input->post('question');
		$status = $this->input->post('status');

		if($this->input->post('type')=='addQuestion'){
			$this->evaluate_model->addQuestion($category, $question, $status);

			$this->session->set_flashdata('addQuestion', true);
			echo json_encode(array('status' => 'success'));
		}
	}

	//Callbacks
	public function checkActiveSched(){
		if($this->evaluate_model->getActiveSched()){
			$this->session->set_flashdata('checkActiveSched', true);
			return false;
		} else {
			return true;
		}
	}
}