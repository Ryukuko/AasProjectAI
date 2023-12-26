<?php echo view('user/header');?>
<?php echo view('user/sidebar');?>
    <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Data Histori</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Histori</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Daftar Histori
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tabel" class="table table-bordered table-hovered">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gejala</th>
                                                <th>Nama Penyakit</th>
                                                <th>Presentase</th>
                                                <th>Solusi</th>
                                                <th>Tanggal</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($gejala as $key => $value){ ?>
                                                <tr>
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td><?php echo $value->gejala; ?></td>
                                                    <td><?php echo $value->nama_penyakit; ?></td>
                                                    <td><?php echo $value->presentase; ?></td>
                                                    <td><?php echo $value->solusi; ?></td>
                                                    <td><?php echo $value->tanggal; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php echo view('user/footer');?>