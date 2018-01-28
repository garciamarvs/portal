<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:0;">
	<div class="col-lg-10">
	  <h2>Students Enrolled</h2>
    <ol class="breadcrumb">
      <li class="active">
        <strong>SY: Semester</strong>
      </li>
      <li>
        <?php echo form_open(base_url().'semester/enrolled'); ?>
      	<select id="sy" class="custom" name="sy" onchange="this.form.submit()">
          <?php foreach ($sy as $key => $value) { ?>
          <option value="<?= $value['id'] ?>" <?php if($value['id']==$currSY){echo 'selected';} ?>><?= $value['name'] ?></option>
          <?php } ?>
       	</select>
        <?php echo form_close(); ?>
      </li>
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

<?php if($students){ ?>
<div class="text-center">
  <div class="btn-group" style="margin-bottom: 100px;">
      <?php echo $this->pagination->create_links(); ?>
  </div>
</div>
<?php } ?>

<style>
  form {
    display: inline !important;
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