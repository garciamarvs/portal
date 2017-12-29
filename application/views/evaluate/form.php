<?php
	$status = $this->evaluate_model->getEvalStatus();
	if($status['active'] == '1' && strtotime($status['date']) > time()){
		$courses = $this->evaluate_model->getCourse($status['sem_id'], $this->session->userdata('user_id'));
	} else {
		$courses = NULL;
	}
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

			<?php if($courses != NULL){ ?>
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
			              	<?php foreach ($courses as $c) { ?>
											<tr>
												<td class="text-center"><?= $c['code'] ?></td>
												<td><?= $c['title'] ?></td>
												<?php if($this->evaluate_model->getTaposNa($c['id'])){ ?>
												<td><?php $i = $this->evaluate_model->getUserById($c['instructor']); echo $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'];?></td>
												<td><input type="radio" class="i-checks" checked=""></td>
												<?php } else { ?>
												<td><a href="<?= base_url().'evaluate/q/'.$c['id'] ?>"><?php $i = $this->evaluate_model->getUserById($c['instructor']); echo $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'];?></a></td>
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
			<?php } else { ?>

			<div class="middle-box text-center animated fadeInDown">
        <h1>404</h1>
        <h3 class="font-bold">Page Not Found</h3>

        <div class="error-desc">
            Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.
        </div>
			</div>
			<?php } ?>
