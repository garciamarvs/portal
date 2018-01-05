<?php 
$A = $this->evaluate_model->getQuestionsByCategoryAll('A');
$B = $this->evaluate_model->getQuestionsByCategoryAll('B');
$C = $this->evaluate_model->getQuestionsByCategoryAll('C');
$D = $this->evaluate_model->getQuestionsByCategoryAll('D');
$E = $this->evaluate_model->getQuestionsByCategoryAll('E');

if($this->evaluate_model->getActiveSched()){$disable = true;}
?>
<style type="text/css">
	span.switchery.switchery-default{width: 30px !important; height: 15px !important;} 
	span.switchery.switchery-default small{width: 15px !important; height: 15px !important;}
	.modal-header .close{margin-top: -16px !important;}
</style>

<h4 class="bg-primary p-xs b-r-md-t-half" style="border:5px solid #18846e;margin-bottom:3px !important;">Faculty Evaluation Questions</h4>
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal3">Add Question</button>
<hr style="border-bottom:2px solid #737373; margin: 0;">

<div class="row">
	<div class="ibox">
		<div class="ibox-content">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Category</th>
						<th>Question</th>
						<th class="text-center">Edit</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th colspan="4">A. Presentation of Content</th>
					</tr>
					<?php $ctr=0; foreach ($A as $a) { ?>
					<tr>
						<?php if($ctr==0){ ?>
						<td rowspan="<?= count($A) ?>" class="text-center"><?= $a['category'] ?></td>
						<?php } ?>
						<td><?= ($ctr+1).'. '.$a['question'] ?></td>
						<td class="text-center"><a href="#" onclick="edit(<?= $a['id'] ?>)"><i class="fa fa-edit fa-lg"></i></a></td>
						<td><input type="checkbox" class="switch_<?= $a['id'] ?>" name="" <?php if($a['active']=='1'){echo 'checked';} ?> onchange="chkbox(<?= $a['id'] ?>);"></td>
					</tr>
					<script type="text/javascript">
						$(document).ready(function(){
							var switch_<?= $a['id'] ?> = document.querySelector(".switch_<?= $a['id'] ?>");
							var switch_<?= $a['id'] ?> = new Switchery(switch_<?= $a['id'] ?>, { color: "#1AB394" });
							<?php if($disable){echo 'switch_'.$a['id'].'.disable()';} ?>
						});
					</script>
					<?php $ctr++; } ?>

					<tr>
						<th colspan="4">B. Clarity of Expectations or Directions</th>
					</tr>
					<?php $ctr=0; foreach ($B as $a) { ?>
					<tr>
						<?php if($ctr==0){ ?>
						<td rowspan="<?= count($B) ?>" class="text-center"><?= $a['category'] ?></td>
						<?php } ?>
						<td><?= ($ctr+1).'. '.$a['question'] ?></td>
						<td class="text-center"><a href="#" onclick="edit(<?= $a['id'] ?>)"><i class="fa fa-edit fa-lg"></i></a></td>
						<td><input type="checkbox" class="switch_<?= $a['id'] ?>" name="" <?php if($a['active']=='1'){echo 'checked';} ?> onchange="chkbox(<?= $a['id'] ?>);"></td>
					</tr>
					<script type="text/javascript">
						$(document).ready(function(){
							var switch_<?= $a['id'] ?> = document.querySelector(".switch_<?= $a['id'] ?>");
							var switch_<?= $a['id'] ?> = new Switchery(switch_<?= $a['id'] ?>, { color: "#1AB394" });
							<?php if($disable){echo 'switch_'.$a['id'].'.disable()';} ?>
						});
					</script>
					<?php $ctr++; } ?>

					<tr>
						<th colspan="4">C. Helpfulness/Availability</th>
					</tr>
					<?php $ctr=0; foreach ($C as $a) { ?>
					<tr>
						<?php if($ctr==0){ ?>
						<td rowspan="<?= count($C) ?>" class="text-center"><?= $a['category'] ?></td>
						<?php } ?>
						<td><?= ($ctr+1).'. '.$a['question'] ?></td>
						<td class="text-center"><a href="#" onclick="edit(<?= $a['id'] ?>)"><i class="fa fa-edit fa-lg"></i></a></td>
						<td><input type="checkbox" class="switch_<?= $a['id'] ?>" name="" <?php if($a['active']=='1'){echo 'checked';} ?> onchange="chkbox(<?= $a['id'] ?>);"></td>
					</tr>
					<script type="text/javascript">
						$(document).ready(function(){
							var switch_<?= $a['id'] ?> = document.querySelector(".switch_<?= $a['id'] ?>");
							var switch_<?= $a['id'] ?> = new Switchery(switch_<?= $a['id'] ?>, { color: "#1AB394" });
							<?php if($disable){echo 'switch_'.$a['id'].'.disable()';} ?>
						});
					</script>
					<?php $ctr++; } ?>

					<tr>
						<th colspan="4">D. Useful/Clear Feedback on Performance</th>
					</tr>
					<?php $ctr=0; foreach ($D as $a) { ?>
					<tr>
						<?php if($ctr==0){ ?>
						<td rowspan="<?= count($D) ?>" class="text-center"><?= $a['category'] ?></td>
						<?php } ?>
						<td><?= ($ctr+1).'. '.$a['question'] ?></td>
						<td class="text-center"><a href="#" onclick="edit(<?= $a['id'] ?>)"><i class="fa fa-edit fa-lg"></i></a></td>
						<td><input type="checkbox" class="switch_<?= $a['id'] ?>" name="" <?php if($a['active']=='1'){echo 'checked';} ?> onchange="chkbox(<?= $a['id'] ?>);"></td>
					</tr>
					<script type="text/javascript">
						$(document).ready(function(){
							var switch_<?= $a['id'] ?> = document.querySelector(".switch_<?= $a['id'] ?>");
							var switch_<?= $a['id'] ?> = new Switchery(switch_<?= $a['id'] ?>, { color: "#1AB394" });
							<?php if($disable){echo 'switch_'.$a['id'].'.disable()';} ?>
						});
					</script>
					<?php $ctr++; } ?>

					<tr>
						<th colspan="4">E. Encouraging of Participation/Discussion</th>
					</tr>
					<?php $ctr=0; foreach ($E as $a) { ?>
					<tr>
						<?php if($ctr==0){ ?>
						<td rowspan="<?= count($E) ?>" class="text-center"><?= $a['category'] ?></td>
						<?php } ?>
						<td><?= ($ctr+1).'. '.$a['question'] ?></td>
						<td class="text-center"><a href="#" onclick="edit(<?= $a['id'] ?>)"><i class="fa fa-edit fa-lg"></i></a></td>
						<td><input type="checkbox" class="switch_<?= $a['id'] ?>" name="" <?php if($a['active']=='1'){echo 'checked';} ?> onchange="chkbox(<?= $a['id'] ?>);"></td>
					</tr>
					<script type="text/javascript">
						$(document).ready(function(){
							var switch_<?= $a['id'] ?> = document.querySelector(".switch_<?= $a['id'] ?>");
							var switch_<?= $a['id'] ?> = new Switchery(switch_<?= $a['id'] ?>, { color: "#1AB394" });
							<?php if($disable){echo 'switch_'.$a['id'].'.disable()';} ?>
						});
					</script>
					<?php $ctr++; } ?>
				</tbody>
			</table>      
		</div>
	</div>
