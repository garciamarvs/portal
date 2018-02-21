<?php
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
	$obj_pdf->SetY(38);
	$obj_pdf->SetFont('helvetica', 'B', 13);
  $obj_pdf->Cell(0, 0, 'FACULTY & EMPLOYEES PERFORMANCE EVALUATION ', 0, 1, 'C', 0, '', 0);
  $obj_pdf->Cell(0, 0, '& DEVELOPMENT OFFICE', 0, 1, 'C', 0, '', 0);
  $obj_pdf->SetY(58);
  $obj_pdf->Cell(0, 0, 'FACULTY EVALUATION RESULTS', 0, 1, 'C', 0, '', 0);
  $obj_pdf->SetFont('helvetica', '', 10);
  $obj_pdf->Cell(0, 0, $sy['name'], 0, 1, 'C', 0, '', 0);

  $html = '<br><br>
<table cellspacing="0" cellpadding="4">
	<tr>
		<td>Name of Instructor: <b>';
if($f['last_name']==''){
		$html .= $f['first_name'].' '.$f['middle_name'];
	} else { 
		$html .= $f['last_name'].', '.$f['first_name'].' '.$f['middle_name'];
	}
	$html .='</b></td>
		<td></td>
	</tr>
	<tr>
		<td>Results:</td>
	</tr>
</table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');

$obj_pdf->SetY(90);
$html = '
<table cellspacing="0" cellpadding="4" style="border:1px solid #000;">
	<tr>
		<td width="230" align="center" style="border:1px solid #000;">Evaluator</td>
		<td width="100" align="center" style="border:1px solid #000;">Mean</td>
		<td width="100" align="center" style="border:1px solid #000;">Average</td>
		<td width="100" align="center" style="border:1px solid #000;">Equivalent</td>
	</tr>
	<tr>
		<td style="border:1px solid #000;"><b>Student</b></td>
		<td style="border:1px solid #000;"></td>
		<td style="border:1px solid #000;"></td>
		<td style="border:1px solid #000;"></td>
	</tr>
	<tr>
		<td style="border-right:1px solid #000;"><b>I. Teaching Effectiveness</b></td>
		<td style="border-right:1px solid #000;" align="center">'.$student['ave_I'].'</td>
		<td style="border-right:1px solid #000;" align="center"></td>
		<td style="border-right:1px solid #000;" align="center"></td>
	</tr>
	<tr>
		<td style="border-right:1px solid #000;">&nbsp;&nbsp;&nbsp;A. Knowledge of the Subject Matter</td>
		<td style="border-right:1px solid #000;" align="center">'.$student['a'].'</td>
		<td style="border-right:1px solid #000;" align="center"></td>
		<td style="border-right:1px solid #000;" align="center"></td>
	</tr>
	<tr>
		<td style="border-right:1px solid #000;">&nbsp;&nbsp;&nbsp;B. Teaching Skills</td>
		<td style="border-right:1px solid #000;" align="center">'.$student['b'].'</td>
		<td style="border-right:1px solid #000;" align="center"></td>
		<td style="border-right:1px solid #000;" align="center"></td>
	</tr>
	<tr>
		<td style="border-right:1px solid #000;">&nbsp;&nbsp;&nbsp;C. Classroom Management & Evaluation Skills</td>
		<td style="border-right:1px solid #000;" align="center">'.$student['c'].'</td>
		<td style="border-right:1px solid #000;" align="center"></td>
		<td style="border-right:1px solid #000;" align="center"></td>
	</tr>
	<tr>
		<td style="border-right:1px solid #000;">&nbsp;&nbsp;&nbsp;D. Motivation Strategies and Teaching</td>
		<td style="border-right:1px solid #000;" align="center">'.$student['d'].'</td>
		<td style="border-right:1px solid #000;" align="center"></td>
		<td style="border-right:1px solid #000;" align="center"></td>
	</tr>
	<tr>
		<td style="border-right:1px solid #000;"></td>
		<td style="border-right:1px solid #000;"></td>
		<td style="border-right:1px solid #000;"></td>
		<td style="border-right:1px solid #000;"></td>
	</tr>
	<tr>
		<td style="border-right:1px solid #000;"><b>II. Personality And Public Relations</b></td>
		<td style="border-right:1px solid #000;" align="center">'.$student['ii'].'</td>
		<td style="border-right:1px solid #000;" align="center">'.$this->evaluate_model->setRating($student['ave_stud']).'</td>
		<td style="border-right:1px solid #000;" align="center">'.$this->evaluate_model->setRating($student['ave_stud']*.5).'</td>
	</tr>
	<tr>
		<td style="border:1px solid #000;"><b>Associate Dean/Department Head</b></td>
		<td style="border:1px solid #000;" align="center">';
	
	if(isset($assoc)){
		$html .= $this->evaluate_model->setRating($assoc);
	}

	$html .= '</td>
		<td style="border:1px solid #000;" align="center">';
	
	if(isset($assoc)){
		$html .= $this->evaluate_model->setRating($assoc);
	}

	$html .= '</td>
		<td style="border:1px solid #000;" align="center">';

	if(isset($assoc)){
		$html .= $this->evaluate_model->setRating($assoc*.2);
	}

	$html .= '</td>
	</tr>
	<tr>
		<td style="border:1px solid #000;"><b>Dean</b></td>
		<td style="border:1px solid #000;" align="center">';

	if(isset($dean)){
		$html .= $this->evaluate_model->setRating($dean);
	}

	$html .= '</td>
		<td style="border:1px solid #000;" align="center">';

	if(isset($dean)){
		$html .= $this->evaluate_model->setRating($dean);
	}

	$html .= '</td>
		<td style="border:1px solid #000;" align="center">';


	if(isset($assoc)&&isset($dean)) {
		$html .= $this->evaluate_model->setRating($dean*.3);
	} else if(isset($dean)) {
		$html .= $this->evaluate_model->setRating($dean*.5);
	}

	$html .= '</td>
	</tr>
