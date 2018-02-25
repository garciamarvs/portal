<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:0;">
	<div class="col-lg-10">
	  <h2>Assign Faculty</h2>
    <ol class="breadcrumb">
      <li class="active">
        <strong>SY: Semester</strong>
      </li>      
      <li>
      	<select id="sy" class="custom">
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
  .tabs-container .tabs-left .panel-body {
    width: auto !important;
  }

  .custom {
    background-color: #FFFFFF;
    background-image: none;
    border: 1px solid #e5e6e7;
    border-radius: 1px;
    color: inherit;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    font-size: 14px;
  }
</style>

<div class="row">
  <div class="col-md-12">
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
</div>

<script>
  $(document).ready(function(){
    populatePanel();
    $('#sy').on('change', function(){
      populatePanel();
    });
  });

  $('option').click(function(event){
    event.stopPropagation();
    //rest of code
  })

  var lastSel;

  function setLastSel(sel){
    lastSel = sel.selectedIndex;
    // console.log('SET '+lastSel);
  }

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
  		} else if(data.status=='failed'){
        sel.selectedIndex = lastSel;
        swal({
          title: "Maximum Load Reached!",
          type: "warning",
          showConfirmButton: false,
          allowOutsideClick: true
        });
        // console.log('AFTER '+lastSel);
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
    				// console.log(data.out);
    				$('#foo-'+(index+1)).empty();
            if(data.out==false){
              var content = '<div class="middle-box text-center animated fadeInDown"><h3 class="font-bold">No Data Found.</h3></div>';
              $('#foo-'+(index+1)).append(content);
            } else {
              // console.log('Iteration: '+index+' Value: '+value);
              $.each(data.out, function(x, y){
                var content = '';

                $.each(y, function(a, b){
                  if(b.title === undefined){

                  } else {
                    if(a==0){
                      content += '<div class="row"><div class="panel panel-primary"><div class="panel-heading">'+y.section_name+'</div><div class="panel-body" style="margin-left:0;"><table class="table"><thead><tr><th class="col-md-1 text-center">Subject Code</th><th class="col-md-5">Subject Title</th><th class="col-md-4">Faculty</th><th class="col-md-3">Day | Time</th class="col-md-1 text-center"><th>Room</th></tr></thead><tbody>';
                    }
                    content += '<tr><td class="text-center">'+b.code+'</td><td>'+b.title+'</td><td><select class="faculty form-control" onchange="setFaculty(this, '+b.id+');" onfocus="setLastSel(this);"><option></option>';

                    <?php foreach ($faculties as $key => $value) {
                      echo 'if(b.instructor=="'.$value['id'].'"){content += \'<option value="'.$value['id'].'" selected>'.$value['first_name'].' '.$value['middle_name'].' '.$value['last_name'].'</option>\'} else {content += \'<option value="'.$value['id'].'">'.$value['first_name'].' '.$value['middle_name'].' '.$value['last_name'].'</option>\'}';
                    } ?>

                    content += '</select></td><td>'+b.schedule+'</td><td class="text-center">'+b.room+'</td></tr>';
                  }
                });
                if(content!=''){
                  content += '</tbody></table></div></div></div>';
                $('#foo-'+(index+1)).append(content);
                }
              });
            }
    			}
    		});
    });
  }
</script>