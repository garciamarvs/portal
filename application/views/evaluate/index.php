<?php
	$status = $this->evaluate_model->getEvalStatus();
	if($status['active'] == '1' && strtotime($status['date']) > time() && time() > strtotime($status['start_date'])){
		$courses = $this->evaluate_model->getCourse($status['sem_id'], $this->session->userdata('user_id'));
	} else {
		$courses = NULL;
	}
?>
			<?php if($courses != NULL){ ?>
			<script>
				$(document).ready(function(){
					$('body').addClass('mini-navbar');
				});
			</script>

			<style type="text/css">
				div#page-wrapper.gray-bg.dashbard-1{
					height: 100%;
				}
			</style>

			<h2 class="text-center bg-primary p-xs b-r-md">Faculty Evaluation<br><?php $sem = $this->evaluate_model->getSemById($status['sem_id']); echo $sem['name']; ?></h2>
			<div class="ibox">
				<div class="ibox-content">
					<h3 class="text-center">Important Reminder</h3>
					<p class="gray-bg p-xs">When evaluating, be cautious on rating each category. Use the criteria specified below (5 is equivalent to the highest rate while 1 is the lowest).</p>
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
				</div>
			</div>
			<p>
        <a href="<?= base_url().'evaluate/form' ?>"><button type="button" class="btn btn-block btn-outline btn-primary">Proceed to Faculty Evaluation</button></a>
    	</p>
			<?php } else { ?>

			<div class="middle-box text-center animated fadeInDown">
        <h1>Sorry!</h1>
        <h3 class="font-bold">No Ongoing Faculty Evaluation</h3>

        <div class="error-desc">
            Sorry, but no active faculty evaluation schedule right now. Please check the announcement.
        </div>
			</div>
			<?php } ?>			
