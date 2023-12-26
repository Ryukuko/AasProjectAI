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
                                <ul class="nav nav-pills">
                                    <?php
                                    $errors = session()->getFlashdata('errors');
                                    if(!empty($errors)){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12" style="width: 830px">
                                             <div class="alert alert-danger">
                                                Walaw E! Ada kesalahan saat input data, yaitu:
                                                <ul>
                                                <?php foreach ($errors as $error) { ?>
                                                    <li><?php echo esc($error); ?></li>
                                                <?php } ?>
                                                </ul>
                                            <?php } ?>
                                 </ul>
                                <form action="<?= base_url().'user/profile/editPassword';?>" method="post">
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                                        <div class="col-sm-12">
                                          <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
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
      
                  

