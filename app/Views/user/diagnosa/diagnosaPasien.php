
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diagnosa Pasien</title>
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
<body >
  <div class="wrapper">
  <?php echo view('user/sidebar')?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Diagnosa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url().'user/dashboard';?>">Home</a></li>
              <li class="breadcrumb-item active">Diagnosa Pasien</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
                <h3 class="card-title"><i class="fa-solid fa-book-medical"></i> Gejala yang dirasakan Pasien</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <form action="" method="POST">
                     <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Gejala</th>
                            <th>Tingkat Kepastian</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($gejala as $g) :?>
                          <tr>
                            <td><?= $g['id'];?></td>
                            <td><?= $g['nama_gejala'];?></td>
                            <td>
                              <select class="form-select" name="<?= $g['id'];?>">
                                <option value="0">Sangat Tidak Yakin</option>
                                <option value="0.4">Tidak Yakin</option>
                                <option value="0.6">Ragu Ragu</option>
                                <option value="0.8">Yakin</option>
                                <option value="1">Sangat Yakin</option>
                              </select>
                          </td>
                          <td><input type="checkbox" name="gejala[]" value="<?= $g['id'];?>"></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <td><button type="submit">Add</button></td>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card-footer">
                <a href="<?=base_url().'user/dashboard'?>" class="btn btn-primary" >Kembali</a>
            </div>

            <!-- /.card -->
          </div>
            
          <!-- /.col-md-6 -->
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php echo view('user/footer');?>
  
</div>
</body>
</html>

