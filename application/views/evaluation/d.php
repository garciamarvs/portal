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

<div style="border: 1px solid #1ab394">
	<table class="table" style="margin-bottom: 0;">
		<thead>
			<tr class="p-md">
				<td class="col-md-3" style="background-color: white; border-right: 1px solid #d9d9d9">Professor:<br><b><?php if($f['last_name']==''){echo $f['first_name'].' '.$f['middle_name'];}else{ echo $f['last_name'].', '.$f['first_name'].' '.$f['middle_name'];} ?></b></td>
				<td class="col-md-2" style="background-color: white; border-right: 1px solid #d9d9d9">School Year:<br><b><?php echo substr($sy['name'],2,10); ?></b></td>
				<td class="col-md-2" style="background-color: white;">Semester:<br><b><?php echo substr($sy['name'],12); ?></b></td>
			</tr>
		</thead>
	</table>
</div>

<div class="ibox">
	<div class="ibox-content">
		<table class="table table-bordered">
		  <thead>
		  <tr>
        <th class="col-md-2 text-center">SCALE</th>
        <th class="col-md-2 text-center">RATING</th>
        <th class="col-md-8">DESCRIPTION</th>
	    </tr>
	    </thead>
	    <tbody>
	    	<tr>
	    		<td class="text-center">5</td>
	    		<td class="text-center">Always</td>
	    		<td>(91% to 100% of the time)</td>
	    	</tr>
	    	<tr>
	    		<td class="text-center">4</td>
	    		<td class="text-center">Often</td>
	    		<td>(66% to 90% of the time)</td>
	    	</tr>
	    	<tr>
	    		<td class="text-center">3</td>
	    		<td class="text-center">Sometime</td>
	    		<td>(36% to 65% of the time)</td>
	    	</tr>
	    	<tr>
	    		<td class="text-center">2</td>
	    		<td class="text-center">Rarely</td>
	    		<td>(below 11% to 35% of the time)</td>
	    	</tr>
	    	<tr>
	    		<td class="text-center">1</td>
	    		<td class="text-center">Never</td>
	    		<td>(Not at all)</td>
	    	</tr>
		  </tbody>
		</table>

<?php
$a = [
	'Explain the subject matter clearly',
	'Integrates subject matter with relevant topics',
	'Answers questions directly and clearly',
	'Gives relevant examples and illustrations',
	'Presents the lesson systematically',
	'Reviews past lessons before discussing new lessons',
	'Cites timely and up-to-date information on the subject'
];

$b = [
	'Communicates in English and/or Filipino fluently',
	'Expresses his ideas clearly and well',
	'Summarizes the lesson at the end of the class',
	'Adjusts teaching methods to student\'s needs interest and capabilities',
	'Uses variety of techniques, approaches and strategies to make the lesson more interesting',
	'Displays effective gestures in explaaining the lesson',
	'Relates lesson to existing condition real-life situations and other courses',
	'Encourages students to asks questions',
	'Provides challenging tasks, problems or assignments'
];

$c = [
	'Utilizes class period productively',
	'Returns students corrected papers and tests immediately',
	'Defines course expectations enforce school policies & regulations',
	'Comes and leaves class on time',
	'Maintains class discipline properly',
	'Available for consultation',
	'Explains the basis for grading clearly',
	'Evaluates student\'s performance fairly',
	'Reguarly checks the student\'s attendance and warns students who are frequently absent and/or tardy',
	'Helps students in correcting undersirable behavior'
];

$d = [
	'Stresses important points of the subject matter by repeating underlining or giving them more time than the less important ones',
	'Tries to find out if the students have learned the subject matter by asking questions or by encouraging students to ask questions',
	'Praises or expresses approval of students who show desirable academic behaviors like doing assignments, participating in class activities, etc.'
];

