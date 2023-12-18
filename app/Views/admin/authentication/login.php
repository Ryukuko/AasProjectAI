<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Sistem Pakar Diagnosa Penyakit Paru-Paru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('asset/plugins');?>/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/plugins');?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/dist');?>/css/adminlte.min.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #d2d6de;
        }
        .login-box {
            margin-top: 5%;
        }
    </style>
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center" style="display: flex; ">
            <img src="<?php echo base_url('asset/dist');?>/img/sikarpar.svg" width="80px" height="80px" alt="">
            <h1 style="padding-top: 15px; height: fit-content">SIKARPAR</h1>
        </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="path/to/auth/proses_login" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="username" id="id" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <p class="mb-0">
                            <a href="path/to/auth/register" class="text-center">Register</a>
                        </p>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url('asset/plugins');?>/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('asset/plugins');?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('asset/dist'); ?>/js/adminlte.min.js"></script>
</body>

</html>
