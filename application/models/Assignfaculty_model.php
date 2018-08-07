<?php
class Assignfaculty_model extends CI_Model {
	public function getCourses()
	{
		$query = $this->db->get_where('ref_course', array('college' => $this->session->userdata('college')));

		return $query->result_array();
	}

	public function getSem()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get('semester');
		return $query->result_array();
	}

	public function getSection($course)
	{
		$this->db->like('name', $course, 'after');
		$query = $this->db->get('ref_section');

		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}		
	}

	public function getCoursesPerSection($section, $sy)
	{
		$query = $this->db->get_where('course', array('section_id' => $section, 'sem_id' => $sy));
		
		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}
		
	}

	public function getSectionById($id)
	{
		$query = $this->db->get_where('ref_section', array('id' => $id));
		return $query->row_array();
	}

	public function getFaculty()
	{
		$query = $this->db->get_where('user', array('usertype' => 2, 'college' => $this->session->userdata('college')));

		return $query->result_array();
	}

	function populatePanel($sy, $course)
	{
		$section = $this->assignfaculty_model->getSection($course);
		$data = array();

		if($section){
			foreach ($section as $key => $value) {
				$sectionCourse = $this->assignfaculty_model->getCoursesPerSection($value['id'], $sy);
				if($sectionCourse){
					foreach ($sectionCourse as $k => $v) {
						$course_section = $this->assignfaculty_model->getSectionById($v['section_id']);
						$sectionCourse[$k]['section'] = $course_section['name'];
					}
					$sectionCourse['section_name'] = $value['name'];
					array_push($data, $sectionCourse);
				} else {
					$data[] = false;
				}
			}
		} else {
			$data = false;
		}

		return $data;
	}

	function setFaculty($course, $faculty)
	{
		$data = array(
        	'instructor' => $faculty
		);

		$this->db->where('id', $course);
		$this->db->update('course', $data);
	}
}