<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create Faculty 
        </h1>
        <ol class="breadcrumb">
            <li class="active">Create Faculty</li>
        </ol>
    </section><hr>
    <section class="content">
         <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
            <?php echo $this->session->flashdata('message'); ?></h5>
    <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/addFaculty') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="first_name" class="control-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                </div>
                                <div class="col-sm-4">
                                    <label for="last_name" class="control-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                </div>
                                <div class="col-sm-4">
                                    <label for="middle_name" class="control-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                                </div>
                                <div class="col-sm-4">
                                  <label for="contact_no" class="control-label">Contact Number</label>
                                    <input type="input" class="form-control"required id="contact_no"  name="contact_no" placeholder="Contact Number">
                                </div>
                                <div class="col-sm-4">
                                    <label for="birthday" class="control-label">Birthday</label>
                                    <input type="date" class="form-control"  required id="birthday" name="birthday" placeholder="Birthday">
                                </div>
                                <div class="col-sm-4">
                                    <label for="username" class="control-label">Username</label>
                                    <input type="text" class="form-control"  required id="username" name="username" placeholder="Username">
                                </div>
                                <div class="col-sm-4">
                                    <label for="user_type" class="control-label">User Type</label>
                                    <select class="form-control" name="user_type">
                                        <option value="">Select type of user</option>
                                        <option value="1">Director</option>
                                        <option value="2">Registrar</option>
                                        <option value="3">Academic Coordinator</option>
                                        <option value="4">Principal</option>
                                        <option value="5">Teacher</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="text" class="form-control" required id="email" name="email" placeholder="Email">
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
