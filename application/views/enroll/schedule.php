<script>
	$(document).ready(function(){
		$('#data_1 .input-group.date').datepicker({todayBtn: "linked", keyboardNavigation: false, forceParse: false, calendarWeeks: true, autoclose: true });
    $('#data_2 .input-group.date').datepicker({todayBtn: "linked", keyboardNavigation: false, forceParse: false, calendarWeeks: true, autoclose: true });
    <?php if($this->session->flashdata('checkActiveSched')){ ?>
	  swal({
      title: "Enrollment Schedule Still Ongoing!",
      text: "Close the active schedule before adding a new schedule.",
      type: "warning",
      showConfirmButton: false,
      allowOutsideClick: true
    });
	  <?php } ?>
	  <?php if($this->session->flashdata('checkActiveSched_false')){ ?>
	  swal({
      title: "Enrollment Schedule Added!",
      text: "You successfully added a new enrollment evaluation schedule.",
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

<h4 class="bg-primary p-xs b-r-md-t-half" style="border:5px solid #18846e;margin-bottom:3px !important;">Enrollment Schedule</h4>
<hr style="border-bottom:2px solid #737373; margin: 0;">
<div class="row m-r-none m-l-none" style="margin-bottom: 3px !important;">
	<div class="ibox m-b-none">
		<div class="ibox-content">
			<table class="table table-hover">
        <thead>
        <tr>
          <th class="col-sm-3">School Year/Semester</th>
          <th class="col-sm-1">Start Date</th>
          <th class="col-sm-1">End Date</th>
          <th class="col-sm-1" colspan="2">Status</th>
          <th class="col-sm-6"></th>
        </tr>
        </thead>
        <?php foreach ($sched as $s) { ?>
        	<tr>
        		<td><?php $a = $this->enroll_model->getSemById($s['sem_id']); echo $a['name']; ?></td>
        		<td><?= substr($s['start_date'], 0, 10); ?></td>
        		<td><?= substr($s['date'], 0, 10); ?></td>
        		<td><?php if($s['active']=='1'){
        			if(strtotime($s['date']) > time() && time() > strtotime($s['start_date'])){
        				echo 'Active</td><td><span class="tooltip-demo"><input type="checkbox" class="switch" id="switch" checked></span>'.'<script type="text/javascript">$(document).ready(function(){var elem_1 = document.querySelector(".switch");var switch_1 = new Switchery(elem_1, { color: "#1AB394" });$("#switch").on("change", function(){dES('.$s['id'].');});$(".tooltip-demo span").attr("data-toggle", "tooltip");$(".tooltip-demo span").attr("data-placement", "top");$(".tooltip-demo span").attr("data-original-title", "Disable");function dES(id){$.ajax({type:"POST",url:base_url+"evaluate/disableEvalSched",data:({type:"disableEvalSched",id:id}),dataType:"json",success:function(data){if(data.status=="success"){switch_1.disable();}}});}});</script>';
        			} else {
        				$data = array(
												'active' => 0
								);
								$this->db->where('id', $s['id']);
								$this->db->update('status', $data);

								echo 'Inactive';
        			}
        		} else {
        			echo 'Inactive';
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

<hr style="border-bottom:2px solid #737373; margin: 0;">

<?php echo form_open(base_url().'enroll/schedule'); ?>
<div class="row m-r-none m-l-none" style="margin-bottom: 3px !important;">
	<div class="ibox m-b-none">
		<div class="ibox-title"><h4>Add Enrollment Schedule</h4></div>
		<div class="ibox-content">
			<div class="row">
				<div class="form-group"><label class="col-sm-2 control-label text-right">School Year/Semester*</label>
	        <div class="col-sm-4 no-padding"><select class="form-control m-b" name="sem_id" required="">
	        	<?php foreach ($sem as $s) { ?>
	        	<option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
	        	<?php } ?>
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
