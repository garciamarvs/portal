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
			<?php if($students){ ?>
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
					<?php foreach ($students as $key => $value) { ?>
					<tr>
						<td class="text-center"><?= ($key+1) ?></td>
						<td><?= $value['last_name'].', '.$value['first_name'].' '.$value['middle_name'] ?></td>
						<td><?= $value['user_ID'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } else { ?>
		</div>
	</div>
</div>

<div class="middle-box text-center animated fadeInDown"><h3 class="font-bold">No Data Found.</h3></div>
<?php } ?>