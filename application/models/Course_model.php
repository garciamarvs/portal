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
		$sql = 'SELECT `section_id` FROM `course` WHERE `instructor` = '.$this->session->userdata('user_id').' AND `sem_id` = '.$id.' GROUP BY `section_id`';
		$query = $this->db->query($sql);

		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function getCoursePerSection($section, $sy)
	{
		$query = $this->db->get_where('course', array('sem_id' => $sy, 'section_id' => $section, 'instructor' => $this->session->userdata('user_id')));

		return $query->result_array();
	}

	public function getSectionById($id)
	{
		$query = $this->db->get_where('ref_section', array('id' => $id));

		return $query->row_array();
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
		$sql = 'SELECT `user`.`id`, `user`.`first_name`, `user`.`middle_name`, `user`.`last_name`, `user`.`user_ID` FROM `course_log` JOIN `user` ON `course_log`.`student`=`user`.`id` WHERE `course_log`.`course` LIKE \'%"course":"'.$course_id.'"%\' ORDER BY `user`.`last_name`';
		$query = $this->db->query($sql);

		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}
	}
}