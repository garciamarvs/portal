<?php
class Viewgrade_model extends CI_Model {
	public function getSemForSelect()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('course_log', array('student' => $this->session->userdata('user_id')));

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

	public function getSemById($id)
	{
		$query = $this->db->get_where('semester', array('id' => $id));

		return $query->row_array();
	}

	public function getCourseById($id)
	{
		$query = $this->db->get_where('course', array('id' => $id));

		return $query->row_array();
	}

	function populateTable($id){
		$query = $this->db->get_where('course_log', array('sem_id' => $id, 'student' => $this->session->userdata('user_id')));
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