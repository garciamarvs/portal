<style type="text/css">
	div#page-wrapper.gray-bg.dashbard-1{
		height: 100%;
	}
</style>

<script>
	$(document).ready(function(){
		$('body').addClass('mini-navbar');
		$('.i-checks').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
    });
	});
</script>
<h2 class="text-center"><strong>EVALUATION OF CLASSROOM INSTRUCTION</strong></h2>
<div style="border: 1px solid #1ab394">
	<table class="table" style="margin-bottom: 0;">
		<thead>
			<tr class="p-md">
				<td class="col-md-3" style="background-color: white; border-right: 1px solid #d9d9d9">Name of Instructor:<br><b><?php if($f['last_name']==''){echo $f['first_name'].' '.$f['middle_name'];}else{ echo $f['last_name'].', '.$f['first_name'].' '.$f['middle_name'];} ?></b></td>
				<td class="col-md-2" style="background-color: white; border-right: 1px solid #d9d9d9">College/Department:<br><b><?php $college = $this->evaluation_model->getCollegeById($f['college']); echo $college['name']; ?></b></td>
				<td class="col-md-2" style="background-color: white; border-right: 1px solid #d9d9d9">School Year:<br><b><?php echo substr($sy['name'],2,10); ?></b></td>
				<td class="col-md-2"  style="background-color: white; border-right: 1px solid #d9d9d9">Semester:<br><b><?php echo substr($sy['name'],12); ?></b></td>
				<td class="col-md-2" style="background-color: white;">Date:<br><b><?= date('F d, Y') ?></b></td>
			</tr>
		</thead>
	</table>
</div>

<div class="ibox">
	<div class="ibox-content">
		<div class="row">
			<strong>RATING INTERPRETATION</strong><br>
			<pre>	5 - Outstanding		4 - Very Satisfactory		3 - Satisfactory<br>
				2 - Unsatisfactory		1 - Poor
			</pre>
		</div>

<?php
$xxi = [
	'Ability to motivate the students',
	'Mastery of the subject matter',
	'Development of the lesson',
	'Mastery on the art of questioning',
	'Openness to student\'s question',
	'Classroom Management',
	'Maximum class participation/interaction',
	'Awareness to student\'s needs',
	'Provision for individual difference taht is adapting to the students level',
	'Utilization of instructional materials and boardwork preparation',
	'Communication Skills',
	'Integration of Values Education',
	'Evaluation Results (Objective achieved)',
	'Provision for follow up work/assignment'
];

$xii = [
	'Attitude towards work as a teacher',
	'Punctuality and attendance',
	'Grooming including wearing of prescribed uniform',
	'Student-Teacher relationship',
	'Promotion of wholesome peer relationship'
];

$iii = [
	'Warm perception and non-threatening atmosphere',
	'Clean and orderly class environment',
	'Flexible chair arrangement to allow informal room setting'
];

