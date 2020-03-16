<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create Schedule
        </h1>
        <ol class="breadcrumb">
            <li class="active">Create Schedule</li>
        </ol>
    </section><hr>
    <section class="content">
         <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
            <?php echo $this->session->flashdata('message'); ?></h5>
    <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/addSchedule') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label  class="control-label">School Year</label>
                                    <input type="year" class="form-control" name="school_year" placeholder="School Year">
                                </div>
                                 <div class="col-sm-6">
                                    <label  class="control-label">Schedule Name</label>
                                    <input type="text" class="form-control" name="schedule_name" placeholder="Schedule Name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="grade_level" class="control-label">Grade Level</label>
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
                                <div class="col-sm-6">
                                    <label for="subject" class="control-label">Subject</label>
                                    <select class="form-control" name="subject">
                                        <option value="">Select Subject</option>
                                        <?php 
                                            if(!empty($getSubjectList))
                                            {
                                                foreach($getSubjectList as $row)
                                                {
                                                    if($row->subject_id == $subject)
                                                        echo"<option selected value='".$row->subject_id."'>".$row->subject." </option>";
                                                    else
                                                        echo"<option value='".$row->subject_id."'>".$row->subject."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                   <div class="col-sm-6">
                                    <label for="subject" class="control-label">Section</label>
                                    <select class="form-control" name="subject">
                                        <option value="">Select Section</option>
                                        <?php 
                                            if(!empty($getSectionList))
                                            {
                                                foreach($getSectionList as $row)
                                                {
                                                    if($row->section_id == $section)
                                                        echo"<option selected value='".$row->section_id."'>".$row->section." </option>";
                                                    else
                                                        echo"<option value='".$row->section_id."'>".$row->section."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                    <div class="col-sm-6">
                                    <label  class="control-label">Day</label>
                                    <input type="text" class="form-control" name="day" placeholder="Day">
                                </div>
                                    <div class="col-sm-6">
                                    <label  class="control-label">Time Start</label>
                                    <input type="time" class="form-control" name="time_start" placeholder="Time Start">
                                </div>
                                    <div class="col-sm-6">
                                    <label  class="control-label">Time End</label>
                                    <input type="time" class="form-control" name="time_end" placeholder="Time End">
                                </div>
                                <div class="col-sm-6">
                                    <label for="teacher" class="control-label">Teacher</label>
                                    <select class="form-control" name="teacher">
                                        <option value="">Select Teacher</option>
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
