<?php
	$status = $this->evaluation_model->getEvalStatus();
	$toShow = array();
	foreach ($status as $key => $value) {
		if(strtotime($value['date']) > time() && time() > strtotime($value['start_date'])){
			$sections = explode(',', $value['sections']);
			$f_courses = array();
			foreach ($sections as $section) {
				$courses = $this->evaluation_model->getFacCourses($value['faculty'], $section, $value['sem_id']);
			
				foreach ($courses as $c) {
					$f_courses[] = $c['id'];
				}
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
		$('.i-checks').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
	  });

		<?php if($this->session->flashdata('evaluate_success')){ ?>
	  swal({
      title: "Evaluation Submitted",
      text: "Congratulations you have submitted your evaluation!",
      type: "success",
      showConfirmButton: false,
      allowOutsideClick: true
    });
	  <?php } ?>
	});
</script>
<style type="text/css">
	.iradio_square-green{
		cursor: default;
	}
</style>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-md-12">
						<div class="ibox float-e-margins">
							<div class="ibox-title text-center">
								<h2>Faculty Evaluation</h2>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped">
			              <thead>
			              <tr>
			                <th class="col-md-1 text-center">Subject Code</th>
			                <th class="col-md-5">Subject Title</th>
			                <th class="col-md-3" colspan="2">Instructor</th>
			                <th class="col-md-2">Days | Time</th>
			                <th class="col-md-1">Room</th>
			                <th class="col-md-0 text-center">Units</th>
			              </tr>
			              </thead>
			              <tbody>
			              	<?php foreach ($toShow as $key => $value) {
			              		$c = $this->evaluate_model->getCourseById($value);
			              	 ?>
											<tr>
												<td class="text-center"><?= $c['code'] ?></td>
												<td><?= $c['title'] ?></td>
												<?php if($this->evaluate_model->getTaposNa($c['id'])){ ?>
												<td><?php $i = $this->evaluate_model->getUserById($c['instructor']); echo $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'];?></td>
												<td><input type="radio" class="i-checks" checked=""></td>
												<?php } else { ?>
												<td><a href="<?= base_url().'evaluation/q/'.$c['id'] ?>"><?php $i = $this->evaluate_model->getUserById($c['instructor']); echo $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'];?></a></td>
												<td></td>
												<?php } ?>
												<td></td>
												<td></td>
												<td>3</td>
											</tr>
											<?php } ?>
										</tbody>
			            </table>
				        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
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