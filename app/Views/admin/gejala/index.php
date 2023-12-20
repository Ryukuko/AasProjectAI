<?php echo view('admin/header'); ?>
<?php echo view('admin/sidebar'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Gejala</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gejala</li>
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
                                Daftar Gejala
                                <a href="<?=base_url().'admin/gejala/create'?>" class="btn btn-primary float-right">Tambah</a>
                            </div>
                            <?php
                            $errors = session()->getFlashdata('errors');
                            if(!empty($errors)){ ?>
                                <div class="alert alert-danger" role="alert" style="margin:10px">
                                    Walaw E! There was an error in the data delete :
                                    <ul>
                                        <li>
                                            <?=$errors['id']?>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabel" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Gejala</th>
                                            <th>Gejala</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <?php foreach($gejala as $key => $value){ ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value['kode_gejala'] ?></td>
                                                <td><?= $value['nama_gejala'] ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('admin/gejala/edit/'.$value['id']);
                                                        ?>" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?= base_url('admin/gejala/delete/'.$value['id']);
                                                        ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data gejala ini?');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
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

<?php echo view('admin/footer'); ?>