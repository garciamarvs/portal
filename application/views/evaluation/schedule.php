<script>
	$(document).ready(function(){
		$('#data_1 .input-group.date').datepicker({todayBtn: "linked", keyboardNavigation: false, forceParse: false, calendarWeeks: true, autoclose: true });
    $('#data_2 .input-group.date').datepicker({todayBtn: "linked", keyboardNavigation: false, forceParse: false, calendarWeeks: true, autoclose: true });
    <?php if($this->session->flashdata('checkActiveSched')){ ?>
	  swal({
      title: "Evaluation Schedule Still Ongoing!",
      text: "Close the active schedule before adding a new schedule.",
      type: "warning",
      showConfirmButton: false,
      allowOutsideClick: true
    });
	  <?php } ?>
	  <?php if($this->session->flashdata('checkActiveSched_false')){ ?>
	  swal({
      title: "Evaluation Schedule Added!",
      text: "You successfully added a new faculty evaluation schedule.",
      type: "success",
      showConfirmButton: false,
      allowOutsideClick: true
    });
	  <?php } ?>
	});
</script>
<style type="text/css">
	span.switchery.switchery-default{width: 30px !important; height: 15px !important;} 
	span.switchery.switchery-default small{width: 15px !important; height: 15px !important;}
</style>

<h4 class="bg-primary p-xs b-r-md-t-half" style="border:5px solid #18846e;margin-bottom:3px !important;">Faculty Evaluation Schedule</h4>
<hr style="border-bottom:2px solid #737373; margin: 0;">
<div class="row m-r-none m-l-none" style="margin-bottom: 3px !important;">
	<div class="ibox m-b-none">
		<div class="ibox-content">
			<table class="table table-hover">
        <thead>
        <tr>
          <th class="col-sm-3">School Year/Semester</th>
          <th class="col-sm-2">Faculty</th>
          <th class="col-sm-2">Sections</th>
          <th class="col-sm-1">Start Date</th>
          <th class="col-sm-1">End Date</th>
          <th class="col-sm-1" colspan="2">Status</th>
          <th class="col-sm-6"></th>
        </tr>
        </thead>
        <?php foreach ($sched as $s) { ?>
        	<tr>
        		<td><?php $a = $this->evaluate_model->getSemById($s['sem_id']); echo $a['name']; ?></td>
        		<td><?php $b = $this->evaluate_model->getUserById($s['faculty']); echo $b['first_name'].' '.$b['middle_name'].' '.$b['last_name']; ?></td>
        		<td><?php $sections = explode(',', $s['sections']);
        		$eval_section = array();
        		foreach ($sections as $key => $value) {
        			$a = $this->evaluate_model->getSectionById($value);
        			$eval_section[] = $a['name'];
        		} echo implode(", ",$eval_section);
        		 ?></td>
        		<td><?= substr($s['start_date'], 0, 10); ?></td>
        		<td><?= substr($s['date'], 0, 10); ?></td>
        		<td id="text<?= $s['id'] ?>"><?php if($s['active']=='1'){
        			if(strtotime($s['date']) > time() && time() > strtotime($s['start_date'])){
        				echo 'Active</td><td><span class="tooltip-demo"><div class="onoffswitch"><input type="checkbox" checked class="onoffswitch-checkbox" id="switch'.$s['id'].'" onchange="dES('.$s['id'].');"><label class="onoffswitch-label" for="switch'.$s['id'].'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div></span>';
        			} else {
        				$data = array(
												'active' => 0
								);
								$this->db->where('id', $s['id']);
								$this->db->update('status', $data);

								echo 'Inactive</td><td><span class="tooltip-demo"><div class="onoffswitch"><input type="checkbox" class="onoffswitch-checkbox" id="switch'.$s['id'].'" onchange="dES('.$s['id'].');"><label class="onoffswitch-label" for="switch'.$s['id'].'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div></span>';
        			}
        		} else {
        			echo 'Inactive</td><td><span class="tooltip-demo"><div class="onoffswitch"><input type="checkbox" class="onoffswitch-checkbox" id="switch'.$s['id'].'" onchange="dES('.$s['id'].');"><label class="onoffswitch-label" for="switch'.$s['id'].'"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div></span>';
        		} 
        		?></td>
        		<td></td>
        	</tr>
        <?php } ?>
        <tbody>
        </tbody>
			</table>
		</div>
	</div>
</div>

<script>
function dES(id){
	if($('#switch'+id).is(':checked')){
		$.ajax({
			type:"POST",
			url:base_url+"evaluate/setEvalSched",
			data:({
				type:"setEvalSched",
				id:id,
				active: 1
			}),
			dataType:"json"
		}).done(function(data){
			if(data.status=="success"){
				$('#text'+id).text('Active');
				// alert('UP');
			} else {
				$('#switch'+id).prop('checked', false);
				swal({
		      title: "Evaluation Schedule Still Ongoing!",
		      text: "Close the active schedule before adding a new schedule.",
		      type: "warning",
		      showConfirmButton: false,
		      allowOutsideClick: true
		    });
			}
		});
	} else {
		$.ajax({
			type:"POST",
			url:base_url+"evaluate/disableEvalSched",
			data:({
				type:"disableEvalSched",
				id:id
			}),
			dataType:"json"
		}).done(function(data){
			if(data.status=="success"){
				$('#text'+id).text('Inactive');
				// alert('DOWN');
			}
		});
	}
}
</script>

