<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Pasien</title>
  <style type="text/css" id="debugbar_dynamic_style"></style>
    <link rel="stylesheet" href="<?php echo base_url('asset/dist'); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/plugins'); ?>/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <script type="text/javascript" id="debugbar_loader" data-time="1585277113" src="<?php echo base_url('asset/plugins/'); ?>/index.php?debugbar"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hedvig+Letters+Serif:opsz@12..24&family=Poppins&family=Varela&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/7f732dc1b2.js" crossorigin="anonymous"></script>
    <script src=""></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center" style="text-align: center;">
              <img src="<?php echo base_url('asset/dist');?>/img/sikarpar.svg" alt="" style="height:100px;width:100px">
              <a href="#"><b>SIKARPAR</b></a>
              <p>Selamat Datang di Web Sistem Pakar 😊</p>
        </div>
        <?php
    $errors = session()->getFlashdata('errors');
    if ($errors !== null && !empty($errors)) {?>
        <div class="alert alert-danger" role="alert" style="margin:10px">
            <p style="margin-bottom: 0px;text-align:center"><?=$errors?></p>
        </div>
    <?php } ?>
    
      <p class="login-box-msg">Login Sebagai Pasien</p>
      <form action="<?=base_url().'user/Auth/login/proses';?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username"  id="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <br>
        don't have account? <br>
        <a href="<?= base_url().'user/Auth/register'?>" class="text-center">Register a New Account</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
