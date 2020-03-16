<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Student List 
        </h1>
        <ol class="breadcrumb">
            <li class="active">Student List</li>
        </ol>
    </section><hr>
    <section class="content">
        <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
                <?php echo $this->session->flashdata('message'); ?></h5>
        <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Student/addStudents') ?>">
                        <div class="box-body">
                            <h3>Student Information</h3><hr>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <label for="first_name" class="col-sm-1 control-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                </div>
                                <div class="col-sm-5">
                                    <label for="last_name" class="col-sm-1 control-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                </div>
                                <div class="col-sm-2">
                                    <label for="middle_name" class="col-sm-1 control-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="birthday" class="col-sm-1 control-label">Birthday</label>
                                    <input type="date" class="form-control"   id="birthday" name="birthday" placeholder="Birthday">
                                </div>
                                <div class="col-sm-3">
                                  <label for="contact_no" class="col-sm-1 control-label">Contact#</label>
                                    <input type="input" class="form-control" id="contact_no"  name="contact_no" placeholder="Contact Number">
                                </div>
                                <div class="col-sm-3">
                                    <label for="religion" class="col-sm-1 control-label">Religion</label>
                                    <input type="text" class="form-control"   id="religion" name="religion" placeholder="Religion">
                                </div>
                                <div class="col-sm-3">
                                    <label for="gender" class="control-label">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="email" class="col-sm-1 control-label">Email</label>
                                    <input type="text" class="form-control"  id="email" name="email_address" placeholder="Email">
                                </div>
                                <div class="col-sm-6">
                                    <label for="address" class="col-sm-1 control-label">Address</label>
                                    <input type="text" class="form-control"  id="address" name="home_address" placeholder="Home Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label class="control-label">Zip Code</label>
                                    <input type="text" class="form-control"   id="zip" name="zip_code" placeholder="Zip Code">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Nationality</label>
                                    <input type="input" class="form-control" id="nationality"  name="nationality" placeholder="Nationality">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Mother Tongue</label>
                                    <input type="text" class="form-control"   id="mother_tongue" name="mother_tongue" placeholder="Mother Tongue">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Parent Status</label>
                                    <select class="form-control" name="parent_status">
                                        <option value="">Select Status</option>
                                        <option value="Married">Married</option>
                                        <option value="Unmarried">Unmarried</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Single">Single</option>
                                        <option value="Unmarried">Unmarried</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label class="control-label">Living With</label>
                                    <select class="form-control" name="student_living_with">
                                        <option value="">Select Option</option>
                                        <option value="Both Parents">Both Parents</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Father">Father</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Other Relative living with</label>
                                    <input type="input" class="form-control" id="other_relative"  name="other_relative" placeholder="Other Relative living with">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Number of Siblings in the institution</label>
                                    <input type="Number" class="form-control" id="number_of_siblings_in_institution"  name="number_of_siblings_in_institution" placeholder="Number of Siblings in the institution">
                                </div>
                            </div><hr>
                            <!-- <h3>Parent Information</h3><hr>
                            <div class="form-group">
                                <div class="col-sm-5">
                                  <label class="control-label">Father's First Name</label>
                                    <input type="input" class="form-control" id="first_name"  name="first_name" placeholder="Father's First Name">
                                </div>
                                <div class="col-sm-5">
                                  <label class="control-label">Father's Last Name</label>
                                    <input type="input" class="form-control" id="last_name"  name="last_name" placeholder="Father's Last Name">
                                </div>
                                <div class="col-sm-2">
                                  <label class="control-label">Father's Middle Name</label>
                                    <input type="input" class="form-control" id="middle_name"  name="middle_name" placeholder="Father's Middle Name">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Father's Birthday</label>
                                    <input type="date" class="form-control" id="birthday"  name="birthday" placeholder="Father's Birthday">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Father's Contact No.</label>
                                    <input type="date" class="form-control" id="contact_no"  name="contact_no" placeholder="Father's Contact No.">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Father's Birthplace</label>
                                    <input type="text" class="form-control" id="birthplace"  name="birthplace" placeholder="Father's Birthplace">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Father's Current Address</label>
                                    <input type="text" class="form-control" id="current_address"  name="current_address" placeholder="Father's Current Address">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Father's Highest Education</label>
                                    <input type="text" class="form-control" id="highest_education"  name="highest_education" placeholder="Father's Highest Education">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Father's Occupation</label>
                                    <input type="text" class="form-control" id="occupation"  name="occupation" placeholder="Father's Occupation">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Father's Employer</label>
                                    <input type="text" class="form-control" id="employer"  name="employer" placeholder="Father's Employer">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Father's Work Place</label>
                                    <input type="text" class="form-control" id="work_place"  name="work_place" placeholder="Father's Work Place">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Father's Monthly Income</label>
                                    <input type="number" class="form-control" id="monthly_income"  name="monthly_income" placeholder="Father's Monthly Income">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Father's Annual Income</label>
                                    <input type="number" class="form-control" id="annual_income"  name="annual_income" placeholder="Father's Annual Income">
                                </div>
                            </div><hr>
                            <div class="form-group">
                                <div class="col-sm-5">
                                  <label class="control-label">Mother's First Name</label>
                                    <input type="input" class="form-control" id="first_name"  name="first_name" placeholder="Mother's First Name">
                                </div>
                                <div class="col-sm-5">
                                  <label class="control-label">Mother's Last Name</label>
                                    <input type="input" class="form-control" id="last_name"  name="last_name" placeholder="Mother's Last Name">
                                </div>
                                <div class="col-sm-2">
                                  <label class="control-label">Mother's Middle Name</label>
                                    <input type="input" class="form-control" id="middle_name"  name="middle_name" placeholder="Mother's Middle Name">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Mother's Birthday</label>
                                    <input type="date" class="form-control" id="birthday"  name="birthday" placeholder="Mother's Birthday">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Mother's Contact No.</label>
                                    <input type="date" class="form-control" id="contact_no"  name="contact_no" placeholder="Mother's Contact No.">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Mother's Birthplace</label>
                                    <input type="text" class="form-control" id="birthplace"  name="birthplace" placeholder="Mother's Birthplace">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Mother's Current Address</label>
                                    <input type="text" class="form-control" id="current_address"  name="current_address" placeholder="Mother's Current Address">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Mother's Highest Education</label>
                                    <input type="text" class="form-control" id="highest_education"  name="highest_education" placeholder="Mother's Highest Education">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Mother's Occupation</label>
                                    <input type="text" class="form-control" id="occupation"  name="occupation" placeholder="Mother's Occupation">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Mother's Employer</label>
                                    <input type="text" class="form-control" id="employer"  name="employer" placeholder="Mother's Employer">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Mother's Work Place</label>
                                    <input type="text" class="form-control" id="work_place"  name="work_place" placeholder="Mother's Work Place">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Mother's Monthly Income</label>
                                    <input type="number" class="form-control" id="monthly_income"  name="monthly_income" placeholder="Mother's Monthly Income">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Mother's Annual Income</label>
                                    <input type="number" class="form-control" id="annual_income"  name="annual_income" placeholder="Mother's Annual Income">
                                </div>
                            </div><hr>
                            <h3>Guardian Information (Fill up if guardian is not the same with parents)</h3><hr>
                            <div class="form-group">
                                <div class="col-sm-5">
                                  <label class="control-label">Guardian Name</label>
                                    <input type="input" class="form-control" id="guardian_name"  name="guardian_name" placeholder="Guardian's First Name">
                                </div>
                                <div class="col-sm-5">
                                  <label class="control-label">Relationship</label>
                                    <input type="input" class="form-control" id="guardian_relationship"  name="guardian_relationship" placeholder="Guardian's Relationship">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Guardian's Birthday</label>
                                    <input type="date" class="form-control" id="guardian_bday"  name="guardian_bday" placeholder="Guardian's Birthday">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Guardian's Contact No.</label>
                                    <input type="date" class="form-control" id="guardian_mobile"  name="guardian_mobile " placeholder="Guardian's Contact No.">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Guardian's Birthplace</label>
                                    <input type="text" class="form-control" id="guardian_birth_place"  name="guardian_birth_place" placeholder="Guardian's Birthplace">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Guardian's Current Address</label>
                                    <input type="text" class="form-control" id="guardian_address"  name="guardian_address" placeholder="Guardian's Current Address">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Guardian's Highest Education</label>
                                    <input type="text" class="form-control" id="guardian_education  "  name="guardian_education    " placeholder="Guardian's Highest Education">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Guardian's Occupation</label>
                                    <input type="text" class="form-control" id="guardian_occupation"  name="guardian_occupation" placeholder="Guardian's Occupation">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Guardian's Employer</label>
                                    <input type="text" class="form-control" id="guardian_employer"  name="guardian_employer" placeholder="Guardian's Employer">
                                </div>
                                <div class="col-sm-6">
                                  <label class="control-label">Guardian's Work Place</label>
                                    <input type="text" class="form-control" id="guardian_employer_address"  name="guardian_employer_address" placeholder="Guardian's Work Place">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Guardian's Monthly Income</label>
                                    <input type="number" class="form-control" id="guardian_monthly_income"  name="guardian_monthly_income" placeholder="Guardian's Monthly Income">
                                </div>
                                <div class="col-sm-3">
                                  <label class="control-label">Guardian's Annual Income</label>
                                    <input type="number" class="form-control" id="guardian_annual_income"  name="guardian_annual_income" placeholder="Guardian's Annual Income">
                                </div>
                            </div><hr> -->
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <input type="submit" name="submit" class="btn btn-sm btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>    
