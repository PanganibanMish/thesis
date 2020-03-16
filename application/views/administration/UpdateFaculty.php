<?php 

    $user_id = "";
    $fullname = "";
    $contact_no  = "";
    $birthday  = "";
    $username = "";
    $user_type = "";
  
        if(!empty($getUser))
        {
            foreach ($getUser as $row)
            {
                $user_id  = $row->user_id;
                $first_name = $row->first_name;
                $last_name = $row->last_name;
                $middle_name = $row->middle_name;
                $contact_no = $row->contact_no;
                $birthday = date_format(date_create($row->birthday), 'Y-m-d');
                $username = $row->username;
                $user_type = $row->user_type;
                $email = $row->email;
                $date_created = $row->date_created;
                $created_by = $row->created_by;
                $modified_date = $row->modified_date;
                $modified_by = $row->modified_by;
                $login_first = $row->login_first;
            }
        }
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Update Faculty 
        </h1>
        <ol class="breadcrumb">
            <li class="active">Update Faculty</li>
        </ol>
    </section><hr>
    <section class="content">
         <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
            <?php echo $this->session->flashdata('message'); ?></h5>
    <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                  <form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/savechangesFaculty'); ?>">
                    <div class="box-body">
                      <div class="form-group">
                        <div class="col-sm-4">
                        <label for="user_id" class="control-label">User ID</label>
                        <input type="text" readonly class="form-control first-column" value='<?php echo $user_id; ?>'required id="user_id" name="user_id" placeholder="User ID">
                  </div>
                <div class="col-sm-4">
                  <label for="first_name" class="control-label">First Name</label>
                  <input type="text" class="form-control" value='<?php echo $first_name; ?>' name="first_name" placeholder="First Name">
                  </div>
                    <div class="col-sm-4">
                      <label for="last_name" class="control-label">Last Name</label>
                      <input type="text" class="form-control" value='<?php echo $last_name; ?>' name="last_name" placeholder="Last Name">
                  </div>
                  <div class="col-sm-4">
                    <label for="middle_name" class="control-label">Middle Name</label>
                    <input type="text" class="form-control" value='<?php echo $middle_name; ?>' name="middle_name" placeholder="Middle Name">
                  </div>
                <div class="col-sm-4">
                  <label for="contact_no" class="control-label">Contact Number</label>
                  <input type="input" class="form-control" value='<?php echo $contact_no; ?>'required id="contact_no"  name="contact_no" placeholder="Contact Number">
                  </div>
                <div class="col-sm-4">
                  <label for="birthday" class="control-label">Birthday</label>
                  <input type="date" class="form-control" value='<?php echo $birthday; ?>' required id="birthday" name="birthday" placeholder="Birthday">
                  </div>
                <div class="col-sm-4">
                  <label for="username" class="control-label">Username</label>
                  <input type="text" class="form-control" value='<?php echo $username; ?>' required id="username" name="username" placeholder="Username">
                  </div>
                <div class="col-sm-4">
                  <label for="user_type" class="control-label">User Type</label>
                  <input type="text" readonly class="form-control" value='<?php echo $user_type; ?>' required id="user_type" name="user_type" placeholder="User Type">
                  </div>
                <div class="col-sm-4">
                  <label for="email" class="control-label">Email</label>
                  <input type="text" class="form-control" value='<?php echo $email; ?>' required id="email" name="email" placeholder="Email">
                  </div>
                  <div class="col-sm-4">
                  <label for="date_created" class="control-label">Date Created</label>
                    <input type="text" readonly class="form-control" value='<?php echo $date_created; ?>' required id="date_created" name="date_created" placeholder="Date Created">
                  </div>
                  <div class="col-sm-4">
                  <label for="created_by" class="control-label">Created By</label>
                  <input type="text" readonly class="form-control" value='<?php echo $created_by; ?>' required id="created_by" name="created_by" placeholder="Created By">
                </div>
                  <div class="col-sm-4">
                  <label for="modified_date" class="control-label">Modified Date</label>
                    <input type="text" readonly class="form-control" value='<?php echo $modified_date; ?>' required id="modified_date" name="modified_date" placeholder="Modified Date">
                  </div>
               <div class="col-sm-4">
                  <label for="modified_by" class="control-label">Modified By</label>
                  <input type="text" readonly class="form-control" value='<?php echo $modified_by; ?>' required id="modified_by" name="modified_by" placeholder="Modified By">
                  </div>
               <div class="col-sm-4">
                  <label for="login_first" class="control-label">Login Status</label>
                  <input type="text" readonly class="form-control" value='<?php echo $login_first; ?>' required id="login_first" name="login_first" placeholder="Login Status">
                </div>
            </div>
          </div>
        </div>
      </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">CANCEL</button>
                <button type="submit" class="btn btn-sm btn-primary pull-right">UPDATE</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
           
        </div>
        
    </section>
</div>    