$xiv = [
	'Updated class record',
	array('a. DTR','b. Grade Sheet','c. Class Record','d. Syllabus','e. Assignment work/report and researches'),
	'Attendance in meetings; School/City of Manila activities'
];
?>

		<?php echo form_open(base_url().'evaluation/d/'.$f['id'].'/'.$sy['id']) ?>
		<table class="table table-bordered">
		  <tbody>
		  <tr class="gray-bg">
		  	<th class="text-center">INDICATOR / VARIABLE</th>
		  	<th class="text-center" colspan="5">RATING</th>
		  </tr>
		  <tr class="gray-bg">
		  	<th colspan="6">PART I.&emsp;TEACHER COMPETENCE</th>
		  </tr>
		  <?php for ($i=0; $i < 14; $i++) { ?>
		  <tr>
		  	<td class="col-md-8"><?= ($i+1).'. '.$xxi[$i] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '00I'.$i ?>" value="5" <?php echo set_radio('00I'.$i, '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '00I'.$i ?>" value="4" <?php echo set_radio('00I'.$i, '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '00I'.$i ?>" value="3" <?php echo set_radio('00I'.$i, '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '00I'.$i ?>" value="2" <?php echo set_radio('00I'.$i, '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '00I'.$i ?>" value="1" <?php echo set_radio('00I'.$i, '1') ?> required> 1 </label></td>
		  </tr>
		  <?php } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">PART II.&emsp;TEACHER PERSONALITY</th>
		  </tr>
		  <?php for ($i=0; $i < 5; $i++) { ?>
		  <tr>
		  	<td class="col-md-8"><?= ($i+1).'. '.$xii[$i] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0II'.$i ?>" value="5" <?php echo set_radio('0II'.$i, '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0II'.$i ?>" value="4" <?php echo set_radio('0II'.$i, '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0II'.$i ?>" value="3" <?php echo set_radio('0II'.$i, '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0II'.$i ?>" value="2" <?php echo set_radio('0II'.$i, '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0II'.$i ?>" value="1" <?php echo set_radio('0II'.$i, '1') ?> required> 1 </label></td>
		  </tr>
		  <?php } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">PART III.&emsp;LEARNING ENVIRONMENT</th>
		  </tr>
		  <?php for ($i=0; $i < 3; $i++) { ?>
		  <tr>
		  	<td class="col-md-8"><?= ($i+1).'. '.$iii[$i] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'III'.$i ?>" value="5" <?php echo set_radio('III'.$i, '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'III'.$i ?>" value="4" <?php echo set_radio('III'.$i, '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'III'.$i ?>" value="3" <?php echo set_radio('III'.$i, '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'III'.$i ?>" value="2" <?php echo set_radio('III'.$i, '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'III'.$i ?>" value="1" <?php echo set_radio('III'.$i, '1') ?> required> 1 </label></td>
		  </tr>
		  <?php } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">PART IV.&emsp;COMPLIANCE ON SCHOOL REQUIREMENTS<br>(PERFORMANCE RATING)</th>
		  </tr>
		  <tr>
		  	<td class="col-md-8"><?= '1. '.$xiv[0] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV0' ?>" value="5" <?php echo set_radio('0IV0', '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV0' ?>" value="4" <?php echo set_radio('0IV0', '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV0' ?>" value="3" <?php echo set_radio('0IV0', '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV0' ?>" value="2" <?php echo set_radio('0IV0', '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV0' ?>" value="1" <?php echo set_radio('0IV0', '1') ?> required> 1 </label></td>
		  </tr>

		  <tr>
		  	<td class="col-md-8" colspan="6"><?= '2. Punctuality in the submission of:' ?></td>
		  </tr>

		 <?php for ($i=0; $i < 5; $i++) { ?>
		  <tr>
		  	<td class="col-md-8">&emsp;<?= $xiv[1][$i] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV1'.$i ?>" value="5" <?php echo set_radio('0IV1'.$i, '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV1'.$i ?>" value="4" <?php echo set_radio('0IV1'.$i, '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV1'.$i ?>" value="3" <?php echo set_radio('0IV1'.$i, '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV1'.$i ?>" value="2" <?php echo set_radio('0IV1'.$i, '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV1'.$i ?>" value="1" <?php echo set_radio('0IV1'.$i, '1') ?> required> 1 </label></td>
		  </tr>
		  <?php } ?>

		  <tr>
		  	<td class="col-md-8"><?= '3. '.$xiv[2] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV2' ?>" value="5" <?php echo set_radio('0IV2', '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV2' ?>" value="4" <?php echo set_radio('0IV2', '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV2' ?>" value="3" <?php echo set_radio('0IV2', '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV2' ?>" value="2" <?php echo set_radio('0IV2', '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= '0IV2' ?>" value="1" <?php echo set_radio('0IV2', '1') ?> required> 1 </label></td>
		  </tr>

		  <tr class="gray-bg">
		  	<th colspan="6">PART V.&emsp;COMMENTS/REMARKS</th>
		  </tr>
		  <tr>
		  	<td colspan="6">
		  		<div class="form-group">
						<label>Comments/Suggestion:</i></label>
						<textarea class="form-control" name="comment" maxlength="255"></textarea>
					</div>
		  	</td>
		  </tr>

		  </tbody>
		</table>

		<div class="row">
			<button type="submit" class="btn btn-w-m btn-primary col-md-4 col-md-offset-4">Submit Evaluation</button>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
