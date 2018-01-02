<style type="text/css">
	div#page-wrapper.gray-bg.dashbard-1{
		height: 100%;
	}
</style>


<h2 class="text-center bg-primary p-xs b-r-md">Faculty Evaluation Results</h2>
<div class="panel panel-info">
	<div class="panel-body p-xs">
	<div class="form-group col-md-3 m-b-none p-xxs">
		<label>School Year/Semester</label>
		<select class="form-control nopadding" name="sem" id="sem">
		  <?php foreach($sem as $s){ ?>
		  <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
		  <?php } ?>
		</select>
	</div>

	<div class="form-group col-md-4 m-b-none p-xxs">
		<label>College</label>
		<select id="college" class="form-control" name="college">
			<?php foreach($college as $c){ ?>
		  <option value="<?= $c['code'] ?>"><?= $c['name'] ?></option>
		  <?php } ?>
		</select>
	</div>

	<div class="form-group col-md-4 m-b-none p-xxs">
		<label>Faculty</label>
		<select id="faculty" class="form-control" name="faculty" id="faculty">
		</select>
	</div>
	<div class="form-group p-xs m-b-none col-md-1">
		<label></label>
		<button class="btn btn-primary" type="button" id="search">Search</button>
	</div>
	</div>
</div>

<table class="table table-striped">
  <thead>
  <tr>
    <th class="text-center col-md-1">#</th>
    <th class="col-md-3">Faculty Name</th>
    <th class="col-md-1">Code</th>
    <th class="col-md-4">Subject</th>
    <th class="col-md-1">Rating</th>
    <th class="col-md-2" colspan="2">Remarks</th>
  </tr>
  </thead>
  <tbody id="theTable">
  </tbody>
</table>

<div class="middle-box text-center animated fadeInDown" id="theError"></div>

<script>
	$(document).ready(function(){
		populateFaculty();
		$('#college').on('change', function(){
			populateFaculty();
			//End onChange
		});
		$('#search').on('click', function(){
			populateTable();
		});
	})

	function populateTable(){
		var sem = $('#sem').val();
		var faculty = $('#faculty').val();
		$.ajax({
			type: 'POST',
			url: base_url+'evaluate/getEvalResult',
			data: ({
				type: 'getEvalResult',
				sem: sem,
				faculty: faculty
			}),
			dataType: "json",
			success: function(data){
				if(data.status == 'success'){
					// console.log(data.res);
					$('#theTable').empty();
					$('#theError').empty();
					if(data.res.length>0){
						for(var i=0;i<=data.res.length;i++){
						var content = '<tr><td class="text-center">'+(i+1)+'</td><td>'+data.res[i].faculty+'</td><td>'+data.res[i].code+'</td><td>'+data.res[i].title+'</td><td>'+data.res[i].rating+'</td><td>'+data.res[i].remarks+'</td><td><a href="'+base_url+'evaluate/report/'+data.res[i].id+'"><i class="fa fa-file"></i></a></td></tr>';
						$('#theTable').append(content);
						}
					} else {
						var content = '<h3 class="font-bold">No Data Found.</h3>';
						$('#theError').append(content);
					}
				}
			}
		});
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

