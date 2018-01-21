<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:0;">
	<div class="col-lg-10">
	  <h2>Assign Faculty</h2>
    <ol class="breadcrumb">
      <li class="active">
        <strong>SY: Semester</strong>
      </li>
      <li>
      	<select id="sy" class="form-control">
      		<?php foreach ($sy as $key => $value) { ?>
       		<option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
       		<?php } ?>
       	</select>
      </li>
    </ol>
	</div>
	<div class="col-lg-2">
	</div>
</div>

<style>
	/*.tabs-container .tabs-left > .nav-tabs {
		width: 10%;
	}
	.tabs-container .tabs-left .panel-body {
    width: 90%;
    margin-left: 10%;
	}*/
	.nav-tabs > li.active > a {
		background-color: #1ab394 !important;
    color: #ffffff !important;
	}
</style>

<div class="row">
	<div class="tabs-container">
		<div class="tabs-left">
			<ul class="nav nav-tabs">
				<?php $ctr=1; foreach ($courses as $key => $value) {
				if($ctr!=1){
					echo '<li class=""><a data-toggle="tab" href="#tab-'.$ctr.'" aria-expanded="false">'.$value['name'].'</a></li>'; $ctr++;
				} else {
					echo '<li class="active"><a data-toggle="tab" href="#tab-'.$ctr.'" aria-expanded="true">'.$value['name'].'</a></li>'; $ctr++;
				} ?>
				<?php } ?>
			</ul>
			<div class="tab-content ">
				<?php $ctr=1; foreach ($courses as $key => $value) {
				if($ctr!=1){
					echo '<div id="tab-'.$ctr.'" class="tab-pane"><div id="foo-'.$ctr.'" class="panel-body"></div></div>'; $ctr++;
				} else { 
					echo '<div id="tab-'.$ctr.'" class="tab-pane active"><div id="foo-'.$ctr.'" class="panel-body"></div></div>'; $ctr++;
				} ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<script>
  $(document).ready(function(){
    populatePanel();
    $('#sy').on('change', function(){
      populatePanel();
    });
  });

  function setFaculty(sel, i){
  	$.ajax({
  		type: 'POST',
  		url: base_url+'assignfaculty/setFaculty',
  		data: ({
  			type: 'setFaculty',
  			sel: sel.value,
  			id: i
  		}),
  		dataType: 'json'
  	}).done(function(data){
  		if(data.status=='success'){
  			// alert('success');
  		}
  	});
  }

  function populatePanel(){
    var sy = $('#sy').val();
    var courses = [];
    <?php foreach ($courses as $key => $value) {
    	echo 'courses.push("'.$value['code'].'");';
    } ?>
    // console.log(courses);
    $.each(courses, function(index, value){
    	$.ajax({
    		type: 'POST',
    		url: base_url+'assignfaculty/populatePanel',
    		data: ({
    			type: 'populatePanel',
    			sy: sy,
    			course: value
    		}),
    		dataType: 'json',
    	}).done(function(data){
    			if(data.status="success"){
    				console.log(data.out);
    				$('#foo-'+(index+1)).empty();
    				// console.log('Iteration: '+index+' Value: '+value);
    				$.each(data.out, function(x, y){
    					var content = '';

    					$.each(y, function(a, b){
    						if(b.title === undefined){

    						} else {
    							if(a==0){
    								content += '<div class="row"><div class="panel panel-primary"><div class="panel-heading">'+y.section_name+'</div><div class="panel-body" style="margin-left:0;"><table class="table"><thead><tr><th class="col-md-1 text-center">Subject Code</th><th class="col-md-4">Subject Title</th><th class="col-md-3">Faculty</th><th class="col-md-1 text-center">Section</th></tr></thead><tbody>';
    							}
    							content += '<tr><td class="text-center">'+b.code+'</td><td>'+b.title+'</td><td><select class="form-control" onchange="setFaculty(this, '+b.id+');">';

    							<?php foreach ($faculties as $key => $value) {
    								echo 'content += \'<option value="'.$value['id'].'">'.$value['first_name'].' '.$value['middle_name'].' '.$value['last_name'].'</option>\';';
    							} ?>

    							content += '</select></td><td class="text-center">'+b.section+'</td></tr>';
    						}
    					});
    					if(content!=''){
    						content += '</tbody></table></div></div></div>';
    					$('#foo-'+(index+1)).append(content);
    					}
    				});    				
    			}
    		});
    });
  }
</script>