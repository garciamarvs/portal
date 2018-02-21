<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation extends CI_Controller {
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 1&&$this->session->userdata('usertype') != 3&&$this->session->userdata('usertype') != 4){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance();
			$this->CI->output->_display();
			die();
		}
		if($this->session->userdata('usertype') == 1){
			$this->load->view('templates/header');
			$this->load->view('evaluation/index');
			$this->load->view('templates/footer');
		} else if($this->session->userdata('usertype') == 3||$this->session->userdata('usertype') == 4){
			$this->load->view('templates/header');
			$this->load->view('evaluation/index2');
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
		
		$this->form_validation->set_rules('sem_id', 'School Year/Semester', 'required');
		$this->form_validation->set_rules('faculty', 'Faculty', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');

		$data['sem'] = $this->evaluate_model->getSem();
		$data['sched'] = $this->evaluate_model->getEvalSched();
		$data['college'] = $this->evaluate_model->getCollege();

		if($this->form_validation->run() === FALSE){

			$this->load->view('templates/header');
			$this->load->view('evaluation/schedule', $data);
			$this->load->view('templates/footer');
		} else {
			$name = 'faculty_eval';
			$sem_id = $this->input->post('sem_id');
			$active = 1;
			$faculty = $this->input->post('faculty');
			$start_date = $this->input->post('start_date').' 00:00:00';
			$end_date		= $this->input->post('end_date').' 24:00:00';

			$this->evaluation_model->addEvalSched($name, $sem_id, $faculty, $active, $start_date, $end_date);

			$this->session->set_flashdata('checkActiveSched_false', true);

			redirect('evaluation/schedule');
		}
	}

	public function form()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 1&&$this->session->userdata('usertype') != 3&&$this->session->userdata('usertype') != 4){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		if($this->session->userdata('usertype') == 1){
			$this->load->view('templates/header');
			$this->load->view('evaluation/form');
			$this->load->view('templates/footer');
		} else if($this->session->userdata('usertype') == 3||$this->session->userdata('usertype') == 4){
			$this->load->view('templates/header');
			$this->load->view('evaluation/form2');
			$this->load->view('templates/footer');
		}
	}

	public function d($faculty = FALSE, $sem_id = FALSE)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 3&&$this->session->userdata('usertype') != 4){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}
		if($this->evaluate_model->getTaposNa3($faculty, $sem_id)){
			redirect('evaluation/form');
		}

		//IA
		for ($i=0; $i < 7; $i++) { 
			$this->form_validation->set_rules('IA'.$i, 'IA'.$i, 'required');
		}

		//IB

		for ($i=0; $i < 9; $i++) { 
			$this->form_validation->set_rules('IB'.$i, 'IB'.$i, 'required');
		}

		//IC
		for ($i=0; $i < 10; $i++) { 
			$this->form_validation->set_rules('IC'.$i, 'IC'.$i, 'required');
		}

		//ID
		for ($i=0; $i < 3; $i++) { 
			$this->form_validation->set_rules('ID'.$i, 'ID'.$i, 'required');
		}

		//II
		for ($i=0; $i < 8; $i++) { 
			$this->form_validation->set_rules('II'.$i, 'II'.$i, 'required');
		}

		$this->form_validation->set_rules('comment', 'Comment', 'trim|max_length[255]');


		if ($this->form_validation->run() === FALSE)
		{
			$data['f']  = $this->evaluate_model->getUserById($faculty);
			$data['sy'] = $this->evaluate_model->getSemById($sem_id);

			$this->load->view('templates/header');
			$this->load->view('evaluation/d', $data);
			$this->load->view('templates/footer');
		} else {
			$toSend = array();

			//IA
			for ($i=0; $i < 7; $i++) { 
				$x = array('ID' => 'IA'.$i, 'Value' => $this->input->post('IA'.$i));
				array_push($toSend, $x);
			}

			//IB

			for ($i=0; $i < 9; $i++) { 
				$x = array('ID' => 'IB'.$i, 'Value' => $this->input->post('IB'.$i));
				array_push($toSend, $x);
			}

			//IC
			for ($i=0; $i < 10; $i++) { 
				$x = array('ID' => 'IC'.$i, 'Value' => $this->input->post('IC'.$i));
				array_push($toSend, $x);
			}

			//ID
			for ($i=0; $i < 3; $i++) { 
				$x = array('ID' => 'ID'.$i, 'Value' => $this->input->post('ID'.$i));
				array_push($toSend, $x);
			}

			//II
			for ($i=0; $i < 8; $i++) { 
				$x = array('ID' => 'II'.$i, 'Value' => $this->input->post('II'.$i));
				array_push($toSend, $x);
			}

			if($this->session->userdata('usertype')==3){
				$this->evaluate_model->addEvalRes2($faculty, $sem_id, json_encode($toSend));
			} else if($this->session->userdata('usertype')==4) {
				$this->evaluate_model->addEvalRes3($faculty, $sem_id, json_encode($toSend));
			}			

			$this->session->set_flashdata('evaluate_success', true);
			redirect('evaluation/form');
		}

	}

	public function q($course_id = FALSE)
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
			redirect('evaluation/form');
		}

		$data['course_id'] = $course_id;

		//IA
		for ($i=0; $i < 7; $i++) { 
			$this->form_validation->set_rules('IA'.$i, 'IA'.$i, 'required');
		}

		//IB

		for ($i=0; $i < 9; $i++) { 
			$this->form_validation->set_rules('IB'.$i, 'IB'.$i, 'required');
		}

		//IC
		for ($i=0; $i < 10; $i++) { 
			$this->form_validation->set_rules('IC'.$i, 'IC'.$i, 'required');
		}

		//ID
		for ($i=0; $i < 3; $i++) { 
			$this->form_validation->set_rules('ID'.$i, 'ID'.$i, 'required');
		}

		//II
		for ($i=0; $i < 8; $i++) { 
			$this->form_validation->set_rules('II'.$i, 'II'.$i, 'required');
		}

		$this->form_validation->set_rules('comment', 'Comment', 'trim|max_length[255]');


		if ($this->form_validation->run() === FALSE)
		{
			$data['c'] = $this->evaluate_model->getCourseById($course_id);

			$this->load->view('templates/header');
			$this->load->view('evaluation/q', $data);
			$this->load->view('templates/footer');
		} else {
			$toSend = array();

			//IA
			for ($i=0; $i < 7; $i++) { 
				$x = array('ID' => 'IA'.$i, 'Value' => $this->input->post('IA'.$i));
				array_push($toSend, $x);
			}

			//IB

			for ($i=0; $i < 9; $i++) { 
				$x = array('ID' => 'IB'.$i, 'Value' => $this->input->post('IB'.$i));
				array_push($toSend, $x);
			}

			//IC
			for ($i=0; $i < 10; $i++) { 
				$x = array('ID' => 'IC'.$i, 'Value' => $this->input->post('IC'.$i));
				array_push($toSend, $x);
			}

			//ID
			for ($i=0; $i < 3; $i++) { 
				$x = array('ID' => 'ID'.$i, 'Value' => $this->input->post('ID'.$i));
				array_push($toSend, $x);
			}

			//II
			for ($i=0; $i < 8; $i++) { 
				$x = array('ID' => 'II'.$i, 'Value' => $this->input->post('II'.$i));
				array_push($toSend, $x);
			}

			$this->evaluate_model->addEvalRes($course_id, json_encode($toSend));

			$this->session->set_flashdata('evaluate_success', true);
			redirect('evaluation/form');
		}
	}

	public function report($faculty = FALSE, $sem_id = FALSE)
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

			$assoc = $this->evaluation_model->getAssocEval($faculty, $sem_id);
			if($assoc){
				$result = json_decode($assoc['result']);

				$t_IA = $t_IB = $t_IC = $t_ID = $t_II = 0;

				foreach ((array) $result as $r) {
					if(substr($r->ID, 0, 2)=='IA'){
						$t_IA += $r->Value;
					} else if(substr($r->ID, 0, 2)=='IB'){
						$t_IB += $r->Value;
					} else if(substr($r->ID, 0, 2)=='IC'){
						$t_IC += $r->Value;
					} else if(substr($r->ID, 0, 2)=='ID'){
						$t_ID += $r->Value;
					} else if(substr($r->ID, 0, 2)=='II'){
						$t_II += $r->Value;
					}
				}

				$ave_IA = $t_IA/7;
				$ave_IB = $t_IB/9;
				$ave_IC = $t_IC/10;
				$ave_ID = $t_ID/3;
				$ave_II = $t_II/8;

				$assoc2 = array('a' => $ave_IA, 'b' => $ave_IB, 'c' => $ave_IC, 'd' => $ave_ID, 'ii' => $ave_II);

				$ave_I = ($ave_IA+$ave_IB+$ave_IC+$ave_ID)/4;
				$data['assoc'] = ($ave_I+$ave_II)/2;
			}

			$dean = $this->evaluation_model->getDeanEval($faculty, $sem_id);
			if($dean){
				$result = json_decode($dean['result']);

				$t_IA = $t_IB = $t_IC = $t_ID = $t_II = 0;

				foreach ((array) $result as $r) {
					if(substr($r->ID, 0, 2)=='IA'){
						$t_IA += $r->Value;
					} else if(substr($r->ID, 0, 2)=='IB'){
						$t_IB += $r->Value;
					} else if(substr($r->ID, 0, 2)=='IC'){
						$t_IC += $r->Value;
					} else if(substr($r->ID, 0, 2)=='ID'){
						$t_ID += $r->Value;
					} else if(substr($r->ID, 0, 2)=='II'){
						$t_II += $r->Value;
					}
				}

				$ave_IA = $t_IA/7;
				$ave_IB = $t_IB/9;
				$ave_IC = $t_IC/10;
				$ave_ID = $t_ID/3;
				$ave_II = $t_II/8;

				$dean2 = array('a' => $ave_IA, 'b' => $ave_IB, 'c' => $ave_IC, 'd' => $ave_ID, 'ii' => $ave_II);

				$ave_I = ($ave_IA+$ave_IB+$ave_IC+$ave_ID)/4;
				$data['dean'] = ($ave_I+$ave_II)/2;
			}
			//GET FACULTY LIST OF SUBJECT
			$fac_courses = $this->evaluation_model->getFacCourses($faculty, $sem_id);
			//LOOP THROUGH SUBJECT AND SELECT STUDENTS
			$students = array();
			foreach ($fac_courses as $key => $value) {
				$stud_course = $this->evaluation_model->getStudByCourse($value['id']);
				if($stud_course){
					foreach ($stud_course as $key => $value) {
						$students[] = $value;
					}
				}
			}

			if(count($students)>0){
				$students2 = array();
				foreach ($students as $key => $value) {
					$result = json_decode($value['result']);

					$t_IA = $t_IB = $t_IC = $t_ID = $t_II = 0;
					foreach ((array) $result as $r) {
						// echo $r->ID.'<br>';
						if(substr($r->ID, 0, 2)=='IA'){
							$t_IA += $r->Value;
						} else if(substr($r->ID, 0, 2)=='IB'){
							$t_IB += $r->Value;
						} else if(substr($r->ID, 0, 2)=='IC'){
							$t_IC += $r->Value;
						} else if(substr($r->ID, 0, 2)=='ID'){
							$t_ID += $r->Value;
						} else if(substr($r->ID, 0, 2)=='II'){
							$t_II += $r->Value;
						}
					}

					$ave_IA = $t_IA/7;
					$ave_IB = $t_IB/9;
					$ave_IC = $t_IC/10;
					$ave_ID = $t_ID/3;
					$ave_II = $t_II/8;

					$section = $this->evaluate_model->getSectionById($value['section_id']);
					$students2[] = array('section'=> $section['name'], 'a' => $ave_IA, 'b' => $ave_IB, 'c' => $ave_IC, 'd' => $ave_ID, 'ii' => $ave_II);
				}
				$s_IA = $s_IB = $s_IC = $s_ID = $s_II = 0;
				$totalStud = count($students2);
				foreach ($students2 as $key => $value) {
					$s_IA += $value['a'];
		  		$s_IB += $value['b'];
		  		$s_IC += $value['c'];
		  		$s_ID += $value['d'];
		  		$s_II += $value['ii'];
				}
				$ave_I = (($s_IA/$totalStud)+($s_IB/$totalStud)+($s_IC/$totalStud)+($s_ID/$totalStud))/4;
				$ave_stud = ($ave_I + ($s_II/$totalStud))/2;

				$data['student'] = array('a' => $this->evaluate_model->setRating($s_IA/$totalStud), 'b' => $this->evaluate_model->setRating($s_IB/$totalStud), 'c' => $this->evaluate_model->setRating($s_IC/$totalStud), 'd' => $this->evaluate_model->setRating($s_ID/$totalStud), 'ii' => $this->evaluate_model->setRating($s_II/$totalStud), 'ave_I' => $this->evaluate_model->setRating($ave_I), 'ave_stud' => $ave_stud);
			}

			$data['f'] = $this->evaluate_model->getUserById($faculty);
			$data['sy'] = $this->evaluate_model->getSemById($sem_id);

		$this->load->helper('pdf_helper');
    $this->load->view('evaluation/report', $data);
	}

	public function result($faculty = FALSE, $sem_id = FALSE)
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

		if(isset($_POST['faculty'])&&isset($_POST['sem'])){
			redirect('evaluation/result/'.$_POST['faculty'].'/'.$_POST['sem']);
		}

		$data['sem'] = $this->evaluate_model->getSem();
		$data['college'] = $this->evaluate_model->getCollege();

		if($faculty&&$sem_id)
		{	
			$assoc = $this->evaluation_model->getAssocEval($faculty, $sem_id);
			if($assoc){
				$result = json_decode($assoc['result']);

				$t_IA = $t_IB = $t_IC = $t_ID = $t_II = 0;

				foreach ((array) $result as $r) {
					if(substr($r->ID, 0, 2)=='IA'){
						$t_IA += $r->Value;
					} else if(substr($r->ID, 0, 2)=='IB'){
						$t_IB += $r->Value;
					} else if(substr($r->ID, 0, 2)=='IC'){
						$t_IC += $r->Value;
					} else if(substr($r->ID, 0, 2)=='ID'){
						$t_ID += $r->Value;
					} else if(substr($r->ID, 0, 2)=='II'){
						$t_II += $r->Value;
					}
				}

				$ave_IA = $t_IA/7;
				$ave_IB = $t_IB/9;
				$ave_IC = $t_IC/10;
				$ave_ID = $t_ID/3;
				$ave_II = $t_II/8;

				$data['assoc'] = array('a' => $ave_IA, 'b' => $ave_IB, 'c' => $ave_IC, 'd' => $ave_ID, 'ii' => $ave_II);
			}

			$dean = $this->evaluation_model->getDeanEval($faculty, $sem_id);
			if($dean){
				$result = json_decode($dean['result']);

				$t_IA = $t_IB = $t_IC = $t_ID = $t_II = 0;

				foreach ((array) $result as $r) {
					if(substr($r->ID, 0, 2)=='IA'){
						$t_IA += $r->Value;
					} else if(substr($r->ID, 0, 2)=='IB'){
						$t_IB += $r->Value;
					} else if(substr($r->ID, 0, 2)=='IC'){
						$t_IC += $r->Value;
					} else if(substr($r->ID, 0, 2)=='ID'){
						$t_ID += $r->Value;
					} else if(substr($r->ID, 0, 2)=='II'){
						$t_II += $r->Value;
					}
				}

				$ave_IA = $t_IA/7;
				$ave_IB = $t_IB/9;
				$ave_IC = $t_IC/10;
				$ave_ID = $t_ID/3;
				$ave_II = $t_II/8;

				$data['dean'] = array('a' => $ave_IA, 'b' => $ave_IB, 'c' => $ave_IC, 'd' => $ave_ID, 'ii' => $ave_II);
			}
			//GET FACULTY LIST OF SUBJECT
			$fac_courses = $this->evaluation_model->getFacCourses($faculty, $sem_id);
			//LOOP THROUGH SUBJECT AND SELECT STUDENTS
			$students = array();
			foreach ($fac_courses as $key => $value) {
				$stud_course = $this->evaluation_model->getStudByCourse($value['id']);
				if($stud_course){
					foreach ($stud_course as $key => $value) {
						$students[] = $value;
					}
				}
			}

			if(count($students)>0){
				$data['students'] = array();
				foreach ($students as $key => $value) {
					$result = json_decode($value['result']);

					$t_IA = $t_IB = $t_IC = $t_ID = $t_II = 0;
					foreach ((array) $result as $r) {
						// echo $r->ID.'<br>';
						if(substr($r->ID, 0, 2)=='IA'){
							$t_IA += $r->Value;
						} else if(substr($r->ID, 0, 2)=='IB'){
							$t_IB += $r->Value;
						} else if(substr($r->ID, 0, 2)=='IC'){
							$t_IC += $r->Value;
						} else if(substr($r->ID, 0, 2)=='ID'){
							$t_ID += $r->Value;
						} else if(substr($r->ID, 0, 2)=='II'){
							$t_II += $r->Value;
						}
					}

					$ave_IA = $t_IA/7;
					$ave_IB = $t_IB/9;
					$ave_IC = $t_IC/10;
					$ave_ID = $t_ID/3;
					$ave_II = $t_II/8;

					$section = $this->evaluate_model->getSectionById($value['section_id']);
					$data['students'][] = array('section'=> $section['name'], 'a' => $ave_IA, 'b' => $ave_IB, 'c' => $ave_IC, 'd' => $ave_ID, 'ii' => $ave_II);
				}
			}

			$data['f'] = $this->evaluate_model->getUserById($faculty);
			$data['sy'] = $sem_id;	
			$data['list_fac'] = $this->evaluate_model->getFacultyByCollege($data['f']['college']);
		}
		
		$this->load->view('templates/header');
		$this->load->view('evaluation/result', $data);
		$this->load->view('templates/footer');
	}
	//END
}