</div>

<div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Edit Question</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="form-group"><label class="col-sm-2 control-label text-right p-xs">Category*</label>
						<div class="col-sm-1 no-padding">
							<select id="category" class="form-control m-b no-padding" style="padding-left:8px !important;" <?php if($disable){echo 'disabled';} ?>>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group"><label class="col-sm-2 control-label text-right p-xs">Question*</label>
						<div class="col-sm-10 no-padding"><textarea id="question" class="form-control" maxlength="255"></textarea></div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
				<button id="saveBtn" type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="modal inmodal" id="myModal3" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	      <h4 class="modal-title">Add Question</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
					<div class="form-group"><label class="col-sm-2 control-label text-right p-xs">Category*</label>
						<div class="col-sm-1 no-padding">
							<select id="aCategory" class="form-control m-b no-padding" style="padding-left:8px !important;">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group"><label class="col-sm-2 control-label text-right p-xs">Question*</label>
						<div class="col-sm-10 no-padding"><textarea id="aQuestion" class="form-control m-b" maxlength="255"></textarea></div>
					</div>
				</div>

				<div class="row">
					<div class="form-group"><label class="col-sm-2 control-label text-right p-xs">Status*</label>
						<div class="col-sm-2 no-padding">
							<select id="aStatus" class="form-control m-b">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>						
					</div>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <button id="addBtn" type="button" class="btn btn-primary">Add Now!</button>
      </div>
    </div>
  </div>
