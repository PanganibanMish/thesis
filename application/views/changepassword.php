<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OLPA | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css')?>">
</head>
<body class="hold-transition login-page">
    <?php if($this->session->flashdata('message')) { //session na may alert hali sa controller/ ang message declared hali sa controller ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <h5><?php echo $this->session->flashdata('message'); ?></h5>
        </div>
    <?php } ?>
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Change Password</b></a>
        </div>
        <div class="login-box-body">
          <p class="login-box-msg">Please Change your Password Before Proceeding</p>
            <form method="post" action="<?php echo site_url('Welcome/processchangepassword'); ?>"class="form-horizontal">
                <div class="form-group">
                  <label>New Password: </label><br>
                    <div class="col-sm-10">
                      <input type="password" required name="new_password" class="form-control" placeholder="New Password">
                    </div> 
                    <label>Confirm Password: </label><br>
                    <div class="col-sm-10">
                        <input type="password" required name="confirm_password" class="form-control" placeholder="Confirm Password">
                    </div><br><br>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Change Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>