<?php
echo view('admin/header');
echo view('admin/sidebar');
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger"><div class="inner">
                            <h3><?=$penyakit?></h3>
                            <p>Penyakit</p>
                        </div>
                        <div class="icon"> <i class="fas fa-virus"></i> </div>
                        <a href="<?=base_url().'admin/penyakit'?>" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a> </div>
                </div>
                <div class="col-lg-3 col-6" >
                    <div class="small-box bg-blue"><div class="inner">
                            <h3><?=$gejala?></h3>
                            <p>Gejala</p>
                        </div>
                        <div class="icon"> <i class="fas fa-stethoscope"></i> </div>
                        <a href="<?=base_url().'admin/gejala'?>" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a> </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-green"><div class="inner">
                            <h3><?=$rule?></h3>
                            <p>Rules</p>
                        </div>
                        <div class="icon"> <i class="fas fa-user-md"></i> </div>
                        <a href="<?=base_url().'admin/rules'?>" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a> </div>
                </div>
                <div class="col-lg-3 col-6">
                <div class="small-box bg-info"><div class="inner">
                        <h3><?=$history?></h3>
                        <p>Histori</p>
                    </div>
                    <div class="icon"> <i class="fas fa-history"></i> </div>
                    <a href="<?=base_url().'admin/histori'?>" class="small-box-footer">More
                        info <i class="fas fa-arrow-circle-right"></i></a> </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-purple"><div class="inner">
                            <h3><?=$user?></h3>
                            <p>Users</p>
                        </div>
                        <div class="icon"> <i class="fas fa-users"></i> </div>
                        <a href="<?=base_url().'admin/users'?>" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    echo view('admin/footer');
?>