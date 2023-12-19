<?php echo view('admin/header'); ?>
<?php echo view('admin/sidebar'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Penyakit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Penyakit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?=base_url().'admin/penyakit/update'?>" method="post">
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
                                    <label for="">Kode Penyakit</label>
                                    <input type="hidden" name="id" value="<?=$penyakit['id'];?>">
                                    <input type="text" class="form-control" name="kode_penyakit" value="<?=$penyakit['kode_penyakit'];?>" placeholder="Enter kode penyakit" >
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Penyakit</label>
                                    <input type="text" class="form-control" name="nama_penyakit" value="<?=$penyakit['nama_penyakit'];?>"  placeholder="Enter nama penyakit" >
                                </div>
                                <div class="form-group">
                                    <label for="">Solusi</label>
                                    <textarea rows="5" class="form-control" name="solusi" placeholder="Enter solusi"><?=$penyakit['solusi'];?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?=base_url().'admin/penyakit'?>" class="btn btn-outline-info">Back</a>
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


