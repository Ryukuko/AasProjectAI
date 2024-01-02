<?php echo view('user/header');?>
<?php echo view('user/sidebar');?>
    <!-- Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Password</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Password Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card"style="padding: 20px">
                            <div>
                                <?php
                                $errors = session()->getFlashdata('errors');
                                if(!empty($errors)){ ?>
                                    <div class="alert alert-danger" role="alert" >
                                        Walaw E! There was an error in the data edit :
                                        <ul>
                                            <?php foreach ($errors as $error) { ?>
                                                <li><?php echo esc($error); ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php
                                $password_salah = session()->getFlashdata('password_salah');
                                if (!empty($password_salah)) { ?>
                                    <div class="alert alert-danger" role="alert" style="margin:10px">
                                        <p style="margin-bottom: 0px;text-align: center"><?=$password_salah?></p>
                                    </div>
                                <?php }?>
                                <?php
                                $password_kosong = session()->getFlashdata('password_kosong');
                                if (!empty($password_kosong)) { ?>
                                    <div class="alert alert-danger" role="alert" style="margin:10px">
                                        <p style="margin-bottom: 0px;text-align: center"><?=$password_kosong?></p>
                                    </div>
                                <?php }?>
                                <?php
                                $berhasil_ganti = session()->getFlashdata('berhasil_ganti');
                                if (!empty($berhasil_ganti)) { ?>
                                    <div class="alert alert-success" role="alert" style="margin:10px">
                                        <p style="margin-bottom: 0px;text-align: center"><?=$berhasil_ganti?></p>
                                    </div>
                                <?php }?>
                                <form action="<?= base_url().'user/profile/editPassword';?>" method="post">
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-4 col-form-label">Password lama</label>
                                        <div class="col-sm-12">
                                          <input type="password" class="form-control" id="password" name="password_lama" placeholder="Password Baru">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                                        <div class="col-sm-12">
                                          <input type="password" class="form-control" id="password" name="password" placeholder="Password Lama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-4 col-form-label">Ulang Password Baru</label>
                                        <div class="col-sm-12">
                                          <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Ulang Password Baru">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                          <button type="submit" class="btn btn-danger float-right">Submit</button>
                                          <button type="submit" class="btn btn-info float-left"><a href="<?= base_url().'user/profile';?>" style="text-decoration:none;color:white;">Kembali</a></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php echo view('user/footer');?>
      
                  

