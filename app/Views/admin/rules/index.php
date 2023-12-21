<?php echo view('admin/header'); ?>
<?php echo view('admin/sidebar'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Rules</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Rules</li>
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
                                Daftar Rules
                                <a href="<?=base_url().'admin/rules/create'?>" class="btn btn-primary float-right">Tambah</a>
                            </div>

                            <div class="card-body">
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
                                <div class="table-responsive" >
                                    <table class="table table-bordered table-hovered" id="tabel">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Penyakit</th>
                                            <th>Nama Penyakit</th>
                                            <th>Kode Gejala</th>
                                            <th>Nama Gejala</th>
                                            <th>CF Pakar</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($rules as $key => $value){ ?>
                                                <tr>
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td><?php echo $value->kode_penyakit ?></td>
                                                    <td><?php echo $value->nama_penyakit ?></td>
                                                    <td><?php echo $value->kode_gejala ?></td>
                                                    <td><?php echo $value->nama_gejala ?></td>
                                                    <td><?php echo $value->cf_pakar ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?php echo base_url('admin/rules/edit/'.$value->id);
                                                            ?>" class="btn btn-sm btn-success">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="<?php echo base_url('admin/rules/delete/'.$value->id);
                                                            ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data rule ini?');">
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