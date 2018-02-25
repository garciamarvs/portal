<?php
class Evaluation_model extends CI_Model {

	public function getFacCourses($faculty, $section, $sem_id)
	{
		$query = $this->db->get_where('course', array('instructor' => $faculty, 'section_id' => $section, 'sem_id' => $sem_id));

		return $query->result_array();
	}

	public function getStudCourses($sem_id)
	{
		$query = $this->db->get_where('course_log', array('sem_id' => $sem_id, 'student' => $this->session->userdata('user_id')));

		return $query->row_array();
	}

	public function getEvalStatus()
	{
		$query = $this->db->get_where('status', array('name' => 'faculty_eval', 'active' => 1));
		return $query->result_array();
	}

	public function getCollegeById($id)
	{
		$query = $this->db->get_where('ref_college', array('code' => $id));

		return $query->row_array();
	}

	public function addEvalSched($name, $sem_id, $faculty, $sections, $active, $start_date, $date)
	{
		$data = array(
						'name'			 => $name,
						'sem_id'		 => $sem_id,
						'faculty'		 => $faculty,
						'sections' 	 => $sections,
						'active'		 => $active,
						'start_date' => $start_date,
						'date'			 => $date

		);

		$this->db->insert('status', $data);
	}

	public function getDeanEval($faculty, $sem_id)
	{
		$query = $this->db->get_where('eval_log', array('faculty' => $faculty, 'sem_id' => $sem_id, 'dean_id !=' => ''));

		if($query->num_rows()>0){
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function getAssocEval($faculty, $sem_id)
	{
		$query = $this->db->get_where('eval_log', array('faculty' => $faculty, 'sem_id' => $sem_id, 'assoc_id !=' => ''));

		if($query->num_rows()>0){
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function getStudByCourse($course_id)
	{
		$query = $this->db->get_where('eval_log', array('course_id' => $course_id));

		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function getEvalSection($faculty, $sem)
	{
		$query = $this->db->get_where('status', array('name' => 'faculty_eval', 'active' => 1, 'faculty' => $faculty, 'sem_id' => $sem));

		return $query->row_array();
	}

	//AJAXs

	function getSectionByFac($faculty, $sem){
		$this->db->group_by('section_id');
		$query = $this->db->get_where('course', array('instructor' => $faculty, 'sem_id' => $sem));

		$data = array();
		if($query->num_rows()>0){
			$courses = $query->result_array();

			foreach ($courses as $key => $value) {
				$section = $this->evaluate_model->getSectionById($value['section_id']);

				$data[] = $section;
			}

			return $data;
		} else {
			return false;
		}
	}
}
