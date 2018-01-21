<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:0;">
	<div class="col-lg-10">
	  <h2>Course Masterlist</h2>
    <ol class="breadcrumb">
      <li class="active">
        <?= $course['code'] ?>
      </li>
      <li><strong><?= $course['title'] ?></strong></li>
    </ol>
	</div>
	<div class="col-lg-2">
	</div>
</div>

<div class="row p-md">
	<div class="ibox m-b-none">
		<div class="ibox-content">
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="col-md-1 text-center">#</th>
						<th class="col-md-3">Name</th>
						<th class="col-md-3">Student No.</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php if($students){
					 foreach ($students as $key => $value) {
					 $i = $this->course_model->getStudentById($value['student']); ?>
					<tr>
						<td class="text-center"><?= ($key+1) ?></td>
						<td><?= $i['first_name'].' '.$i['middle_name'].' '.$i['last_name'] ?></td>
						<td><?= $i['user_ID'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php } else { ?>

<div class="middle-box text-center animated fadeInDown"><h3 class="font-bold">No Data Found.</h3></div>
<?php } ?>