<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create Attendance Type
        </h1>
        <ol class="breadcrumb">
            <li class="active">Create Attendance Type</li>
        </ol>
    </section><hr>
    <section class="content">
         <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
            <?php echo $this->session->flashdata('message'); ?></h5>
    <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/addAttendanceType') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="attendance_name" class="control-label">Attendance Name</label>
                                    <input type="text" class="form-control" name="attendance_name" 
                                           placeholder="Attendance Name">
                                    <input type="hidden" name="id" class="form-control" value='<?php echo $id; ?>'>
                                </div>
                                <div class="col-sm-6">
                                    <label for="remarks" class="col-sm-1 control-label">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">CANCEL</button>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>    
