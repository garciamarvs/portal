<?php
	$status = $this->evaluation_model->getEvalStatus();
	$toShow = array();
	foreach ($status as $key => $value) {
		if(strtotime($value['date']) > time() && time() > strtotime($value['start_date'])){
			$list = $this->evaluate_model->getUserById($value['faculty']);
			if($list['college'] == $this->session->userdata('college')){
				$toShow[] = array('ID' => $value['faculty'], 'sem_id' => $value['sem_id']);
			}
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
			              	<th class="col-md-0 text-center">#</th>
			                <th class="col-md-3" colspan="2">Faculty Name</th>
			                <th class="col-md-9"></th>
			              </tr>
			              </thead>
			              <tbody>
			              	<?php foreach ($toShow as $key => $value) {
			              		$ins = $this->evaluate_model->getUserById($value['ID']);
			              		if($this->session->userdata('usertype')==3){
			              			$CON = $this->evaluate_model->getTaposNa2($value['ID'], $value['sem_id']);
			              		} else if($this->session->userdata('usertype')==4) {
			              			$CON = $this->evaluate_model->getTaposNa3($value['ID'], $value['sem_id']);
			              		}
			              	 ?>
			              	<tr>
			              		<td class="text-center"><?= ($key+1) ?></td>
			              		<?php
			              		if($CON){ ?>
												<td><?php if($ins['last_name']==''){echo $ins['first_name'].' '.$ins['middle_name'];}else{ echo $ins['last_name'].', '.$ins['first_name'].' '.$ins['middle_name'];} ?></td>
												<td><input type="radio" class="i-checks" checked=""></td>
												<?php } else { ?>
												<td><a href="<?= base_url().'evaluation/d/'.$value['ID'].'/'.$value['sem_id'] ?>"><?php if($ins['last_name']==''){echo $ins['first_name'].' '.$ins['middle_name'];}else{ echo $ins['last_name'].', '.$ins['first_name'].' '.$ins['middle_name'];} ?></a></td>
												<td></td>
												<?php } ?>
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