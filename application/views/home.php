<?php 
			$sql = "SELECT `result` FROM `eval_log` WHERE `course_id` = ".$c['id'];
			$query = $this->db->query($sql);
			$result = $query->result_array();		//Get Courses->Result

			if($query->num_rows()>0) {
				$var2 = array();

				foreach ($result as $r) {					//Decode and Store Results
				$x = json_decode($r['result']);
				array_push($var2, $x);
				}
				
				$totalPerQ = array();
				$itemA = array(); $itemB = array(); $itemC = array(); $itemD = array(); $itemE = array();
				$t_st = count($var2);
				$ctr_student = 1;
				foreach ($var2 as $st) {					//Loop through Student's Result
					// echo 'Student_'.$ctr_student.'<br>';
					foreach ($st as $qt) {					//Questions
						// echo 'ID: '.$qt->ID.' Value: '.$qt->Value.'<br>';
						if(array_key_exists($qt->ID, $totalPerQ)) {							//Search for Key In Array
							// echo 'TRUE'; 																					//Add Value
							$totalPerQ[$qt->ID] += $qt->Value;
						} else {
							// echo 'FALSE';																					//Push Data
							$totalPerQ[$qt->ID] = $qt->Value;
						}
					}
					$ctr_student++;
				}
				//Average Per Questions
				foreach ($totalPerQ as $key => $obj) {
					$obj = $obj/$t_st;
					switch (substr($key,0,1)) {
						case 'A': $itemA[] = array('id' => substr($key,1), 'qAve' => $obj); break;
						case 'B': $itemB[] = array('id' => substr($key,1), 'qAve' => $obj); break;
						case 'C': $itemC[] = array('id' => substr($key,1), 'qAve' => $obj); break;
						case 'D': $itemD[] = array('id' => substr($key,1), 'qAve' => $obj); break;
						case 'E': $itemE[] = array('id' => substr($key,1), 'qAve' => $obj); break;
					}
					// echo $key.' '.$obj.'<br>';
				}

				//Average Per Category
				$totalPerC = array(); $temp = 0;
				foreach ($itemA as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemA); $temp = 0;

				foreach ($itemB as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemB); $temp = 0;

				foreach ($itemC as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemC); $temp = 0;

				foreach ($itemD as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemD); $temp = 0;

				foreach ($itemE as $a) {
					$temp += $a['qAve'];
				}
				$totalPerC[] = $temp/count($itemE);

				$rating = array_sum($totalPerC) / count($totalPerC);

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

				$i = $this->evaluate_model->getUserById($c['instructor']);
				$instructor = $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'];

				$toPush = array('id' => $c['id'], 'title' => $c['title'], 'code' => $c['code'], 'faculty' => $instructor, 'rating' => $rating, 'remarks' => $remarks);
				
				// print_r($itemA); echo '<br>';
				// print_r($itemB); echo '<br>';
				// print_r($itemC); echo '<br>';
				// print_r($itemD); echo '<br>';
				// print_r($itemE); echo '<br>';
				// print_r($totalPerQ); echo '<br>';
				// print_r($totalPerC); echo '<br>';
				// echo 'Rating: '.$rating.' Remarks: '.$remarks;
				// print_r($var2); echo "<br>";
			}
?>