<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url('asset/dist');?>/img/sikarpar.svg" >
    <title>Login - SIKARPAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('asset/plugins');?>/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/plugins');?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/dist');?>/css/adminlte.min.css">
    <style>
        * {
            font-family: 'Poppins';
        }
        body {
            background-color: #d2d6de;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center" style="text-align: center;">
            <img src="<?php echo base_url('asset/dist');?>/img/sikarpar.svg" width="200px" height="200px" style="margin: auto;" alt="">
            <h1 style="padding-top: 15px; height: fit-content; margin-bottom: 0px">SIKARPAR</h1>
            <p>Sitem Pakar Penyakit Paru-Paru</p>
        </div>
        <?php
        $errors = session()->getFlashdata('errors');
        if(!empty($errors)){ ?>
            <div class="alert alert-danger"  style="margin:10px"  role="alert">
                Walaw E! There was an error in the data input :
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li style="margin-bottom: 0px;" ><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php } ?>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Register SIKARPAR Account</p>
            <form action="<?= base_url().'user/Auth/register/create';?>" method="post">
        <div class="input-group mb-3">
          <input type="text"  name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password"   class="form-control" name="confirm_password"  placeholder="Konfirmasi  Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
        </div>
      </form>
            <p style="color: black; margin-bottom: 10px;margin-top: 10px; text-align: center">Already have an account ? <a href="<?= base_url().'user/Auth/login';?>">Sign In</a></p>

    </div>
  </div>
</div>
</div>
<script src="<?php echo base_url('asset/plugins');?>/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('asset/plugins');?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('asset/dist'); ?>/js/adminlte.min.js"></script>
</body>

</html>
