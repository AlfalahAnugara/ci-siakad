<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="<?php base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php base_url() ?>assets/css/login.css" rel="stylesheet" media="screen">
  </head>
  <body id="login">
    <div class="container">
      <form class="form-signin" action="<?php echo base_url('login/proses'); ?>" method="post">
        <h2 class="form-signin-heading">Silahkan Login</h2>
		<?php
        	if (validation_errors() || $this->session->flashdata('result_login')) {
        ?>
        <div class="alert alert-error">
        	<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong>
            <?php echo validation_errors(); ?>
            <?php echo $this->session->flashdata('result_login'); ?>
        </div>    
        <?php } ?>
        <input type="text" class="input-block-level" name="username" placeholder="Username">
        <input type="password" class="input-block-level" name="password" placeholder="Password">
        <button class="btn btn-primary" type="submit">Login</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>