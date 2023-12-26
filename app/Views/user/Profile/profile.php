<?php echo view('user/header');?>
<?php echo view('user/sidebar');?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url().'user/dashboard';?>">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center" style="padding: 100px;">
                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('asset/dist');?>/img/1261848 (2).jpg" alt="User profile picture">
                                </div>
                                <br>
                                <br>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Username</b> <p class="float-right"><?php echo $username;?></p>
                                    </li>
                                </ul>
                                <a href="<?= base_url().'user/profile/edit';?>" class="btn btn-primary btn-block" style="font-weight: 100"><b>Change Password</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php echo view('user/footer');?>