$ii = [
	'Show self confidence',
	'Treats students fairly',
	'Observes proper manner among his students',
	'Approachable anytime',
	'Dresses appropriately, decently and neatly',
	'Shows refinement in manners, language and behavior in the class',
	'Maintains eye contact with the students when speaking',
	'Shows recognition to students by smiling, nodding, greeting, etc. when he/she meets them outside the class'
];
?>

		<?php echo form_open(base_url().'evaluation/d/'.$f['id'].'/'.$sy['id']) ?>
		<table class="table table-bordered">
		  <tbody>
		  <tr class="gray-bg">
		  	<th colspan="6">AREAS</th>
		  </tr>
		  <tr class="gray-bg">
		  	<th colspan="6">I. TEACHING EFFECTIVENESS</th>
		  </tr>
		  <tr class="gray-bg">
		  	<th colspan="6">A. KNOWLEDGE OF THE SUBJECT MATTER</th>
		  </tr>
		  <?php for ($i=0; $i < 7; $i++) { ?>
		  <tr>
		  	<td class="col-md-8"><?= ($i+1).'. '.$a[$i] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IA'.$i ?>" value="5" <?php echo set_radio('IA'.$i, '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IA'.$i ?>" value="4" <?php echo set_radio('IA'.$i, '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IA'.$i ?>" value="3" <?php echo set_radio('IA'.$i, '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IA'.$i ?>" value="2" <?php echo set_radio('IA'.$i, '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IA'.$i ?>" value="1" <?php echo set_radio('IA'.$i, '1') ?> required> 1 </label></td>
		  </tr>
		  <?php } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">B. TEACHING SKILLS</th>
		  </tr>
		  <?php for ($i=0; $i < 9; $i++) { ?>
		  <tr>
		  	<td class="col-md-8"><?= ($i+1).'. '.$b[$i] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IB'.$i ?>" value="5" <?php echo set_radio('IB'.$i, '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IB'.$i ?>" value="4" <?php echo set_radio('IB'.$i, '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IB'.$i ?>" value="3" <?php echo set_radio('IB'.$i, '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IB'.$i ?>" value="2" <?php echo set_radio('IB'.$i, '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IB'.$i ?>" value="1" <?php echo set_radio('IB'.$i, '1') ?> required> 1 </label></td>
		  </tr>
		  <?php } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">C. CLASSROOM MANAGEMENT & EVALUATION SKILLS</th>
		  </tr>
		  <?php for ($i=0; $i < 10; $i++) { ?>
		  <tr>
		  	<td class="col-md-8"><?= ($i+1).'. '.$c[$i] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IC'.$i ?>" value="5" <?php echo set_radio('IC'.$i, '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IC'.$i ?>" value="4" <?php echo set_radio('IC'.$i, '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IC'.$i ?>" value="3" <?php echo set_radio('IC'.$i, '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IC'.$i ?>" value="2" <?php echo set_radio('IC'.$i, '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'IC'.$i ?>" value="1" <?php echo set_radio('IC'.$i, '1') ?> required> 1 </label></td>
		  </tr>
		  <?php } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">D. MOTIVATION STRATEGIES AND TEACHING</th>
		  </tr>
		  <?php for ($i=0; $i < 3; $i++) { ?>
		  <tr>
		  	<td class="col-md-8"><?= ($i+1).'. '.$d[$i] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'ID'.$i ?>" value="5" <?php echo set_radio('ID'.$i, '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'ID'.$i ?>" value="4" <?php echo set_radio('ID'.$i, '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'ID'.$i ?>" value="3" <?php echo set_radio('ID'.$i, '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'ID'.$i ?>" value="2" <?php echo set_radio('ID'.$i, '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'ID'.$i ?>" value="1" <?php echo set_radio('ID'.$i, '1') ?> required> 1 </label></td>
		  </tr>
		  <?php } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">II. PERSONALITY AND PUBLIC RELATIONS</th>
		  </tr>
		  <?php for ($i=0; $i < 8; $i++) { ?>
		  <tr>
		  	<td class="col-md-8"><?= ($i+1).'. '.$ii[$i] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'II'.$i ?>" value="5" <?php echo set_radio('II'.$i, '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'II'.$i ?>" value="4" <?php echo set_radio('II'.$i, '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'II'.$i ?>" value="3" <?php echo set_radio('II'.$i, '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'II'.$i ?>" value="2" <?php echo set_radio('II'.$i, '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= 'II'.$i ?>" value="1" <?php echo set_radio('II'.$i, '1') ?> required> 1 </label></td>
		  </tr>
		  <?php } ?>


		  </tbody>
		</table>

		<div class="row p-sm">
			<div class="form-group">
				<label>Comment <i>(Optional)</i></label>
				<textarea class="form-control" name="comment" maxlength="255"></textarea>
			</div>
		</div>

		<div class="row">
			<button type="submit" class="btn btn-w-m btn-primary col-md-4 col-md-offset-4">Submit Evaluation</button>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
