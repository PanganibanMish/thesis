<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Faculty
        </h1>
        <ol class="breadcrumb">
            <li class="active">Faculty</li>
        </ol>
    </section><hr>
      <a href="<?php echo site_url('Welcome/createFaculty') ?>" target='_blank' class='btn btn-sm btn-primary pull-right'>Create New Faculty</a>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User List</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
                <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Full Name</th>
                       <th>Contact Number</th>
                      <th>Birthday</th>
                      <th>Username</th>
                      <th>User Type</th>
                      <th>Email</th>
                      <th>Date Created</th>
                      <th>Created By</th>
                      <th>Modified Date</th>
                      <th>Modified By</th>
                      <th>Login First</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(!empty($getUser))
                        {
                            foreach ($getUser as $row)
                            {
                              if($row->user_type == '1')
                                    $user_type = 'Director';
                                else if($row->user_type == '2')
                                    $user_type = 'Registrar';
                                else if($row->user_type == '3')
                                    $user_type = 'Academic Coordinator';
                                else if($row->user_type == '4')
                                    $user_type = 'Principal';
                                else 
                                    $user_type = 'Teacher';
                               
                                echo "<tr>";
                                        echo"<td>".$row->user_id."</td>";
                                        echo "<td>".$row->last_name." ".$row->first_name.", ".$row->middle_name."</td>";
                                        echo"<td>".$row->contact_no."</td>";
                                        echo"<td>".$row->birthday."</td>";
                                        echo"<td>".$row->username."</td>";
                                        echo"<td>".$user_type."</td>";
                                        echo"<td>".$row->email."</td>";
                                        echo"<td>".$row->date_created."</td>";
                                        echo"<td>".$row->created_by."</td>";
                                        echo"<td>".$row->modified_date."</td>";
                                        echo"<td>".$row->modified_by."</td>";
                                        echo"<td>".$row->login_first."</td>";

                                        echo "<td><a href='".site_url('Welcome/UpdateFaculty?id=').$row->user_id." ' target='_blank' class='btn btn-sm btn-primary'>UPDATE</a></td>";

                                        echo "<td><a href='".site_url('Welcome/deleteFaculty?id=').$row->user_id."' target='_blank' class='btn btn-sm btn-danger'>DELETE</a></td>";
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
 