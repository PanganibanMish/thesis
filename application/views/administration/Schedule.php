<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Schedule List
        </h1>
        <ol class="breadcrumb">
            <li class="active">Schedule List</li>
        </ol>
    </section><hr>
     <a href="<?php echo site_url('Welcome/createScheduleList') ?>" target='_blank' class='btn btn-sm btn-primary pull-right'>Create New Schedule </a> 
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Schedule List</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
                <thead>
                    <tr>
                      <th>Schedule ID</th>
                      <th>School Year</th>
                      <th>Schedule Name</th>
                      <th>Grade Level</th>
                      <th>Subject</th>
                      <th>Section</th>
                      <th>Day</th>
                      <th>Time Start</th>
                      <th>Time End</th>
                      <th>Teacher</th>
                      <th>Date Created</th>
                      <th>Created By</th>
                      <th>Modified Date</th>
                      <th>Modified By</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(!empty($getScheduleList))
                        {
                            foreach ($getScheduleList as $row)
                            {
                                
                                        echo"<td>".$row->schedule_id."</td>";
                                        echo"<td>".$row->school_year."</td>";
                                        echo"<td>".$row->schedule_name."</td>";
                                        echo"<td>".$row->grade_level_id."</td>";
                                        echo"<td>".$row->subject_id."</td>";
                                        echo"<td>".$row->section_id."</td>";
                                        echo"<td>".$row->day."</td>";
                                        echo"<td>".$row->time_start."</td>";
                                        echo"<td>".$row->time_end."</td>";
                                        echo"<td>".$row->teacher."</td>";
                                        echo"<td>".$row->date_created."</td>";
                                        echo"<td>".$row->created_by."</td>";
                                        echo"<td>".$row->date_modified."</td>";
                                        echo"<td>".$row->modified_by."</td>";

                                        echo "<td><a href='".site_url('Welcome/updateScheduleList?id=').$row->schedule_id." ' target='_blank' class='btn btn-sm btn-primary'>UPDATE</a></td>";

                                        echo "<td><a href='".site_url('Welcome/deleteScheduleList?id=').$row->schedule_id."' target='_blank' class='btn btn-sm btn-danger'>DELETE</a></td>";
                                echo"</tr>";
                            }
                        }
                    ?>
                </tbody>
              </table>
            </div>
        </div>
    </section>
</div>
 