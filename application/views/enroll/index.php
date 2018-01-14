<?php
tcpdf();
$obj_pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Preliminary Enrollment Form";
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
$obj_pdf->SetFont('merriweather', '', 16);
$obj_pdf->SetY(32);
$obj_pdf->Cell(0, 0, 'PRELIMINARY ENROLLMENT FORM', 0, 1, 'C', 0, '', 0);
$obj_pdf->SetFont('helvetica', '', 9);
$college = $this->enroll_model->getCollegeById($this->session->userdata('college'));
$college = strtoupper($college['name']);
$course = $this->enroll_model->getCourseNameById($this->session->userdata('course'));
$course = strtoupper($course['name']);

$kirito = $this->enroll_model->getLastGrade2();
$sy = $this->enroll_model->getSemById($kirito['sem_id']);
$sy = explode(' ', $sy['name']);
switch ($sy[1]) {
	case 'First': $sem = '1st';	break;
	case 'Second': $sem = '2nd'; break;
	case 'Summer': $sem = $sy[1]; break;
}
$sy = substr($sy[0], 2);
$section = $this->enroll_model->getSectionById($kirito['section_id']);
$section = $section['name'];
$html = '
<style>
	.c1{text-align:center;font-weight:bold;font-size:10px;}
</style>
<table cellspacing="0" cellpadding="4" border="1">
	<tr>
		<td colspan="2">College/Department<div class="c1">'.$college.'</div></td>
		<td colspan="2">Course<div class="c1">'.$course.'</div></td>
	</tr>
	<tr>
		<td width="90">Semester<div class="c1">'.$sem.'</div></td>
		<td width="173.5">School Year<div class="c1">'.$sy.'</div></td>
		<td width="81">Section<div class="c1">'.$section.'</div></td>
		<td width="182">Student Number<div class="c1">'.$this->session->userdata('user_ID').'</div></td>
	</tr>
	<tr>
		<td width="90" align="center"><div style="font-size:5pt">&nbsp;</div>Student\'s Name</td>
		<td width="173.5">Last Name<div class="c1">'.$this->session->userdata('lname').'</div></td>
		<td width="173.5">First Name<div class="c1">'.$this->session->userdata('fname').'</div></td>
		<td width="">M.I.<div class="c1">'.$this->session->userdata('mname').'</div></td>
	</tr>
</table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');


$courses = $this->enroll_model->getLastGrade();
$html = '
<table cellspacing="0" cellpadding="4">
	<tr bgcolor="#dddddd">
		<td width="63" align="center" style="border:1px solid #000;">Subject Code</td>
		<td width="190" align="center" style="border:1px solid #000;">Subject Title</td>
		<td width="40" align="center" style="border:1px solid #000;">Credits</td>
		<td width="35" align="center" style="border:1px solid #000;">Final Grade</td>
		<td width="51" align="center" style="border:1px solid #000;">Point Equivalent</td>
		<td width="51" align="center" style="border:1px solid #000;">Point Equivalent</td>
		<td width="51" align="center" style="border:1px solid #000;">Letter Equivalent</td>
		<td width="46" align="center" style="border:1px solid #000;">Remarks</td>
	</tr>';

$num1=0;$tUnits=0;
foreach ($courses as $key => $value) {
	$num1 += $value['grade']*$value['unit']; $tUnits += $value['unit'];
	$grade = $this->enroll_model->calcGrade($value['grade']);
$html .= '
	<tr>
		<td align="center" style="border:1px solid #000;">'.$value['code'].'</td>
		<td style="border:1px solid #000;">'.$value['title'].'</td>
		<td align="center" style="border:1px solid #000;">'.$value['unit'].'</td>
		<td align="center" style="border:1px solid #000;">'.$value['grade'].'</td>
		<td align="center" style="border:1px solid #000;">'.$grade['npe'].'</td>
		<td align="center" style="border:1px solid #000;">'.$grade['ope'].'</td>
		<td align="center" style="border:1px solid #000;">'.$grade['le'].'</td>
		<td align="center" style="border:1px solid #000;">'.$grade['remarks'].'</td>
	</tr>';
}
$gwa = $this->enroll_model->calcGrade($num1/$tUnits);
$html .= '
	<tr>
		<td></td>
		<td align="right"><b>Total Units:</b></td>
		<td align="center"><b>'.$tUnits.'</b></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td align="right"><b>GENERAL WEIGHTED AVERAGE (GWA):</b></td>
		<td></td>
		<td style="border:1px solid #000;" align="center"><b>'.number_format($num1/$tUnits, 2, '.', ' ').'</b></td>
		<td style="border:1px solid #000;" align="center"><b>'.$gwa['npe'].'</b></td>
		<td style="border:1px solid #000;" align="center"><b>'.$gwa['ope'].'</b></td>
		<td style="border:1px solid #000;" align="center"><b>'.$gwa['le'].'</b></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td align="right"><b>ACADEMIC STANDING:</b></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');

$html = '';
$obj_pdf->writeHTMLCell(0, 0, 135, 75, 'New &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Old', 0, 1, false, true, '', true);

$obj_pdf->writeHTMLCell(0, 0, 89, 165, '<b>SUBJECTS TO ENROLL</b>', 0, 1, false, true, '', true);

$toEnroll = $this->enroll_model->toEnroll();

$html = '
<table cellspacing="0" cellpadding="4">
	<tr>
		<td width="100" style="border:1px solid #000;" align="center">Subject Code</td>
		<td width="327" style="border:1px solid #000;" align="center">Subject Title</td>
		<td width="100" style="border:1px solid #000;" align="center">Units</td>
	</tr>';
$tUnits=0;
foreach ($toEnroll as $key => $value) {
	$tUnits += $value['units'];
	$html .= '
	<tr>
		<td style="border:1px solid #000;" align="center">'.$value['code'].'</td>
		<td style="border:1px solid #000;">'.$value['title'].'</td>
		<td style="border:1px solid #000;" align="center">'.$value['units'].'</td>
	</tr>';
}

$html .= '
	<tr>
		<td></td>
		<td align="right"><b>Total Academic Units:</b></td>
		<td align="center"><b>'.$tUnits.'</b></td>
	</tr>
</table>';
$obj_pdf->writeHTML($html, true, false, true, false, '');

$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');
?>