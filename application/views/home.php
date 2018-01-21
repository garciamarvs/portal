<!-- <?php
		$college = $this->session->userdata('college');
		$course = $this->session->userdata('course');
		$sem = $this->enroll_model->getActiveEnroll();
		$sem = $this->enroll_model->getSemById($sem['sem_id']);
		$sem = explode(" ", $sem['name']);

		$result = $this->enroll_model->getAllCourse();

		$courses = array();

		$var1 = array();
		foreach ($result as $r) {
			$x = json_decode($r['course']);
			array_push($var1, $x);
		}

		foreach ((array) $var1 as $c) {
			foreach ($c as $c2) {
				$a = $this->evaluate_model->getCourseById($c2->course);
				$a['grade'] = $c2->grade;
				array_push($courses, $a);
			}
		}

		$var2 = array();
		foreach ($courses as $var) {
			if(!in_array($var['section_id'], $var2)){
				$var2[] = $var['section_id'];
			}
		}

		$year = 0;
		foreach ($var2 as $var) {
			$asd = $this->enroll_model->getSectionById($var);
			$asd = intval(substr($asd['name'], 2, 1));
			if($asd>$year){
				$year=$asd;
			}
		}

		if($sem[1]=='First'){
			$year++;
		}

		$query = $this->db->get_where('ref_curriculum', array('college' => $college, 'course' => $course, 'year' => $year, 'sem' => $sem[1]));

		$curriculum = $query->result_array();

		$toEnroll = array();

		foreach ($curriculum as $key => $value) {
			if ($value['prerequisite/corequisite']!="") {
				$temp = explode(",", $value['prerequisite/corequisite']);
				$ctr = 0; $cap = count($temp);
				$x_co = array_column($courses, 'code');
				foreach ($temp as $t) {
					$temp2 = array_search($t, $x_co);
					if($temp2) {
						$grade = $this->enroll_model->calcGrade($courses[$temp2]['grade']);		
				    // echo "FOUND ";
				    // echo '$t='.$t.' '.$courses[$temp2]['title'].' '.$courses[$temp2]['code'].' '.$courses[$temp2]['grade'].' '.$grade['remarks'];
				    if($grade['remarks']=='PASSED'){
							// echo "PASSED <br>";
							$ctr++;
							if($ctr==$cap){
								array_push($toEnroll, $value);
							}
						}
						// echo '<br>';
					} else {
						// echo "NOT FOUND <br>";
					}
				}
			} elseif ($value['prerequisite/corequisite']=="Standing") {
				# code...
			} else {
				array_push($toEnroll, $value);
			}
		}
		print_r($toEnroll);
?> -->