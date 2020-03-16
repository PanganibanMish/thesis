<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Attendance Type
        </h1>
        <ol class="breadcrumb">
            <li class="active">Attendance Type</li>
        </ol>
    </section><hr>
     <a href="<?php echo site_url('Welcome/createAttendanceType') ?>" target='_blank' class='btn btn-sm btn-primary pull-right'>Create New Attendance Type  </a> 
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Attendance Type</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
                <thead>
                    <tr>
                      <th>Attendance ID</th>
                      <th>Attendance Name</th>
                      <th>Remarks</th>
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
                                    if(!empty($getAttendanceType))
                                    {
                                       foreach ($getAttendanceType as $row)
                                    {
                                        echo"<td>".$row->id."</td>";
                                        echo"<td>".$row->attendance_name."</td>";
                                        echo"<td>".$row->remarks."</td>";
                                        echo"<td>".$row->date_created."</td>";
                                        echo"<td>".$row->created_by."</td>";
                                        echo"<td>".$row->date_modified."</td>";
                                        echo"<td>".$row->modified_by."</td>";

                                        echo "<td><a href='".site_url('Welcome/updateAttendanceType?id=').$row->id." ' target='_blank' class='btn btn-sm btn-primary'>UPDATE</a></td>";

                                        echo "<td><a href='".site_url('Welcome/deleteAttendanceType?id=').$row->id."' target='_blank' class='btn btn-sm btn-danger'>DELETE</a></td>";
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
 