<?php 
	$As = $this->evaluate_model->getQuestionsByCategory('A');
	$Bs = $this->evaluate_model->getQuestionsByCategory('B');
	$Cs = $this->evaluate_model->getQuestionsByCategory('C');
	$Ds = $this->evaluate_model->getQuestionsByCategory('D');
	$Es = $this->evaluate_model->getQuestionsByCategory('E');
?>
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
				<td class="col-md-2" style="background-color: white; border-right: 1px solid #d9d9d9">Subject Code:<br><b><?= $c['code'] ?></b></td>
				<td class="col-md-3" style="background-color: white; border-right: 1px solid #d9d9d9">Subject Title:<br><b><?= $c['title'] ?></b></td>
				<td class="col-md-3" style="background-color: white; border-right: 1px solid #d9d9d9">Professor:<br><b><?php $i = $this->evaluate_model->getUserById($c['instructor']); echo $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'];?></b></td>
				<td class="col-md-2" style="background-color: white; border-right: 1px solid #d9d9d9">School Year:<br><b><?php $j = $this->evaluate_model->getSemById($c['sem_id']); echo substr($j['name'],2,10); ?></b></td>
				<td class="col-md-2" style="background-color: white;">Semester:<br><b><?php $j = $this->evaluate_model->getSemById($c['sem_id']); echo substr($j['name'],12); ?></b></td>
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
		  		<td class="text-center">Outstanding</td>
		  		<td>The performance almost exceeds the job requirements. The faculty is an exceptional role model.</td>
		  	</tr>
		  	<tr>
		  		<td class="text-center">4</td>
		  		<td class="text-center">Very Satisfactory</td>
		  		<td>Performance meets and often exceeds job requirements.</td>
		  	</tr>
		  	<tr>
		  		<td class="text-center">3</td>
		  		<td class="text-center">Satisfactory</td>
		  		<td>Performance meets the job requirements.</td>
		  	</tr>
		  	<tr>
		  		<td class="text-center">2</td>
		  		<td class="text-center">Fair</td>
		  		<td>Performance needs improvement to meet job requirements.</td>
		  	</tr>
		  	<tr>
		  		<td class="text-center">1</td>
		  		<td class="text-center">Poor</td>
		  		<td>The faculty fails to meet the job requirements.</td>
		  	</tr>
		  </tbody>
		</table>

		<?php echo form_open(base_url().'evaluate/q/'.$course_id) ?>
		<table class="table table-bordered">
		  <thead>
		  <tr>
		    <th class="col-md-8 text-center">QUESTIONS</th>
		    <th class="col-md-4 text-center" colspan="5">RATING</th>
		  </tr>
		  </thead>
		  <tbody>
		  <tr class="gray-bg">
		  	<th colspan="6">A. Presentation of Content</th>
		  </tr>

		  <?php $ctr = 1; foreach ($As as $a){ ?>
		  <tr>
		  	<td class="col-md-8"><?= $ctr.'. '.$a['question'] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $a['category'].$a['id'] ?>" value="5" <?php echo set_radio('A'.$a['id'], '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $a['category'].$a['id'] ?>" value="4" <?php echo set_radio('A'.$a['id'], '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $a['category'].$a['id'] ?>" value="3" <?php echo set_radio('A'.$a['id'], '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $a['category'].$a['id'] ?>" value="2" <?php echo set_radio('A'.$a['id'], '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $a['category'].$a['id'] ?>" value="1" <?php echo set_radio('A'.$a['id'], '1') ?> required> 1 </label></td>
		  </tr>
		  <?php $ctr++; } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">B. Clarity of Expectations or Directions</th>
		  </tr>

		  <?php $ctr = 1; foreach ($Bs as $b){ ?>
		  <tr>
		  	<td class="col-md-8"><?= $ctr.'. '.$b['question'] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $b['category'].$b['id'] ?>" value="5" <?php echo set_radio('B'.$b['id'], '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $b['category'].$b['id'] ?>" value="4" <?php echo set_radio('B'.$b['id'], '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $b['category'].$b['id'] ?>" value="3" <?php echo set_radio('B'.$b['id'], '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $b['category'].$b['id'] ?>" value="2" <?php echo set_radio('B'.$b['id'], '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $b['category'].$b['id'] ?>" value="1" <?php echo set_radio('B'.$b['id'], '1') ?> required> 1 </label></td>
		  </tr>
		  <?php $ctr++; } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">C. Helpfulness/Availability</th>
		  </tr>

		  <?php $ctr = 1; foreach ($Cs as $c){ ?>
		  <tr>
		  	<td class="col-md-8"><?= $ctr.'. '.$c['question'] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $c['category'].$c['id'] ?>" value="5" <?php echo set_radio('C'.$c['id'], '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $c['category'].$c['id'] ?>" value="4" <?php echo set_radio('C'.$c['id'], '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $c['category'].$c['id'] ?>" value="3" <?php echo set_radio('C'.$c['id'], '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $c['category'].$c['id'] ?>" value="2" <?php echo set_radio('C'.$c['id'], '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $c['category'].$c['id'] ?>" value="1" <?php echo set_radio('C'.$c['id'], '1') ?> required> 1 </label></td>
		  </tr>
		  <?php $ctr++; } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">D. Useful/Clear Feedback on Performance</th>
		  </tr>

		  <?php $ctr = 1; foreach ($Ds as $d){ ?>
		  <tr>
		  	<td class="col-md-8"><?= $ctr.'. '.$d['question'] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $d['category'].$d['id'] ?>" value="5" <?php echo set_radio('D'.$d['id'], '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $d['category'].$d['id'] ?>" value="4" <?php echo set_radio('D'.$d['id'], '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $d['category'].$d['id'] ?>" value="3" <?php echo set_radio('D'.$d['id'], '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $d['category'].$d['id'] ?>" value="2" <?php echo set_radio('D'.$d['id'], '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $d['category'].$d['id'] ?>" value="1" <?php echo set_radio('D'.$d['id'], '1') ?> required> 1 </label></td>
		  </tr>
		  <?php $ctr++; } ?>

		  <tr class="gray-bg">
		  	<th colspan="6">E. Encouraging of Participation/Discussion</th>
		  </tr>

		  <?php $ctr = 1; foreach ($Es as $e){ ?>
		  <tr>
		  	<td class="col-md-8"><?= $ctr.'. '.$e['question'] ?></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $e['category'].$e['id'] ?>" value="5" <?php echo set_radio('E'.$e['id'], '5') ?> required> 5 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $e['category'].$e['id'] ?>" value="4" <?php echo set_radio('E'.$e['id'], '4') ?> required> 4 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $e['category'].$e['id'] ?>" value="3" <?php echo set_radio('E'.$e['id'], '3') ?> required> 3 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $e['category'].$e['id'] ?>" value="2" <?php echo set_radio('E'.$e['id'], '2') ?> required> 2 </label></td>
		  	<td class="text-center"><label class="i-checks"> <input type="radio" name="<?= $e['category'].$e['id'] ?>" value="1" <?php echo set_radio('E'.$e['id'], '1') ?> required> 1 </label></td>
		  </tr>
		  <?php $ctr++; } ?>
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
