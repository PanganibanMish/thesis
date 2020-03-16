<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Subject List
        </h1>
        <ol class="breadcrumb">
            <li class="active">Subject List</li>
        </ol>
    </section><hr>
     <a href="<?php echo site_url('Welcome/createSubjectList') ?>" target='_blank' class='btn btn-sm btn-primary pull-right'>Create New Subject </a> 
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Subject List</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
                <thead>
                    <tr>
                      <th>Subject ID</th>
                      <th>Subject Code</th>
                      <th>Subject Name</th>
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
                        if(!empty($getSubjectList))
                        {
                            foreach ($getSubjectList as $row)
                            {
                                
                                        echo"<td>".$row->subject_id."</td>";
                                        echo"<td>".$row->subject_code."</td>";
                                        echo"<td>".$row->subject_name."</td>";
                                        echo"<td>".$row->date_created."</td>";
                                        echo"<td>".$row->created_by."</td>";
                                        echo"<td>".$row->date_modified."</td>";
                                        echo"<td>".$row->modified_by."</td>";

                                        echo "<td><a href='".site_url('Welcome/updateSubjectList?id=').$row->subject_id." ' target='_blank' class='btn btn-sm btn-primary'>UPDATE</a></td>";

                                        echo "<td><a href='".site_url('Welcome/deleteSubjectList?id=').$row->subject_id."' target='_blank' class='btn btn-sm btn-danger'>DELETE</a></td>";
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
 