</table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');

$obj_pdf->SetY(168);
$html = '<br><br>
<table cellspacing="0" cellpadding="4">
	<tr>
		<td width="100">OVERALL MEAN: </td>
		<td><b>';

	if(isset($assoc)&&isset($dean)) {
		$final = ($student['ave_stud']*.5)+($assoc*.2)+($dean*.3);
		$html .= $this->evaluate_model->setRating($final);
	} else if(isset($dean)) {
		$final = ($student['ave_stud']*.5)+($dean*.5);
		$html .= $this->evaluate_model->setRating($final);
	}

	$html .='</b></td>
	</tr>
	<tr>
		<td>INTERPRETATION: </td>
		<td><b>';

	if(isset($final)){
		if($final>=4.51&&$final<=5.00){
			$html .= 'Outstanding';
		} else if($final>3.51&&$final<=4.50){
			$html .= 'Very Satisfactoy';
		} else if($final>2.51&&$final<=3.50){
			$html .= 'Satisfactoy';
		} else if($final>1.51&&$final<=2.50){
			$html .= 'Unsatisfactory';
		} else if($final>1.00&&$final<=1.50){
			$html .= 'Poor';
		}
	}

	$html .= '</b></td>
	</tr>
</table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');

$obj_pdf->SetY(190);
$html = '<br><br>
<table cellspacing="0" cellpadding="4">
	<tr>
		<td width="50"><b>LEGEND</b></td>
		<td width="65"></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>4.51 - 5.00</td>
		<td>Outstanding</td>
	</tr>
	<tr>
		<td></td>
		<td>3.51 - 4.50</td>
		<td>Very Satisfactoy</td>
	</tr>
	<tr>
		<td></td>
		<td>2.51 - 3.50</td>
		<td>Satisfactoy</td>
	</tr>
	<tr>
		<td></td>
		<td>1.51 - 2.50</td>
		<td>Unsatisfactory</td>
	</tr>
	<tr>
		<td></td>
		<td>1.00 - 1.50</td>
		<td>Poor</td>
	</tr>
</table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');
	$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');
?>