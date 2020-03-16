<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Section List
        </h1>
        <ol class="breadcrumb">
            <li class="active">Section List</li>
        </ol>
    </section><hr>
     <a href="<?php echo site_url('Welcome/createSectionList') ?>" target='_blank' class='btn btn-sm btn-primary pull-right'>Create New Section </a> 
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Section List</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
                <thead>
                    <tr>
                      <th>Section ID</th>
                      <th>Section Name</th>
                      <th>Grade Level</th>
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
                        if(!empty($getSectionList))
                        {
                            foreach ($getSectionList as $row)
                            {
                                
                                        echo"<td>".$row->section_id."</td>";
                                        echo"<td>".$row->section_name."</td>";
                                        echo"<td>".$row->grade_level."</td>";
                                        echo"<td>".$row->date_created."</td>";
                                        echo"<td>".$row->created_by."</td>";
                                        echo"<td>".$row->date_modified."</td>";
                                        echo"<td>".$row->modified_by."</td>";

                                        echo "<td><a href='".site_url('Welcome/updateSectionList?id=').$row->section_id." ' target='_blank' class='btn btn-sm btn-primary'>UPDATE</a></td>";

                                        echo "<td><a href='".site_url('Welcome/deleteSectionList?id=').$row->section_id."' target='_blank' class='btn btn-sm btn-danger'>DELETE</a></td>";
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
 