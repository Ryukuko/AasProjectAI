<?php echo view('admin/header'); ?>
<?php echo view('admin/sidebar'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Rule</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Rule</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('admin/rules/add'); ?>"
                          method="post">
                        <div class="card">
                            <div class="card-body">
<!--                                --><?php
//                                $inputs = session()->getFlashdata('inputs');
//                                $errors = session()->getFlashdata('errors');
//                                if(!empty($errors)){ ?>
<!--                                    <div class="alert alert-danger" role="alert">-->
<!--                                        Whoops! Ada kesalahan saat input data, yaitu:-->
<!---->
<!--                                        <ul>-->
<!--                                            --><?php //foreach ($errors as $error) : ?>
<!--                                                <li>--><?php //= esc($error) ?><!--</li>-->
<!--                                            --><?php //endforeach ?>
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                --><?php //} ?>
                                <div class="form-group">
                                    <label for="">Kode Gejala</label>
                                    <select  style="padding-right: 20px;" name="gejala_id" id="" class="form-control">
                                        <option value="">Pilih kode gejala</option>
                                        <option value="KD005">KD005</option>
                                        <option value="KD006">KD006</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" >Kode Penyakit</label>
                                    <select   name="penyakit_id" id="" class="form-control">
                                        <option value="">Pilih kode penyakit</option>
                                        <option value="KD005">KD005</option>
                                        <option value="KD006">KD006</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nilai CF Pakar</label><input type="text" class="form-control" name="cf_pakar" placeholder="Enter Nilai CF Pakar" >
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('admin/rules'); ?>" class="btn btn-outline-info">Back</a>
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


