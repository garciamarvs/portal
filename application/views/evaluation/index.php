<?php
	$status = $this->evaluation_model->getEvalStatus();
	$toShow = array();
	foreach ($status as $key => $value) {
		if(strtotime($value['date']) > time() && time() > strtotime($value['start_date'])){
			$courses = $this->evaluation_model->getFacCourses($value['faculty'], $value['sem_id']);
			$f_courses = array();
				foreach ($courses as $c) {
					$f_courses[] = $c['id'];
				}
			$studCourses = $this->evaluation_model->getStudCourses($value['sem_id']);
			$studCourses = json_decode($studCourses['course']);
			// print_r($f_courses); echo "<br>";
			// print_r($studCourses); echo "<br>";
				foreach ((array) $studCourses as $sc) {
					if(in_array($sc->course, $f_courses)){
						$toShow[] = $sc->course;
					}
				}
				// print_r($toShow);
		}
	}

	if(count($toShow)>0){
?>
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

			<div class="ibox">
				<div class="ibox-content">
					<h3 class="text-center">Direction</h3>
					<p class="gray-bg p-xs">In our desire to improve the quality of instruction, we would like to find out waht you think of your professor/instructor through evaluation tools or rating scale. You are requested to check the number oppsotire the item that best reflect the extent to which professor/instructor performance or practice each of the behavior items listed below. Please give your HONEST answers. This is striclty <b>confidential</b>. Thank you very much.</p>
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
				</div>
			</div>
			<p>
        <a href="<?= base_url().'evaluation/form' ?>"><button type="button" class="btn btn-block btn-outline btn-primary">Proceed to Faculty Evaluation</button></a>
    	</p>
<?php
	} else {
?>
			<div class="middle-box text-center animated fadeInDown">
        <h1>Sorry!</h1>
        <h3 class="font-bold">No Ongoing Faculty Evaluation</h3>

        <div class="error-desc">
            Sorry, but no active faculty evaluation schedule right now are for you. Please check the announcement.
        </div>
			</div>
<?php 
	}
?>