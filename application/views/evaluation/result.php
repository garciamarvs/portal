<style type="text/css">
	div#page-wrapper.gray-bg.dashbard-1{
		height: 100%;
	}
</style>


<h2 class="text-center bg-primary p-xs b-r-md">Faculty Evaluation Results</h2>
<div class="panel panel-info">
	<div class="panel-body p-xs">
	<?php echo form_open(base_url().'evaluation/result'); ?>
	<div class="form-group col-md-3 m-b-none p-xxs">
		<label>School Year/Semester</label>
		<select class="form-control nopadding" name="sem" id="sem">
		  <?php foreach($sem as $s){ ?>
		  <option value="<?= $s['id'] ?>" <?php if(isset($sy)){if($s['id']==$sy){echo 'selected';}} ?>><?= $s['name'] ?></option>
		  <?php } ?>
		</select>
	</div>

	<div class="form-group col-md-4 m-b-none p-xxs">
		<label>College</label>
		<select id="college" class="form-control" name="college">
			<?php foreach($college as $c){ ?>
		  <option value="<?= $c['code'] ?>" <?php if(isset($f)){if($c['code']==$f['college']){echo 'selected';}} ?>><?= $c['name'] ?></option>
		  <?php } ?>
		</select>
	</div>

	<div class="form-group col-md-4 m-b-none p-xxs">
		<label>Faculty</label>
		<select id="faculty" class="form-control" name="faculty" id="faculty">
			<?php 
			if(isset($list_fac)){
				foreach ($list_fac as $key => $value) { ?>
			<option value="<?= $value['id'] ?>" <?php if(isset($f)){if($value['id']==$f['id']){echo 'selected';}} ?>><?php if($value['last_name']==''){echo $value['first_name'].' '.$value['middle_name'];}else{ echo $value['last_name'].', '.$value['first_name'].' '.$value['middle_name'];} ?></option>
			<?php }
			} ?>
		</select>
	</div>
	<div class="form-group p-xs m-b-none col-md-1">
		<label></label>
		<button class="btn btn-primary" type="submit">Search</button>
	</div>
	<?php echo form_close(); ?>
	</div>
</div>

<?php if(isset($students)){ ?>
	<a href="<?= base_url().'evaluation/report/'.$f['id'].'/'.$sy ?>"><button class="btn btn-primary"><i class="fa fa-file-text"></i> Print Report</button></a>
<?php } ?>

<table class="table table-striped">
	<?php if(isset($students)){ ?>
  <thead>
  <tr class="gray-bg">
		<th colspan="8">STUDENTS</th>
	</tr>
  <tr class="no-borders">
  	<th class="text-center col-md-0 no-borders"></th>
  	<th class="col-md-1 no-borders"></th>
  	<th class="col-md-11 text-center no-borders" colspan="4">AREAS</th>
  </tr>
  <tr style="border-top-width: 0;">
  	<th style="border-top-width: 0;" class="col-md-0">#</th>
  	<th style="border-top-width: 0;" class="col-md-0 text-center"></th>
  	<th style="border-top-width: 0;" class="col-md-1 text-center">I. A</th>
  	<th style="border-top-width: 0;" class="col-md-1 text-center">I. B</th>
  	<th style="border-top-width: 0;" class="col-md-1 text-center">I. C</th>
  	<th style="border-top-width: 0;" class="col-md-1 text-center">I. D</th>
  	<th style="border-top-width: 0;" class="col-md-1 text-center">II</th>
  	<th class="col-md-7"></th>
  </tr>
  </thead>
  <tbody id="theTable">
  <?php  
  	$s_IA = $s_IB = $s_IC = $s_ID = $s_II = 0;
  	$totalStud = count($students); 
  	foreach ($students as $key => $value) {
  		$s_IA += $value['a'];
  		$s_IB += $value['b'];
  		$s_IC += $value['c'];
  		$s_ID += $value['d'];
  		$s_II += $value['ii'];
  	 ?>
  <tr>
  	<td class="text-center"><?= ($key+1) ?></td>
	  <td class="text-center"><?= $value['section'] ?></td>
	  <td class="text-center"><?= $this->evaluate_model->setRating($value['a']) ?></td>
	  <td class="text-center"><?= $this->evaluate_model->setRating($value['b']) ?></td>
	  <td class="text-center"><?= $this->evaluate_model->setRating($value['c']) ?></td>
	  <td class="text-center"><?= $this->evaluate_model->setRating($value['d']) ?></td>
	  <td class="text-center"><?= $this->evaluate_model->setRating($value['ii']) ?></td>
  </tr>
  <?php 
  	} ?>
	<tr>
		<td></td>
		<td></td>
		<td class="text-center"><b><?= $this->evaluate_model->setRating($s_IA/$totalStud) ?></b></td>
		<td class="text-center"><b><?= $this->evaluate_model->setRating($s_IB/$totalStud) ?></b></td>
		<td class="text-center"><b><?= $this->evaluate_model->setRating($s_IC/$totalStud) ?></b></td>
		<td class="text-center"><b><?= $this->evaluate_model->setRating($s_ID/$totalStud) ?></b></td>
		<td class="text-center"><b><?= $this->evaluate_model->setRating($s_II/$totalStud) ?></b></td>
	</tr>
	<?php 
	} ?>
	<?php if(isset($assoc)){	?>
		<tr>
			<td colspan="8"></td>
		</tr>
		<tr class="gray-bg">
			<th colspan="8">Associate Dean</th>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($assoc['a']) ?></b></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($assoc['b']) ?></b></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($assoc['c']) ?></b></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($assoc['d']) ?></b></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($assoc['ii']) ?></b></td>
		</tr>
	<?php 
	} ?>
	<?php if(isset($dean)){	?>
		<tr>
			<td colspan="8"></td>
		</tr>
		<tr class="gray-bg">
			<th colspan="8">DEAN</th>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($dean['a']) ?></b></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($dean['b']) ?></b></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($dean['c']) ?></b></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($dean['d']) ?></b></td>
			<td class="text-center"><b><?= $this->evaluate_model->setRating($dean['ii']) ?></b></td>
		</tr>
<?php 
		}
	?>
  </tbody>
</table>

<div class="middle-box text-center animated fadeInDown" id="theError"></div>
<script>
	$(document).ready(function(){
		<?php if(!isset($list_fac)){
			echo 'populateFaculty();';
		}
		?>
		$('#college').on('change', function(){
			populateFaculty();
			//End onChange
		});
	})

	function populateFaculty(){
		var college = $('#college').val();
			$.ajax({
				type: 'POST',
				url: base_url+'evaluate/getFaculty',
				data: ({
					type: 'getFaculty',
					college: college
				}),
				dataType: "json",
				success: function(data){
					if(data.status == 'success'){
						$('#faculty option').remove();
						if(data.faculty.length > 0){
							for(var i=0;i<=data.faculty.length;i++){
							var content = '<option value="'+data.faculty[i].id+'">'+data.faculty[i].first_name+' '+data.faculty[i].middle_name+' '+data.faculty[i].last_name+'</option>';
							$('#faculty').append(content);
							}
						}						
					}
				}
			});
	}
</script>

