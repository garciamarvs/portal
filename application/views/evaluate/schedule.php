<script>
	$(document).ready(function(){
		$('#data_1 .input-group.date').datepicker({todayBtn: "linked", keyboardNavigation: false, forceParse: false, calendarWeeks: true, autoclose: true });
    $('#data_2 .input-group.date').datepicker({todayBtn: "linked", keyboardNavigation: false, forceParse: false, calendarWeeks: true, autoclose: true });
	});
</script>

<h4 class="bg-primary p-xs b-r-md" style="margin-bottom: 3px !important;">Faculty Evaluation Schedule</h4>
<hr style="border-bottom:2px solid #737373; margin: 0;">

<div class="row" style="margin-right: 0;margin-left: 0;margin-bottom: 3px !important;">
	<div class="ibox col-md-12" style="margin-bottom: 0 !important;">
		<div class="ibox-content">
			<div class="row">
				<div class="form-group"><label class="col-sm-2 control-label text-right">School Year/Semester*</label>
	        <div class="col-sm-4" style="padding: 0 !important;"><select class="form-control m-b" style="padding: 0 !important;" name="">
	          <option>SY2017-2018 Second Semester</option>
	          <option>option 2</option>
	          <option>option 3</option>
	          <option>option 4</option></select>
	        </div>
	      </div>
	    </div>

	    <div class="row">
				<div class="form-group" id="data_1"><label class="col-sm-2 control-label text-right">Start Date*</label>
		      <div class="col-sm-4 input-group date">
		        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="<?= date('m-d-Y') ?>">
		      </div>
		  	</div>
		  </div>

		  <div class="row">
				<div class="form-group" id="data_2"><label class="col-sm-2 control-label text-right">End Date*</label>
		      <div class="col-sm-4 input-group date">
		        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="<?= date('m-d-Y') ?>">
		      </div>
		  	</div>
		  </div>

		  <div class="row">
		  	<div class="col-sm-2"></div>
		  	<div class="col-sm-4" style="padding: 0 !important;"><button type="button" class="btn btn-primary">Add!</button></div>
		  </div>
		</div>
	</div>
</div>
<hr style="border-bottom:2px solid #737373; margin: 0;">
