<?php
class Evaluate_model extends CI_Model{
	public function getEvalStatus()
	{
		$query = $this->db->get_where('status', array('name' => 'faculty_eval', 'active' => 1));
		return $query->row_array();
	}

	public function getCourse($sem_id, $user_id)
	{
		$query = $this->db->get_where('course_log', array('sem_id' => $sem_id, 'student' => $user_id));
		$courses = $query->result_array();

		$toSend = array();
		foreach ($courses as $c) {
			$a = $this->evaluate_model->getCourseById($c['course']);
			array_push($toSend, $a);
		}

		return $toSend;
	}

	public function getCourseById($id)
	{
		$query = $this->db->get_where('course', array('id' => $id));
		return $query->row_array();
	}

	public function getUserById($id)
	{
		$query = $this->db->get_where('user', array('id' => $id));
		return $query->row_array();
	}

	public function getSemById($id)
	{
		$query = $this->db->get_where('semester', array('id' => $id));
		return $query->row_array();
	}

	public function getQuestionsByCategory($category)
	{
		$query = $this->db->get_where('questions', array('category' => $category, 'active' => '1'));
		return $query->result_array();
	}

	public function getQuestionsByCategoryAll($category)
	{
		$query = $this->db->get_where('questions', array('category' => $category));
		return $query->result_array();
	}

	public function addEvalRes($course_id,$result)
	{
		$data = array(
						'student_id' => $this->session->userdata('user_id'),
						'course_id'  => $course_id,
						'result'		 => $result,
						'comment'		 => $this->db->escape($this->input->post('comment'))
		);

		$this->db->insert('eval_log', $data);
	}

	public function getTaposNa($course_id)
	{
		$result = $this->db->get_where('eval_log', array('student_id' => $this->session->userdata('user_id'), 'course_id' => $course_id));

		if($result->num_rows()==0){
			return false;
		} else {
			return true;
		}

	}

	public function getSem()
	{
		$this->db->order_by('name', 'DESC');
		$query = $this->db->get('semester');
		return $query->result_array();
	}

	public function getCollege()
	{
		$query = $this->db->get('ref_college');
		return $query->result_array();
	}

	public function getEvalResult($sem, $faculty)
	{
		$query = $this->db->get_where('course', array('sem_id' => $sem, 'instructor' => $faculty));
		$courses = $query->result_array(); 		//Get Courses

		$var1 = array();

		$ctr_course = 1;
		foreach ($courses as $c) {						//Loop through Courses
			// echo 'Course_'.$ctr_course.'<br>';
			$sql = "SELECT `result` FROM `eval_log` WHERE `course_id` = ".$c['id'];
			$query = $this->db->query($sql);
			$result = $query->result_array();		//Get Courses->Result

			if($query->num_rows()>0) {
				$var2 = array();

				foreach ($result as $r) {					//Decode and Store Results
				$x = json_decode($r['result']);
				array_push($var2, $x);
				}
				
				$totalPerQ = array();
				$itemA = array(); $itemB = array(); $itemC = array(); $itemD = array(); $itemE = array();
				$t_st = count($var2);
				$ctr_student = 1;
				foreach ($var2 as $st) {					//Loop through Student's Result
					// echo 'Student_'.$ctr_student.'<br>';
					foreach ($st as $qt) {					//Questions
						// echo 'ID: '.$qt->ID.' Value: '.$qt->Value.'<br>';
						if(array_key_exists($qt->ID, $totalPerQ)) {							//Search for Key In Array
							// echo 'TRUE'; 																					//Add Value
							$totalPerQ[$qt->ID] += $qt->Value;
						} else {
							// echo 'FALSE';																					//Push Data
							$totalPerQ[$qt->ID] = $qt->Value;
						}
					}
					$ctr_student++;
				}
				//Average Per Questions
				foreach ($totalPerQ as $key => $obj) {
					$obj = $obj/$t_st;
					switch (substr($key,0,1)) {
						case 'A': $itemA[] = array('id' => substr($key,1), 'qAve' => $obj); break;
						case 'B': $itemB[] = array('id' => substr($key,1), 'qAve' => $obj); break;
						case 'C': $itemC[] = array('id' => substr($key,1), 'qAve' => $obj); break;
						case 'D': $itemD[] = array('id' => substr($key,1), 'qAve' => $obj); break;
						case 'E': $itemE[] = array('id' => substr($key,1), 'qAve' => $obj); break;
					}
					// echo $key.' '.$obj.'<br>';
				}

				//Average Per Category
				$totalPerC = array(); $temp = 0;
				foreach ($itemA as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemA); $temp = 0;

				foreach ($itemB as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemB); $temp = 0;

				foreach ($itemC as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemC); $temp = 0;

				foreach ($itemD as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemD); $temp = 0;

				foreach ($itemE as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemE);

				$rating = array_sum($totalPerC) / count($totalPerC);

					if($rating>=4.50&&$rating<=5.00){
					$remarks = 'Outstanding';
				} else if($rating>=3.50&&$rating<4.50){
					$remarks = 'Very Satisfactory';
				} else if($rating>=2.50&&$rating<3.50){
					$remarks = 'Satisfactory';
				} else if($rating>=1.50&&$rating<2.50){
					$remarks = 'Fair';
				} else if($rating>=0&&$rating<1.50){
					$remarks = 'Poor';
				} else {
					$remarks = 'NA';
				}
				$rating = $this->evaluate_model->setRating($rating);

				$i = $this->evaluate_model->getUserById($c['instructor']);
				$instructor = $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'];

				$toPush = array('id' => $c['id'], 'title' => $c['title'], 'code' => $c['code'], 'faculty' => $instructor, 'rating' => $rating, 'remarks' => $remarks);

				array_push($var1, $toPush);				
				// print_r($itemA); echo '<br>';
				// print_r($itemB); echo '<br>';
				// print_r($itemC); echo '<br>';
				// print_r($itemD); echo '<br>';
				// print_r($itemE); echo '<br>';
				// print_r($totalPerQ); echo '<br>';
				// print_r($totalPerC); echo '<br>';
				// echo 'Rating: '.$rating.' Remarks: '.$remarks;
				// print_r($var2); echo "<br>";
			}
			$ctr_course++;
		}

		return $var1;
	}

	public function test(){
		
	}

	public function addEvalSched($name, $sem_id, $active, $start_date, $date)
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
		$query = $this->db->get_where('status', array('name' => 'faculty_eval', 'active' => 1));

		if($query->num_rows()>0){
			return true;
		} else {
			return false;
		}
	}

	public function getEvalSched(){
		$this->db->order_by('id', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get_where('status', array('name' => 'faculty_eval'));

		return $query->result_array();
	}

	function disableEvalSched($id){
		$data = array(
						'active' => 0
		);
		$this->db->where('id', $id);
		$this->db->update('status', $data);
	}

	function chkbox($id, $active){
		$data = array(
						'active' => $active
		);

		$this->db->where('id', $id);
		$this->db->update('questions', $data);
	}

	function getQuestionById($id){
		$query = $this->db->get_where('questions', array('id' => $id));
		return $query->row_array();
	}

	function saveQuestionEdit($id, $category, $question){
		$data = array(
						'category' => $category,
						'question' => $question
		);

		$this->db->where('id', $id);
		$this->db->update('questions', $data);
	}

	function getFacultyByCollege($college){
		$query = $this->db->get_where('user', array('usertype' => '2', 'college' => $college));
		return $query->result_array();
	}

	function setRating($num){
		$a = $num * 100;
		$a = floor($a);
		$a =  (float) ($a / 100);
		return $a;
	}
}