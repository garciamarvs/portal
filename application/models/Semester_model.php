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

		$sql = 'SELECT `user`.`id`, `user`.`first_name`, `user`.`middle_name`, `user`.`last_name`, `user`.`user_ID`, `user`.`college`, `user`.`course`, `course_log`.`section_id` FROM `course_log` JOIN `user` ON `course_log`.`student`=`user`.`id` WHERE `course_log`.`sem_id` = '.$sy.' ORDER BY `user`.`last_name`';

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
}