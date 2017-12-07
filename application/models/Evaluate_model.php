<?php
class Evaluate_model extends CI_Model{
	public function getEvalStatus()
	{
		$query = $this->db->get_where('status', array('name' => 'faculty_eval'));
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

	public function getUserById($id){
		$query = $this->db->get_where('user', array('id' => $id));
		return $query->row_array();
	}
}