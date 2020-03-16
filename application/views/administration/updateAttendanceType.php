<?php 

    $id = "";
    $attendance_name = "";
    $remarks  = "";
  
        if(!empty($getAttendanceType))
        {
            foreach ($getAttendanceType as $row)
            {
                $id = $row->id;
                $attendance_name = $row->attendance_name;
                $remarks  = $row->remarks;
            }
        }
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Update Attendance Type
        </h1>
        <ol class="breadcrumb">
            <li class="active">Update Attendance Type</li>
        </ol>
    </section><hr>
    <section class="content">
         <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
            <?php echo $this->session->flashdata('message'); ?></h5>
    <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                  <form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/savechangesAttendanceType'); ?>">
                    <div class="box-body">
                      <div class="form-group row">
                        <div class="col-sm-4">
                      <label for="attendance_name" class="control-label">Attendance Name</label>
                      <input type="text" class="form-control" value='<?php echo $attendance_name; ?>' name="attendance_name" placeholder="Attendance Name">
                      <input type="hidden" name="id" class="form-control" value='<?php echo $id; ?>'>
                  </div>
                  <div class="col-sm-6">
                    <label for="remarks" class="control-label">Remarks</label>
                    <input type="text" class="form-control" value='<?php echo $remarks; ?>' name="remarks" placeholder="Remarks">
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">CANCEL</button>
                <button type="submit" class="btn btn-sm btn-primary pull-right">UPDATE</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
           
        </div>
        
    </section>
</div>    
