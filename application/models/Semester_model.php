<?php
class Semester_model extends CI_Model{
	public function getSem()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get('semester');
		return $query->result_array();
	}

	public function getStudentSem($sy = FALSE, $limit = FALSE, $offset = FALSE)
	{

		$sql = 'SELECT `user`.`id`, `user`.`first_name`, `user`.`middle_name`, `user`.`last_name`, `user`.`user_ID`, `user`.`college`, `user`.`course`, `course_log`.`section_id` FROM `course_log` JOIN `user` ON `course_log`.`student`=`user`.`id` WHERE `course_log`.`sem_id` = '.$sy.' ORDER BY `user`.`last_name`, `user`.`first_name`, `user`.`middle_name`';

		if($limit){
			$sql .= ' LIMIT '.$limit.' OFFSET '.$offset;
		}

		$query = $this->db->query($sql);

		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}
	}	

	public function getTotalStud($sy)
	{
		$sql = 'SELECT `user`.`id`, `user`.`first_name`, `user`.`middle_name`, `user`.`last_name`, `user`.`user_ID`, `user`.`college`, `user`.`course`, `course_log`.`section_id` FROM `course_log` JOIN `user` ON `course_log`.`student`=`user`.`id` WHERE `course_log`.`sem_id` = '.$sy.' ORDER BY `user`.`last_name`';

		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function searchStudent($search)
	{
		$sql = "SELECT * FROM `user` WHERE `first_name`LIKE '".$search."%' OR `last_name` LIKE '".$search."%' OR `user_ID` LIKE '".$search."%'";
		$query = $this->db->query($sql);

		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function getUserById($id)
	{
		$query = $this->db->get_where('user', array('id' => $id));

		return $query->row_array();
	}

	public function getSemById()
	{

	}

	public function getSemForSel($id)
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('course_log', array('student' => $id));

		if($query->num_rows()>0){
			$course_log = $query->result_array();

			$data = array();
			foreach ($course_log as $key => $value) {
				$a = $this->viewgrade_model->getSemById($value['sem_id']);
				array_push($data, $a);
			}
			return $data;
		} else {
			return false;
		}
	}

	function populateTable($id, $std){
		$query = $this->db->get_where('course_log', array('sem_id' => $id, 'student' => $std));
		$result = $query->row_array();
		$courses = json_decode($result['course']);

		$data = array();
		foreach ($courses as $key => $value) {
			$a = $this->viewgrade_model->getCourseById($value->course);
			$b['code'] = $a['code'];
			$b['title'] = $a['title'];
			$b['units'] = $a['unit'];
			$b['grade'] = $value->grade;

			$grade = $this->enroll_model->calcGrade($value->grade);
			$b['npe'] = $grade['npe'];
			$b['ope'] = $grade['ope'];
			$b['le'] = $grade['le'];
			$b['remarks'] = $grade['remarks'];
			array_push($data, $b);
		}
		return $data;
	}
}