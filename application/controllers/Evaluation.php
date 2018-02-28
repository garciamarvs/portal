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
			$this->load->view('evaluation/form2');
			$this->load->view('templates/footer');
		}		
	}

	public function schedule()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 6){
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
			$select = $_POST['sections'];
			$sections = implode(",", $select);
			$start_date = $this->input->post('start_date').' 00:00:00';
			$end_date		= $this->input->post('end_date').' 24:00:00';

			$this->evaluation_model->addEvalSched($name, $sem_id, $faculty, $sections, $active, $start_date, $end_date);

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

		//I
		for ($i=0; $i < 14; $i++) { 
			$this->form_validation->set_rules('00I'.$i, '00I'.$i, 'required');
		}

		//II
		for ($i=0; $i < 5; $i++) { 
			$this->form_validation->set_rules('0II'.$i, '0II'.$i, 'required');
		}

		//III
		for ($i=0; $i < 3; $i++) { 
			$this->form_validation->set_rules('III'.$i, 'III'.$i, 'required');
		}

		//IV
			$this->form_validation->set_rules('0IV0', '0IV0', 'required');

			for ($i=0; $i < 5; $i++) { 
				$this->form_validation->set_rules('0IV1'.$i, '0IV1'.$i, 'required');
			}

			$this->form_validation->set_rules('0IV2', '0IV2', 'required');

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

			

			//I
			for ($i=0; $i < 14; $i++) {
				$x = array('ID' => '00I'.$i, 'Value' => $this->input->post('00I'.$i));
				array_push($toSend, $x);
			}

			//II
			for ($i=0; $i < 5; $i++) { 
				$x = array('ID' => '0II'.$i, 'Value' => $this->input->post('0II'.$i));
				array_push($toSend, $x);
			}

			//III
			for ($i=0; $i < 3; $i++) { 
				$x = array('ID' => 'III'.$i, 'Value' => $this->input->post('III'.$i));
				array_push($toSend, $x);
			}

			//IV
				$toSend[] = array('ID' => '0IV0', 'Value' => $this->input->post('0IV0'));

				for ($i=0; $i < 5; $i++) { 
					$x = array('ID' => '0IV1'.$i, 'Value' => $this->input->post('0IV1'.$i));
					array_push($toSend, $x);
				}

				$toSend[] = array('ID' => '0IV2', 'Value' => $this->input->post('0IV2'));

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
		if($this->session->userdata('usertype') != 6){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}
			//ASSOC
			$assoc = $this->evaluation_model->getAssocEval($faculty, $sem_id);
			if($assoc){
				$result = json_decode($assoc['result']);

				$t_I = $t_II = $t_III = $t_IV = $t_IV1 = 0;

				foreach ((array) $result as $r) {
					// echo $r->ID.' = '.$r->Value.'<br>';
					if(substr($r->ID, 0, 3)=='00I'){
						$t_I += $r->Value;
					} else if(substr($r->ID, 0, 3)=='0II'){
						$t_II += $r->Value;
					} else if(substr($r->ID, 0, 3)=='III'){
						$t_III += $r->Value;
					} else if(substr($r->ID, 0, 3)=='0IV'){
						switch (substr($r->ID, 3, 1)) {
							case '0':	
								$t_IV += $r->Value;
							break;
							case '1':	
								$t_IV1 += $r->Value;
							break;
							case '2':	
								$t_IV += $r->Value;
							break;
						}
					}
				}

				$ave_I = $t_I/14;
				$ave_II = $t_II/5;
				$ave_III = $t_III/3;
				$ave_IV1 = $t_IV1/5;
				$ave_IV = ($t_IV+$ave_IV1)/3;

				// echo $ave_I.' '.$ave_II.' '.$ave_III.' '.$ave_IV.'<br>';

				$data['assoc'] = array('i' => $ave_I, 'ii' => $ave_II, 'iii' => $ave_III, 'iv' => $ave_IV);
			}

			$dean = $this->evaluation_model->getDeanEval($faculty, $sem_id);
			if($dean){
				$result = json_decode($dean['result']);

				$t_I = $t_II = $t_III = $t_IV = $t_IV1 = 0;

				foreach ((array) $result as $r) {
					// echo $r->ID.' = '.$r->Value.'<br>';
					if(substr($r->ID, 0, 3)=='00I'){
						$t_I += $r->Value;
					} else if(substr($r->ID, 0, 3)=='0II'){
						$t_II += $r->Value;
					} else if(substr($r->ID, 0, 3)=='III'){
						$t_III += $r->Value;
					} else if(substr($r->ID, 0, 3)=='0IV'){
						switch (substr($r->ID, 3, 1)) {
							case '0':	
								$t_IV += $r->Value;
							break;
							case '1':	
								$t_IV1 += $r->Value;
							break;
							case '2':	
								$t_IV += $r->Value;
							break;
						}
					}
				}

				$ave_I = $t_I/14;
				$ave_II = $t_II/5;
				$ave_III = $t_III/3;
				$ave_IV1 = $t_IV1/5;
				$ave_IV = ($t_IV+$ave_IV1)/3;

				// echo $ave_I.' '.$ave_II.' '.$ave_III.' '.$ave_IV.'<br>';

				$data['dean'] = array('i' => $ave_I, 'ii' => $ave_II, 'iii' => $ave_III, 'iv' => $ave_IV);
			}

			//STUDENT
			$status = $this->evaluation_model->getEvalSection($faculty, $sem_id);
			$data['students'] = array();
			foreach ($status as $stat) {
				$allSections = explode(',', $stat['sections']);
				foreach ($allSections as $allSec) {
					//GET FACULTY LIST OF SUBJECT
					$fac_courses = $this->evaluation_model->getFacCourses($faculty, $allSec, $sem_id);
					//LOOP THROUGH SUBJECT AND SELECT STUDENTS
					foreach ($fac_courses as $key => $value) {					
						$stud = $this->evaluation_model->getStudByCourse($value['id']);
						if($stud){
							$totalStud = count($stud);
							$s_IA = $s_IB = $s_IC = $s_ID = $s_II = 0;
							foreach ($stud as $key => $value) {
								// echo $value['result'].'<br>';

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

								//AVERAGE OF AREAS
								$ave_IA = $t_IA/7;
								$ave_IB = $t_IB/9;
								$ave_IC = $t_IC/10;
								$ave_ID = $t_ID/3;
								$ave_II = $t_II/8;
								// echo $ave_IA.' '.$ave_IB.' '.$ave_IC.' '.$ave_ID.' '.$ave_II.'<br>';

								//ADD TO SECTION's RESULT
								$s_IA += $ave_IA;
								$s_IB += $ave_IB;
								$s_IC += $ave_IC;
								$s_ID += $ave_ID;
								$s_II += $ave_II;
							}
							
							$s_IA = $s_IA/$totalStud;
							$s_IB = $s_IB/$totalStud;
							$s_IC = $s_IC/$totalStud;
							$s_ID = $s_ID/$totalStud;
							$s_II = $s_II/$totalStud;

							// echo $s_IA.' '.$s_IB.' '.$s_IC.' '.$s_ID.' '.$s_II.'<br>';
							$section_name = $this->evaluate_model->getSectionById($allSec);
							$data['students'][] = array('section'=> $section_name['name'], 'a' => $s_IA, 'b' => $s_IB, 'c' => $s_IC, 'd' => $s_ID, 'ii' => $s_II);
						}
						// echo "<br>";					
					}
			}
			
			}

			$data['f'] = $this->evaluate_model->getUserById($faculty);
			$data['sy'] = $this->evaluate_model->getSemById($sem_id);

		$this->load->helper('pdf_helper');
    $this->load->view('evaluation/report', $data);
	}

	public function evalRes($sem_id = FALSE)
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

		$data['sy'] = $this->evaluate_model->getSemById($sem_id);

		$this->load->view('templates/header');
		$this->load->view('evaluation/evalres', $data);
		$this->load->view('templates/footer');
	}

	public function result($faculty = FALSE, $sem_id = FALSE)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 6){
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

				$t_I = $t_II = $t_III = $t_IV = $t_IV1 = 0;

				foreach ((array) $result as $r) {
					// echo $r->ID.' = '.$r->Value.'<br>';
					if(substr($r->ID, 0, 3)=='00I'){
						$t_I += $r->Value;
					} else if(substr($r->ID, 0, 3)=='0II'){
						$t_II += $r->Value;
					} else if(substr($r->ID, 0, 3)=='III'){
						$t_III += $r->Value;
					} else if(substr($r->ID, 0, 3)=='0IV'){
						switch (substr($r->ID, 3, 1)) {
							case '0':	
								$t_IV += $r->Value;
							break;
							case '1':	
								$t_IV1 += $r->Value;
							break;
							case '2':	
								$t_IV += $r->Value;
							break;
						}
					}
				}

				$ave_I = $t_I/14;
				$ave_II = $t_II/5;
				$ave_III = $t_III/3;
				$ave_IV1 = $t_IV1/5;
				$ave_IV = ($t_IV+$ave_IV1)/3;

				// echo $ave_I.' '.$ave_II.' '.$ave_III.' '.$ave_IV.'<br>';

				$data['assoc'] = array('i' => $ave_I, 'ii' => $ave_II, 'iii' => $ave_III, 'iv' => $ave_IV);
			}

			$dean = $this->evaluation_model->getDeanEval($faculty, $sem_id);
			if($dean){
				$result = json_decode($dean['result']);

				$t_I = $t_II = $t_III = $t_IV = $t_IV1 = 0;

				foreach ((array) $result as $r) {
					// echo $r->ID.' = '.$r->Value.'<br>';
					if(substr($r->ID, 0, 3)=='00I'){
						$t_I += $r->Value;
					} else if(substr($r->ID, 0, 3)=='0II'){
						$t_II += $r->Value;
					} else if(substr($r->ID, 0, 3)=='III'){
						$t_III += $r->Value;
					} else if(substr($r->ID, 0, 3)=='0IV'){
						switch (substr($r->ID, 3, 1)) {
							case '0':	
								$t_IV += $r->Value;
							break;
							case '1':	
								$t_IV1 += $r->Value;
							break;
							case '2':	
								$t_IV += $r->Value;
							break;
						}
					}
				}

				$ave_I = $t_I/14;
				$ave_II = $t_II/5;
				$ave_III = $t_III/3;
				$ave_IV1 = $t_IV1/5;
				$ave_IV = ($t_IV+$ave_IV1)/3;

				// echo $ave_I.' '.$ave_II.' '.$ave_III.' '.$ave_IV.'<br>';

				$data['dean'] = array('i' => $ave_I, 'ii' => $ave_II, 'iii' => $ave_III, 'iv' => $ave_IV);
			}

			//STUDENT
			$status = $this->evaluation_model->getEvalSection($faculty, $sem_id);
			$data['students'] = array();
			$data['stud_comments'] = array();
			foreach ($status as $stat) {
				$allSections = explode(',', $stat['sections']);
				foreach ($allSections as $allSec) {
					$stud_count = 0;
					//GET FACULTY LIST OF SUBJECT
					$fac_courses = $this->evaluation_model->getFacCourses($faculty, $allSec, $sem_id);
					//LOOP THROUGH SUBJECT AND SELECT STUDENTS
					foreach ($fac_courses as $key => $value) {
						$stud = $this->evaluation_model->getStudByCourse($value['id']);
						if($stud){
							$totalStud = count($stud);
							$stud_count += $totalStud;
							$s_IA = $s_IB = $s_IC = $s_ID = $s_II = 0;
							foreach ($stud as $key => $value) {
								// echo $value['result'].'<br>';

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

								//AVERAGE OF AREAS
								$ave_IA = $t_IA/7;
								$ave_IB = $t_IB/9;
								$ave_IC = $t_IC/10;
								$ave_ID = $t_ID/3;
								$ave_II = $t_II/8;
								// echo $ave_IA.' '.$ave_IB.' '.$ave_IC.' '.$ave_ID.' '.$ave_II.'<br>';

								//ADD TO SECTION's RESULT
								$s_IA += $ave_IA;
								$s_IB += $ave_IB;
								$s_IC += $ave_IC;
								$s_ID += $ave_ID;
								$s_II += $ave_II;

								if($value['comment']!="''"){
									$data['stud_comments'][] = $value['comment'];
								}							
							}
							
							$s_IA = $s_IA/$totalStud;
							$s_IB = $s_IB/$totalStud;
							$s_IC = $s_IC/$totalStud;
							$s_ID = $s_ID/$totalStud;
							$s_II = $s_II/$totalStud;

							// echo $s_IA.' '.$s_IB.' '.$s_IC.' '.$s_ID.' '.$s_II.'<br>';
							$section_name = $this->evaluate_model->getSectionById($allSec);
							$data['students'][] = array('section' => $section_name['name'], 'a' => $s_IA, 'b' => $s_IB, 'c' => $s_IC, 'd' => $s_ID, 'ii' => $s_II, 'count' => $stud_count);
						}
						// echo "<br>";
					}
				}
			}
			

			// if(count($students)>0){
			// 	$data['students'] = array();
			// 	foreach ($students as $key => $value) {
			// 		$result = json_decode($value['result']);

			// 		$t_IA = $t_IB = $t_IC = $t_ID = $t_II = 0;
			// 		foreach ((array) $result as $r) {
			// 			// echo $r->ID.'<br>';
			// 			if(substr($r->ID, 0, 2)=='IA'){
			// 				$t_IA += $r->Value;
			// 			} else if(substr($r->ID, 0, 2)=='IB'){
			// 				$t_IB += $r->Value;
			// 			} else if(substr($r->ID, 0, 2)=='IC'){
			// 				$t_IC += $r->Value;
			// 			} else if(substr($r->ID, 0, 2)=='ID'){
			// 				$t_ID += $r->Value;
			// 			} else if(substr($r->ID, 0, 2)=='II'){
			// 				$t_II += $r->Value;
			// 			}
			// 		}

			// 		$ave_IA = $t_IA/7;
			// 		$ave_IB = $t_IB/9;
			// 		$ave_IC = $t_IC/10;
			// 		$ave_ID = $t_ID/3;
			// 		$ave_II = $t_II/8;

			// 		$section = $this->evaluate_model->getSectionById($value['section_id']);
			// 		$data['students'][] = array('section'=> $section['name'], 'a' => $ave_IA, 'b' => $ave_IB, 'c' => $ave_IC, 'd' => $ave_ID, 'ii' => $ave_II);
			// 	}
			// }

			$data['f'] = $this->evaluate_model->getUserById($faculty);
			$data['sy'] = $sem_id;	
			$data['list_fac'] = $this->evaluate_model->getFacultyByCollege($data['f']['college']);
		}
		
		$this->load->view('templates/header');
		$this->load->view('evaluation/result', $data);
		$this->load->view('templates/footer');
	}
	//END

	//AJAXs
	function getSectionByFac(){
		$faculty = $this->input->post('faculty');
		$sem = $this->input->post('sem');

		$data = $this->evaluation_model->getSectionByFac($faculty, $sem);
		echo json_encode(array('status' => 'success', 'out' => $data));
	}
}