<?php echo view('admin/header'); ?>
<?php echo view('admin/sidebar'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Gejala</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Gejala</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?=base_url().'admin/gejala/update'?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $inputs = session()->getFlashdata('inputs');
                                $errors = session()->getFlashdata('errors');
                                if(!empty($errors)){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        Walaw E! There was an error in the data input :
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="">Kode Gejala</label>
                                    <input name="id" type="hidden" value="<?=$gejala['id']?>">
                                    <input value="<?=$gejala['kode_gejala']?>" type="text" class="form-control" name="kode_gejala" placeholder="Enter kode gejala" >
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Gejala</label>
                                    <input  value="<?=$gejala['nama_gejala']?>" type="text" class="form-control" name="nama_gejala" placeholder="Enter nama gejala" >
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?=base_url().'admin/gejala'?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('admin/footer'); ?>

