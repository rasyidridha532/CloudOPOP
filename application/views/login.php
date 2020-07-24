<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPOP | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <?= $script_captcha; ?>
</head>

<body class="login-page" style="min-height: 512.391px;">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo base_url() ?>" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/dist/img/logo_opop.png" alt="Logo OPOP" width="80%" style="opacity: .8">
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('messagelogin'); ?>

        <form action="<?php echo base_url('auth/login'); ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('email', '<small class="text-danger mt-6">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('password', '<small class="text-danger mt-6">', '</small>'); ?>
          <div class="input-group mb-3">
            <div class="col-8">
              <div class="icheck-primary">
                <?= $captcha; ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-8">
              <a href="<?php echo base_url('auth/register'); ?>" class="btn btn-info btn-block">Register</a>
            </div>
            <div class="col-xs-4 pl-3">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>