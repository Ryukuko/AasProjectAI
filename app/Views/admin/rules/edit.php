<?php echo view('admin/header'); ?>
<?php echo view('admin/sidebar'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Rule</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Rule</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('admin/rules/update'); ?>"
                          method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
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
                                    <label for="" >Kode Penyakit</label>
                                    <select name="penyakit_id" id="" class="form-control" value="<?=$rules['penyakit_id']?>">
                                        <option value="">Pilih kode penyakit</option>
                                        <?php
                                        foreach($penyakit as $key => $value){
                                            ?>
                                            <option <?=($value->id==$rules['penyakit_id'])?'selected':''?> value="<?=$value->id?>"><?=$value->kode_penyakit?> - <?=$value->nama_penyakit?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kode Gejala</label>
                                    <input type="hidden" name="id" value="<?=$rules['id']?>">
                                    <select  style="padding-right: 20px;" name="gejala_id" id="" class="form-control">
                                        <option value="">Pilih kode gejala</option>
                                        <?php
                                        foreach($gejala as $key => $value){
                                            ?>
                                            <option <?=($value->id==$rules['gejala_id'])?'selected':''?> value="<?=$value->id?>"><?=$value->kode_gejala?> - <?=$value->nama_gejala?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Nilai CF Pakar</label><input type="text" class="form-control" name="cf_pakar" value="<?=$rules['cf_pakar']?>" placeholder="Enter Nilai CF Pakar" >
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


