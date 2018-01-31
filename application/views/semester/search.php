<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:0;">	
  <div class="col-lg-6">
    <h2>Search Results: </h2>
	</div>
  <div class="col-lg-6">
    <?php echo form_open(base_url().'semester/search'); ?>
    <div class="pull-right m-t-md">
      <div class="input-group">
        <input type="text" placeholder="e.g., Student ID or Name" name="search" class="form-control" required="">
        <div class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>

<style>
  .input-group .form-control {
    float: right !important;
    width: 50% !important;
  }
  span.tooltip-demo .btn {
    padding: 0 !important;
  }
</style>

<div class="row p-md">
  <div class="ibox m-b-none">
    <div class="ibox-content">
      <?php if($students){ ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="col-md-1 text-center">#</th>
            <th class="col-md-3">Name</th>
            <th class="col-md-2">Student No.</th>
            <th class="col-md-0 text-center"></th>
            <th class="col-md-6"></th>
          </tr>
        </thead>
        <tbody>
           <?php foreach ($students as $key => $value) { ?>
          <tr>
            <td class="text-center"><?php echo ($key+1); ?></td>
            <td><?php if($value['last_name']==''){echo $value['first_name'].' '.$value['middle_name'];}else{ echo $value['last_name'].', '.$value['first_name'].' '.$value['middle_name'];} ?></td>
            <td><?= $value['user_ID'] ?></td>
            <td>
              <?php echo form_open(base_url().'semester/viewstudent'); ?>
              <input type="hidden" value="<?= $value['id'] ?>" name="data">
              <span class="tooltip-demo"><button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="" data-original-title="View Student"><i class="fa fa-file"></i></button></span>
              <?php echo form_close(); ?>
            </td>
            <td></td>
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
