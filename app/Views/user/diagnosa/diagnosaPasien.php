<?php echo view('user/header');?>
<?php echo view('user/sidebar');?>
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
                
                <h3 class="card-title"><i class="fa fa-sticky-note-o"></i> Pilih Gejala Yang Dirasakan</h3>

              </div>
              <!-- /.card-header -->

                <form action="<?= base_url().'user/diagnosa/hitungCf';?>" method="POST">
                    <div class="card-body table-responsive p-0">
                         <table class="table table-hover text-nowrap">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Gejala</th>
                                <th>Tingkat Kepastian</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($gejala as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?=$key+1?>
                                    </td>
                                    <td>
                                        <?= $value['nama_gejala'] ?>
                                    </td>
                                    <td>
                                        <select id="gejala" name="<?= $key ?>" value="">
                                            <option value="<?= $value['id'] ?>|0">Sangat Tidak Yakin</option>
                                            <option value="<?= $value['id'] ?>|0.4">Tidak Yakin</option>
                                            <option value="<?= $value['id'] ?>|0.6">Ragu-ragu</option>
                                            <option value="<?= $value['id'] ?>|0.8">Yakin</option>
                                            <option value="<?= $value['id'] ?>|1">Sangat Yakin</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                    <div class="card-footer" style="overflow: hidden;">
                        <input type="submit" class="btn btn-primary" style="float: right; width: 100%;">
                    </div>
            </form>

              <!-- /.card-body -->
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

