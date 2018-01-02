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
tcpdf();
$obj_pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Evaluation Result";
$obj_pdf->SetTitle($title);
// $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
// $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
  // we can have any view part here like HTML, PHP etc
$i = $this->evaluate_model->getUserById($c['instructor']);
$instructor = $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'];
$j = $this->evaluate_model->getSemById($c['sem_id']); $year_sem = substr($j['name'],2,10); $sem_name = substr($j['name'],12);

$obj_pdf->SetY(40);
$html = '<table cellspacing="0" cellpadding="4" border="1"><tr><td>Subject Code:<br><b>'.$c['code'].'</b></td><td>Subject Title:<br><b>'.$c['title'].'</b></td><td>Professor:<br><b>'.$instructor.'</b></td><td>School Year:<br><b>'.$year_sem.'</b></td><td>Semester:<br><b>'.$sem_name.'</b></td></tr></table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');

$tbl = <<<EOD
<table cellspacing="0" cellpadding="4" border="1">
	<tr bgcolor="#dddddd">
		<th width="50" align="center">SCALE</th>
		<th width="100" align="center">RATING</th>
		<th width="0">DESCRIPTION</th>
	</tr>
	<tr>
		<td align="center">5</td>
		<td align="center">Outstanding</td>
		<td>The performance almost exceeds the job requirements. The faculty is an exceptional role model</td>
	</tr>
	<tr>
		<td align="center">4</td>
		<td align="center">Very Satisfactory</td>
		<td>Performance meets and often exceeds job requirements</td>
	</tr>
	<tr>
		<td align="center">3</td>
		<td align="center">Satisfactory</td>
		<td>Performance meets the job requirements</td>
	</tr>
	<tr>
		<td align="center">2</td>
		<td align="center">Fair</td>
		<td>Performance needs improvement to meet job requirements</td>
	</tr>
	<tr>
		<td align="center">1</td>
		<td align="center">Poor</td>
		<td>The faculty fails to meet the job requirements</td>
	</tr>
</table>
EOD;
$obj_pdf->writeHTML($tbl, true, false, true, false, '');

$html ='
<table cellspacing="0" cellpadding="4" border="1">
	<tr bgcolor="#dddddd">
		<td><b>A. Presentation of Content</b></td>
	</tr>';
foreach ($itemA as $a) {
	$i = $this->evaluate_model->getQuestionById($a['id']);
	$html .= '
	<tr>
		<td width="487">'.$i['question'].'</td>
		<td width="40" align="center">'.$a['qAve'].'</td>
	</tr>';
}
$html .='
	<tr>
		<td align="right"><b>Average</b></td>
		<td align="center"><b>'.$totalPerC[0].'</b></td>
	</tr>
	<tr bgcolor="#dddddd">
		<td colspan="2"><b>B. Clarity of Expectations or Directions</b></td>
	</tr>';
foreach ($itemB as $a) {
	$i = $this->evaluate_model->getQuestionById($a['id']);
	$html .= '
	<tr>
		<td width="487">'.$i['question'].'</td>
		<td width="40" align="center">'.$a['qAve'].'</td>
	</tr>';
}
$html .='
	<tr>
		<td align="right"><b>Average</b></td>
		<td align="center"><b>'.$totalPerC[1].'</b></td>
	</tr>
	<tr bgcolor="#dddddd">
		<td colspan="2"><b>C. Helpfulness/Availability</b></td>
	</tr>';
foreach ($itemC as $a) {
	$i = $this->evaluate_model->getQuestionById($a['id']);
	$html .= '
	<tr>
		<td width="487">'.$i['question'].'</td>
		<td width="40" align="center">'.$a['qAve'].'</td>
	</tr>';
}
$html .='
	<tr>
		<td align="right"><b>Average</b></td>
		<td align="center"><b>'.$totalPerC[2].'</b></td>
	</tr>
	<tr bgcolor="#dddddd">
		<td colspan="2"><b>D. Useful/Clear Feedback on Performance</b></td>
	</tr>';
foreach ($itemD as $a) {
	$i = $this->evaluate_model->getQuestionById($a['id']);
	$html .= '
	<tr>
		<td width="487">'.$i['question'].'</td>
		<td width="40" align="center">'.$a['qAve'].'</td>
	</tr>';
}
$html .='
	<tr>
		<td align="right"><b>Average</b></td>
		<td align="center"><b>'.$totalPerC[3].'</b></td>
	</tr>
	<tr bgcolor="#dddddd">
		<td colspan="2"><b>E. Encouraging of Participation/Discussion</b></td>
	</tr>';
foreach ($itemE as $a) {
	$i = $this->evaluate_model->getQuestionById($a['id']);
	$html .= '
	<tr>
		<td width="487">'.$i['question'].'</td>
		<td width="40" align="center">'.$a['qAve'].'</td>
	</tr>';
}
$html .='
	<tr>
		<td align="right"><b>Average</b></td>
		<td align="center"><b>'.$totalPerC[4].'</b></td>
	</tr></table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');

$html = '
<table cellspacing="0" cellpadding="4">
	<tr bgcolor="#dddddd">
		<td width="487" align="right"><b><i>Final Average</i></b></td>
		<td width="40"><b><i>'.$rating.'</i></b></td>
	</tr>
</table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');

$html = '
<table>
	<tr>
		<td width="226" style="border-bottom:1px solid #000;"></td>
		<td width="75" rowspan="3" align="center" valign="middle" style="font-size:12px;">
		<div style="font-size:2.5pt">&nbsp;</div>End of Report</td>
		<td width="226" style="border-bottom:1px solid #000;"></td>
	</tr>
</table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');
  $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');

?>