<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create Subject
        </h1>
        <ol class="breadcrumb">
            <li class="active">Create Subject</li>
        </ol>
    </section><hr>
    <section class="content">
         <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
            <?php echo $this->session->flashdata('message'); ?></h5>
    <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/addSubjectList') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="subject_code" class="col-sm-1 control-label">Subject Code</label>
                                    <input type="text" class="form-control" name="subject_code" placeholder="Subject Code">
                                </div>
                                <div class="col-sm-6">
                                    <label for="subject_name" class="col-sm-1 control-label">Subject Name</label>
                                    <input type="text" class="form-control" name="subject_name" placeholder="Subject Name">
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
