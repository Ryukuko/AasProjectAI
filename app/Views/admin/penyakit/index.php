<?php echo view('admin/header'); ?>
<?php echo view('admin/sidebar'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Penyakit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Penyakit</li>
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
                                Daftar Penyakit
                                <a href="#" class="btn btn-primary float-right">Tambah</a>
                            </div>

                            <div class="card-body">
<!--                                --><?php
//                                if(!empty(session()->getFlashdata('success'))){ ?>
<!--                                    <div class="alert alert-success">-->
<!--                                        --><?php //echo session()->getFlashdata('success');?>
<!--                                    </div>-->
<!--                                --><?php //} ?>
<!---->
<!--                                --><?php //if(!empty(session()->getFlashdata('info'))){ ?>
<!--                                    <div class="alert alert-info">-->
<!--                                        --><?php //echo session()->getFlashdata('info');?>
<!--                                    </div>-->
<!--                                --><?php //} ?>
<!--                                --><?php //if(!empty(session()->getFlashdata('warning'))){ ?>
<!--                                    <div class="alert alert-warning">-->
<!--                                        --><?php //echo session()->getFlashdata('warning');?>
<!--                                    </div>-->
<!--                                --><?php //} ?>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hovered">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Penyakit</th>
                                            <th>Nama Penyakit</th>
                                            <th>Solusi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
<!--                                        --><?php //foreach($penyakit as $key => $row){ ?>
<!--                                            <tr>-->
<!--                                                <td>--><?php //echo $key + 1; ?><!--</td>-->
<!--                                                <td>--><?php //echo $row['nama']; ?><!--</td>-->
<!--                                                <td>--><?php //echo $row['solusi']; ?><!--</td>-->
<!--                                                <td>-->
<!--                                                    <div class="btn-group">-->
<!--                                                        <a href="--><?php //echo base_url('penyakit/edit/'.$row['id']);
//                                                        ?><!--" class="btn btn-sm btn-success">-->
<!--                                                            <i class="fa fa-edit"></i>-->
<!--                                                        </a>-->
<!--                                                        <a href="--><?php //echo base_url('penyakit/delete/'.$row['id']);
//                                                        ?><!--" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data Fakultas ini?');">-->
<!--                                                            <i class="fa fa-trash-alt"></i>-->
<!--                                                        </a>-->
<!--                                                    </div>-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                        --><?php //} ?>
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
<?php echo view('admin/footer'); ?>