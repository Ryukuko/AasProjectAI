<?php echo view('user/header');?>
<?php echo view('user/sidebar');?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="con]tent">
            <div class="container-fluid">
                <div style="display: flex">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger" ><div class="inner" style="height: 100px">
                                <h5>Diagnosa</h5>
                            </div>
                            <div class="icon"> <i class="fas fa-user-md"></i> </div>
                            <a href="<?=base_url().'user/diagnosa/diagnosaPasien'?>" class="small-box-footer">More
                                info <i class="fas fa-arrow-circle-right"></i></a> </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info"><div class="inner" style="height: 100px">
                                <h5>Riwayat</h5>
                            </div>
                            <div class="icon"> <i class="fas fa-history"></i> </div>
                            <a href="<?=base_url().'user/riwayat'?>" class="small-box-footer">More
                                info <i class="fas fa-arrow-circle-right"></i></a> </div>
                    </div>
                </div>
                <section class="content">

                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-weight: bold" class="card-title">Alat Pernafasan Manusia</h3>
                        </div>
                        <div class="card-body text-center">
                            <img src="<?php echo base_url('asset/dist');?>/img/saluran pernafasan.png" alt="Saluran Pernafasan Manusia" class="img-fluid" style="margin-bottom: 50px; height: 330px; width: 450px;">
                            <div style="text-align: left; padding-left:10px;margin-left:10px;" >
                                <ul>
                                    <li>
                                        <strong>Hidung:</strong>
                                        <ul>
                                            <li>Berfungsi sebagai pintu masuk udara ke dalam sistem pernafasan.</li>
                                            <li>Bulu-bulu halus di dalam hidung berperan menyaring partikel-partikel debu dan kotoran dari udara yang masuk.</li>
                                        </ul>
                                    </li>

                                    <li>
                                        <strong>Faring:</strong>
                                        <ul>
                                            <li>Bagian tenggorokan yang menghubungkan hidung dan mulut dengan laring.</li>
                                        </ul>
                                    </li>

                                    <li>
                                        <strong>Laring:</strong>
                                        <ul>
                                            <li>Berisi pita suara dan berfungsi sebagai pengatur aliran udara dan suara.</li>
                                        </ul>
                                    </li>

                                    <li>
                                        <strong>Trakea:</strong>
                                        <ul>
                                            <li>Saluran udara yang mengarah dari laring ke paru-paru.</li>
                                            <li>Dilapisi oleh silia yang bergerak untuk membersihkan lendir dan partikel dari saluran udara.</li>
                                        </ul>
                                    </li>

                                    <li>
                                        <strong>Bronkus dan Bronkiolus:</strong>
                                        <ul>
                                            <li>Trakea bercabang menjadi dua bronkus yang masuk ke dalam paru-paru.</li>
                                            <li>Bronkus kemudian bercabang menjadi bronkiolus yang semakin kecil.</li>
                                        </ul>
                                    </li>

                                    <li>
                                        <strong>Alveolus:</strong>
                                        <ul>
                                            <li>Kantong udara mikroskopis di ujung bronkiolus yang berfungsi sebagai tempat pertukaran gas (oksigen dan karbon dioksida) dengan pembuluh darah kapiler.</li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?=base_url().'user/diagnosa/diagnosaPasien'?>" class="btn btn-primary float-right" >Mulai Diagnosa</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?=view('user/footer'); ?>