</div>

<script>
	function edit(i){
		$.ajax({
		 type: "POST",
		 url: base_url+'evaluate/populateModal_Edit',
		 data: ({
		   type: 'modal_edit',
		   id: i
		 }),
		 dataType: "json",
		 success: function(data){
		   if(data.status=="success"){
		   	if(data.q.category=='A'){ $("#category option[value='A']").prop('selected', true);
		   	} else if(data.q.category=='B'){ $("#category option[value='B']").prop('selected', true);
		   	} else if(data.q.category=='C'){ $("#category option[value='C']").prop('selected', true);
		   	} else if(data.q.category=='D'){ $("#category option[value='D']").prop('selected', true);
		   	} else if(data.q.category=='E'){ $("#category option[value='E']").prop('selected', true);
		   	} else { console.log('Error 404');
		   	}

		   	$('#question').empty();
		   	var content = data.q.question;
		   	$('#question').append(content);

		   	$('#saveBtn').on('click', function(){
		   		saveEdit(i);
		   	})
		   }
		 }
		});

		$('#myModal4').modal();
	}

	function saveEdit(i){
		var category = $('#category').val();
		var question = $('#question').val();

		$.ajax({
			type: "POST",
			url: base_url+'evaluate/saveModal_Edit',
			data: ({
				type: 'modal_save',
				id: i,
				category: category,
				question: question
			}),
			dataType: "json",
			success: function(data){
				if(data.status=="success"){
					location.reload();
				}
			}
		});
	}

	$(document).ready(function(){
		$('#addBtn').on('click', function(){
			var cat = $('#aCategory').val();
			var que = $('#aQuestion').val();
			var sta = $('#aStatus').val();

			$.ajax({
				type: "POST",
				url: base_url+'evaluate/addQuestion',
				data: ({
					type: 'addQuestion',
					category: cat,
					question: que,
					status: sta
				}),
				dataType: "json",
				success: function(data){
					if(data.status=='success'){
						location.reload();
					}
				}
			});
		})

		<?php if($this->session->flashdata('saveModal_Edit')){ ?>
	  swal({
      title: "Question Edited Successfully",
      text: "Congratulations you have edited a question!",
      type: "success",
      showConfirmButton: false,
      allowOutsideClick: true
    });
	  <?php } ?>

		<?php if($this->session->flashdata('addQuestion')){ ?>
	  swal({
      title: "Question Added Successfully",
      text: "Congratulations you have added a question!",
      type: "success",
      showConfirmButton: false,
      allowOutsideClick: true
    });
	  <?php } ?>

	});

	function chkbox(i){
		if($('.switch_'+i).is(":checked")){
			$.ajax({
				type: "POST",
				url: base_url+'evaluate/chkbox',
				data: ({
					type: "chkbox",
					id: i,
					active: 1
				}),
				dataType: "json",
				success: function(data){
					if(data.status=='success'){
						// alert('success');
					}
				}
			});
		} else {
			$.ajax({
				type: "POST",
				url: base_url+'evaluate/chkbox',
				data: ({
					type: "chkbox",
					id: i,
					active: 0
				}),
				dataType: "json",
				success: function(data){
					if(data.status=='success'){
						// alert('success');
					}
				}
			});
		}
	}
</script>
