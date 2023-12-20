<?php echo view('admin/header'); ?>
<?php echo view('admin/sidebar'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                                Daftar Users
                                <a href="<?=base_url().'admin/users/create'?>" class="btn btn-primary float-right">Tambah</a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabel" class="table table-bordered table-hovered">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($users as $key => $value){ ?>
                                                <tr>
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td><?php echo $value['username']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?php echo base_url('admin/users/edit/'.$value['id']);
                                                            ?>" class="btn btn-sm btn-success">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="<?php echo base_url('admin/users/delete/'.$value['id']);
                                                            ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data user ini?');">
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