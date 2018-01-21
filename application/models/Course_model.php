<?php
class Course_model extends CI_Model{
	public function getSemForFaculty()
	{
		$this->db->where("instructor", $this->session->userdata('user_id'));
		$this->db->group_by("sem_id");
		$query = $this->db->get("course");

		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function getCourseById($id)
	{
		$query = $this->db->get_where('course', array('id' => $id));

		return $query->row_array();
	}

	public function getCoursesBySem($id)
	{
		$query = $this->db->get_where('course', array('sem_id' => $id, 'instructor' => $this->session->userdata('user_id')));

		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function getSemById($id)
	{
		$query = $this->db->get_where('semester', array('id' => $id));

		return $query->row_array();
	}

	public function getStudentById($id)
	{
		$query = $this->db->get_where('user', array('id' => $id, 'usertype' => 1));

		return $query->row_array();
	}

	public function getCourseStudent($course_id)
	{
		$sql = 'SELECT `student` FROM `course_log` WHERE `course` LIKE \'%"course":"'.$course_id.'"%\'';
		$query = $this->db->query($sql);

		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}		
	}
}