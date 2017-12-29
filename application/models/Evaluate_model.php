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
		//Get Courses By Faculty
		$query = $this->db->get_where('course', array('sem_id' => $sem, 'instructor' => $faculty));
		$courses = $query->result_array();

		$var1 = array();

		//Get Evaluation Results By Course
		foreach ($courses as $c) {			
			$sql = "SELECT `result` FROM `eval_log` WHERE `course_id` = ".$c['id'];
			$query = $this->db->query($sql);
			$result = $query->result_array();

			$var2 = array();

			//Store Decoded Result
			foreach ($result as $r) {
				$x = json_decode($r['result']);
				array_push($var2, $x);
			}

			//Caculating Rating
			$std = array(); $ctr_std = 0;
			foreach ($var2 as $x) {
				$prev_id = ""; $total = array(); $ctr_id = 0; $temp = 0;
				for($i=0,$t=count($x);$i<$t;$i++){
					//Check if ID is the same as previous ID
					if(substr($x[$i]->ID,0,1) == $prev_id){
						$ctr_id++;
						$temp = $temp + $x[$i]->Value;
						// echo $i.' '.'ctr_id: '.$ctr_id.' prev_id: '.$prev_id.' ID: '.$x[$i]->ID.' Value: '.$x[$i]->Value.' $temp: '.$temp.'<br>';
					} else {
						if($prev_id != ""){
							$total[] = $temp/$ctr_id;
							$ctr_id = 1;
							$prev_id = substr($x[$i]->ID,0,1);
							$temp = $x[$i]->Value;
						} else {
							$ctr_id = 1;
							$prev_id = substr($x[$i]->ID,0,1);
							$temp = $x[$i]->Value;
						}
						// echo $i.' '.'ctr_id: '.$ctr_id.' prev_id: '.$prev_id.' ID: '.$x[$i]->ID.' Value: '.$x[$i]->Value.' $temp: '.$temp.'<br>';
					}
				}
				$ctr_std++;
				// echo array_sum($total) / count($total).'<br>';
				$std[] = array_sum($total) / count($total);
			}
			$rating = array_sum($std) / count($std);
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
			// echo array_sum($std) / count($std).'<br>';
			// echo "Rating: ".$rating;

			$i = $this->evaluate_model->getUserById($c['instructor']);
			$instructor = $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'];

			$toPush = array('id' => $c['id'], 'title' => $c['title'], 'code' => $c['code'], 'faculty' => $instructor, 'rating' => $rating, 'remarks' => $remarks);

			array_push($var1, $toPush);
		}

		return $var1;
	}

	public function test(){
		
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