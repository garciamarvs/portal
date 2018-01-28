<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:0;">
	<div class="col-lg-10">
	  <h2>Course Masterlist</h2>
    <ol class="breadcrumb">
      <li class="active">
        SY: Semester
      </li>
      <li><strong><?= $sem['name'] ?></strong></li>
    </ol>
	</div>
	<div class="col-lg-2">
	</div>
</div>

<div class="row p-md">
	<div class="ibox m-b-none">
		<div class="ibox-content">
			<?php foreach ($courses as $s) { ?>
			<div class="panel panel-primary">
        <div class="panel-heading">
          <?php $section = $this->course_model->getSectionById($s['section_id']); echo $section['name']; ?>
        </div>
        <div class="panel-body">
        	<table class="table table-striped">
						<thead>
							<tr>
								<th class="col-md-0 text-center">#</th>
								<th class="col-md-1 text-center">Subject Code</th>
								<th class="col-md-4">Subject Title</th>
								<th class="col-md-0 text-center">Units</th>
								<th class="col-md-3 text-center">Schedule</th>
								<th class="col-md-2 text-center">Room</th>
							</tr>
						</thead>
						<tbody>
							<?php $xCourses = $this->course_model->getCoursePerSection($s['section_id'], $sem['id']);
							foreach ($xCourses as $key => $value) { ?>
							<tr>
								<td class="text-center"><?= ($key+1) ?></td>
								<td class="text-center"><?= $value['code'] ?></td>
								<td><a href="<?= base_url().'course/details/'.$value['id'] ?>"><?= $value['title'] ?></a></td>
								<td class="text-center"><?= $value['unit'] ?></td>
								<td class="text-center"></td>
								<td class="text-center"></td>
							</tr>
							<?php } ?>
						</tbody>
        	</table>
        </div>
	    </div>
	    <?php } ?>
		</div>
	</div>
</div>