<hr style="border-bottom:2px solid #737373; margin: 0;">

<?php echo form_open(base_url().'evaluation/schedule'); ?>
<div class="row m-r-none m-l-none" style="margin-bottom: 3px !important;">
	<div class="ibox m-b-none">
		<div class="ibox-title"><h4>Add Faculty Evaluation Schedule</h4></div>
		<div class="ibox-content">
			<div class="row">
				<div class="form-group"><label class="col-sm-2 control-label text-right">School Year/Semester*</label>
	        <div class="col-sm-4 no-padding"><select class="form-control m-b" name="sem_id" required="" id="sem">
	        	<?php foreach ($sem as $s) { ?>
	        	<option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
	        	<?php } ?>
	          </select>
	        </div>
	      </div>
	    </div>

	    <div class="row">
				<div class="form-group"><label class="col-sm-2 control-label text-right">College*</label>
	        <div class="col-sm-4 no-padding">
	        	<select id="college" class="form-control m-b" name="college">
						<?php foreach($college as $c){ ?>
					  	<option value="<?= $c['code'] ?>"><?= $c['name'] ?></option>
					  <?php } ?>
						</select>
	        </div>
	      </div>
	    </div>

	    <div class="row">
				<div class="form-group"><label class="col-sm-2 control-label text-right">Faculty*</label>
	        <div class="col-sm-4 no-padding">
	        	<select id="faculty" class="form-control m-b" name="faculty" required="">
						</select>
	        </div>
	      </div>
	    </div>

	    <div class="row">
				<div class="form-group"><label class="col-sm-2 control-label text-right">Choose section(s):*</label>
	        <div class="col-sm-4 no-padding">
	        	<select id="sections" class="form-control m-b" name="sections[]" required="" multiple="">
						</select>
	        </div>
	      </div>
	    </div>

	    <div class="row">
				<div class="form-group" id="data_1"><label class="col-sm-2 control-label text-right">Start Date*</label>
		      <div class="col-sm-4 input-group date">
		        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="start_date" value="<?= date('m/d/Y') ?>" required="">
		      </div>
		  	</div>
		  </div>

		  <div class="row">
				<div class="form-group" id="data_2"><label class="col-sm-2 control-label text-right">End Date*</label>
		      <div class="col-sm-4 input-group date">
		        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="end_date" value="<?= date('m/d/Y') ?>" required="">
		      </div>
		  	</div>
		  </div>

		  <div class="row">
		  	<div class="col-sm-2"></div>
		  	<div class="col-sm-4 no-padding"><button type="submit" class="btn btn-primary">Add!</button></div>
		  </div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
<hr style="border-bottom:2px solid #737373; margin: 0;">

<script>
	$(document).ready(function(){
		populateFaculty();
		$('#college').on('change', function(){
			populateFaculty();
			setTimeout(function(){ populateSection(); }, 1000);			
		});

		$('#faculty').on('change', function(){
			populateSection();
		});

		$('#sem').on('change', function(){
			populateSection();
		});

		var last_valid_selection = null;

		$('#sections').on('change', function(){
			if ($(this).val().length > 3) {
        $(this).val(last_valid_selection);
      } else {
        last_valid_selection = $(this).val();
      }
		});

	});

	function populateSection(){
		var faculty = $('#faculty').val();
		var sem = $('#sem').val();

		if(faculty!=null){
			$.ajax({
				type:"POST",
				url:base_url+"evaluation/getSectionByFac",
				data:({
					faculty: faculty,
					sem: sem
				}),
				dataType:"json"
			}).done(function(data){
				if(data.status=="success"){
					$('#sections').empty();
					console.log(data.out);
					if(data.out.length > 0){
						for(var i=0;i<data.out.length;i++){
							var content = '<option value="'+data.out[i].id+'">'+data.out[i].name+'</option>';
							$('#sections').append(content);
						}
					}
				}
			});
		}
	}

	function populateFaculty(){
		var college = $('#college').val();
			$.ajax({
				type: 'POST',
				url: base_url+'evaluate/getFaculty',
				data: ({
					type: 'getFaculty',
					college: college
				}),
				dataType: "json"
			}).done(function(data){
					if(data.status == 'success'){
						$('#faculty option').remove();
						if(data.faculty.length > 0){
							for(var i=0;i<=data.faculty.length;i++){
							var content = '<option value="'+data.faculty[i].id+'">'+data.faculty[i].first_name+' '+data.faculty[i].middle_name+' '+data.faculty[i].last_name+'</option>';
							$('#faculty').append(content);
							}
						}
					}
			});
	}
</script>