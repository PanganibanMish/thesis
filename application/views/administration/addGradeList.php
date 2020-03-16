<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create Grade Level
        </h1>
        <ol class="breadcrumb">
            <li class="active">Create Grade Level</li>
        </ol>
    </section><hr>
    <section class="content">
         <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
            <?php echo $this->session->flashdata('message'); ?></h5>
    <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/addGradeList') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label  class="control-label">Grade Level</label>
                                    <input type="text" class="form-control" name="grade_level" placeholder="Grade Level">
                                </div>
                                <div class="col-sm-6">
                                    <label for="adviser" class="col-sm-1 control-label">Adviser</label>
                                    <select class="form-control" name="adviser">
                                        <option value="">Select Adviser</option>
                                        <?php 
                                            if(!empty($userlist))
                                            {
                                                foreach($userlist as $row)
                                                {
                                                    echo"<option value='".$row->user_id."'>".$row->first_name." ".$row->last_name."</option>";
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
