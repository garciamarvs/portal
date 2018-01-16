<?php
class Enroll_model extends CI_Model{
	public function getEnrollStatus()
	{
		$query = $this->db->get_where('status', array('name' => 'enroll', 'active' => 1));
		return $query->row_array();
	}

	public function getSemById($id)
	{
		$query = $this->db->get_where('semester', array('id' => $id));
		return $query->row_array();
	}

	public function getActiveEnroll()
	{
		$query = $this->db->get_where('status', array('name' => 'enroll', 'active' => 1));
		return $query->row_array();
	}

	public function getActiveSem()
	{
		$query = $this->db->get_where('semester', array('active' => 1));
		return $query->row_array();
	}

	public function getAllCourse()
	{
		$query = $this->db->get_where('course_log', array('student' => $this->session->userdata('user_id')));
		return $query->result_array();
	}

	public function getSectionById($id)
	{
		$query = $this->db->get_where('ref_section', array('id' => $id));
		return $query->row_array();
	}

	public function calcGrade($grade)
	{
		if($grade>=98.00&&$grade<=100.00)		 		 {$a = '4.00'; $b = '1.00'; $c = 'A+'; $d = 'PASSED';}
		else if($grade>=95.00&&$grade<=97.99){$a = '3.75'; $b = '1.25'; $c = 'A';  $d = 'PASSED';}
		else if($grade>=92.00&&$grade<=94.99){$a = '3.50'; $b = '1.50'; $c = 'A-'; $d = 'PASSED';}
		else if($grade>=89.00&&$grade<=91.99){$a = '3.25'; $b = '1.75'; $c = 'B+'; $d = 'PASSED';} 
		else if($grade>=86.00&&$grade<=88.99){$a = '3.00'; $b = '2.00'; $c = 'B';  $d = 'PASSED';} 
		else if($grade>=83.00&&$grade<=85.99){$a = '2.75'; $b = '2.25'; $c = 'B-'; $d = 'PASSED';} 
		else if($grade>=79.00&&$grade<=82.99){$a = '2.50'; $b = '2.50'; $c = 'C+'; $d = 'PASSED';} 
		else if($grade>=76.00&&$grade<=78.99){$a = '2.25'; $b = '2.75'; $c = 'C';  $d = 'PASSED';} 
		else if($grade>=75.00&&$grade<=75.99){$a = '2.00'; $b = '3.00'; $c = 'C-'; $d = 'PASSED';} 
		else if($grade>= 0.00&&$grade<=74.99){$a = '1.00'; $b = '5.00'; $c = 'D';  $d = 'FAILED';}

		$result = array('npe' => $a, 'ope' => $b, 'le' => $c, 'remarks' => $d);

		return $result;
	}

	public function getLastGrade()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('course_log', array('student' => $this->session->userdata('user_id')));

		$raw = $query->row_array();

		$raw = json_decode($raw['course']);
		
		$courses = array();

		foreach ($raw as $key => $value) {
			$a = $this->evaluate_model->getCourseById($value->course);
			$a['grade'] = $value->grade;
			array_push($courses, $a);
		}

		return $courses;
	}

	public function getLastGrade2()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('course_log', array('student' => $this->session->userdata('user_id')));

		return $query->row_array();
	}

	public function getCollegeById($id)
	{
		$query = $this->db->get_where('ref_college', array('code' => $id));
		return $query->row_array();
	}

	public function getCourseNameById($id)
	{
		$query = $this->db->get_where('ref_course', array('code' => $id));
		return $query->row_array();
	}

	public function toEnroll()
	{
		$college = $this->session->userdata('college');
		$course = $this->session->userdata('course');
		$sem = $this->enroll_model->getActiveEnroll();
		$sem = $this->enroll_model->getSemById($sem['sem_id']);
		$sem = explode(" ", $sem['name']);

		$result = $this->enroll_model->getAllCourse();

		$courses = array();

		$var1 = array();
		foreach ($result as $r) {
			$x = json_decode($r['course']);
			array_push($var1, $x);
		}

		foreach ((array) $var1 as $c) {
			foreach ($c as $c2) {
				$a = $this->evaluate_model->getCourseById($c2->course);
				$a['grade'] = $c2->grade;
				array_push($courses, $a);
			}
		}

		$var2 = array();
		foreach ($courses as $var) {
			if(!in_array($var['section_id'], $var2)){
				$var2[] = $var['section_id'];
			}
		}

		$year = 0;
		foreach ($var2 as $var) {
			$asd = $this->enroll_model->getSectionById($var);
			$asd = intval(substr($asd['name'], 2, 1));
			if($asd>$year){
				$year=$asd;
			}
		}

		if($sem[1]=='First'){
			$year++;
		}

		$query = $this->db->get_where('ref_curriculum', array('college' => $college, 'course' => $course, 'year' => $year, 'sem' => $sem[1]));

		$curriculum = $query->result_array();

		$toEnroll = array();

		foreach ($curriculum as $key => $value) {
			if ($value['prerequisite/corequisite']!="") {
				$temp = explode(",", $value['prerequisite/corequisite']);
				$ctr = 0; $cap = count($temp);
				$x_co = array_column($courses, 'code');
				foreach ($temp as $t) {
					$temp2 = array_search($t, $x_co);
					if($temp2) {
						$grade = $this->enroll_model->calcGrade($courses[$temp2]['grade']);
				    // echo "FOUND ";
				    if($grade['remarks']=='PASSED'){
							// echo "PASSED <br>";
							$ctr++;
							if($ctr==$cap){
								array_push($toEnroll, $value);
							}
						}
					} else {
						// echo "NOT FOUND <br>";
					}
				}
			} elseif ($value['prerequisite/corequisite']=="Standing") {
				# code...
			} else {
				array_push($toEnroll, $value);
			}
		}
		return $toEnroll;
	}

	public function getSem()
	{
		$query = $this->db->get_where('semester', array('active' => 1));
		$sem = $query->row_array();

		$this->db->order_by('name', 'DESC');
		$query = $this->db->get_where('semester', array('id >' => $sem['id']));
		return $query->result_array();
	}

	public function getEnrollSched(){
		$this->db->order_by('id', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get_where('status', array('name' => 'enroll'));

		return $query->result_array();
	}

	public function addEnrollSched($name, $sem_id, $active, $start_date, $date)
	{
		$data = array(
						'name'			 => $name,
						'sem_id'		 => $sem_id,
						'active'		 => $active,
						'start_date' => $start_date,
						'date'			 => $date

		);

		$this->db->insert('status', $data);
	}

	public function getActiveSched(){
		$query = $this->db->get_where('status', array('name' => 'enroll', 'active' => 1));

		if($query->num_rows()>0){
			return true;
		} else {
			return false;
		}
	}
}