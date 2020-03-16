<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create Section
        </h1>
        <ol class="breadcrumb">
            <li class="active">Create Section</li>
        </ol>
    </section><hr>
    <section class="content">
         <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
            <?php echo $this->session->flashdata('message'); ?></h5>
    <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/addSection') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="section_name" class="col-sm-1 control-label">Section Name</label>
                                    <input type="text" class="form-control" name="section_name" placeholder="Section Name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="grade_level" class="col-sm-1 control-label">Grade Level</label>
                                    <select class="form-control" name="grade_level">
                                        <option value="">Select Grade Level</option>
                                        <?php 
                                            if(!empty($getGradeList))
                                            {
                                                foreach($getGradeList as $row)
                                                {
                                                    if($row->grade_id == $grade_level)
                                                        echo"<option selected value='".$row->grade_id."'>".$row->grade_level." </option>";
                                                    else
                                                        echo"<option value='".$row->grade_id."'>".$row->grade_level."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
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
