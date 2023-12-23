<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  <?php 
    echo view('user/sidebar');
    ?>
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
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3></h3>
                  <p>Mulai Diagnosa</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-stethoscope"></i>
                </div>
                <a href="<?=base_url().'user/diagnosa/diagnosaPasien'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3></h3>
                  <p>Riwayat Diagnosa</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-laptop-medical"></i>
                </div>
                <a href="<?=base_url().'user/riwayat'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>
        </div>
        <section class="content">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Saluran Pernafasan Manusia</h3>
                </div>
                <div class="card-body text-center">
                  <img src="<?php echo base_url('asset/dist');?>/img/saluran pernafasan.png" alt="Saluran Pernafasan Manusia" class="img-fluid" style="height: 400px; width: 450px;">
                  <div style="text-align: left; margin-top: 10px; padding-left:10px;margin-left:10px;" >
                    <p><h4>Organ Saluran Pernafasan pada Manusia terdiri dari :</h4></p>                   
                    <p><h5><b>1. Hidung</b></h5></p>  
                    <p><h6>...................</h6></p>  
                    <p><h5><b>2. Faring (Tenggorokan)</b></h5></p>  
                    <p><h6>...................</h6></p>  
                  </div>
                </div>
                <div class="card-footer">
                  <a href="<?=base_url().'user/diagnosa'?>" class="btn btn-primary float-right" >Mulai Diagnosa!!</a>
                </div>
            </div>
        </section>
      </div>
    </div>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <?php echo view('user/footer')?>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</div>
</body>
</html>