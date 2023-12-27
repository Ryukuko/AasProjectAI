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
                                    <select name="penyakit_id" id="" class="form-control">
                                        <option value="">Pilih kode penyakit</option>
                                        <?php
                                        foreach($penyakit as $key => $value){
                                        ?>
                                        <option value="<?=$value->id?>"><?=$value->kode_penyakit?> - <?=$value->nama_penyakit?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group" id="tambahan">
                                    <div style="display: flex" >
                                        <div style="display: flex;margin-bottom: 10px" id="clone" class="clone">
                                            <div style="margin-right: 20px" >
                                                <label for="">Kode Gejala</label>
                                                <select  style="padding-right: 20px;" name="gejala_id[0]" id="" class="form-control">
                                                    <option value="">Pilih kode gejala</option>
                                                    <?php
                                                    foreach($gejala as $key => $value){
                                                        ?>
                                                        <option value="<?=$value->id?>"><?=$value->kode_gejala?> - <?=$value->nama_gejala?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="">Nilai CF Pakar</label>
                                                <input type="text" class="form-control" name="cf_pakar[0]" placeholder="Enter Nilai CF Pakar" >
                                            </div>
                                        </div>
                                        <div style="display: flex">
                                            <div style="margin-left: 20px; margin-top: 35px">
                                                <button id="hapuskan" class="btn-sm btn-danger"> <i class="fa fa-minus"></i> </button>
                                            </div>
                                            <div style="margin-left: 5px; margin-top: 35px">
                                                <button id="tambahkan" class="btn-sm btn-success"> <i class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
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
<script>
    $(document).ready(function () {
        var id = 0;
        $("#tambahkan").click(function (e) {
            e.preventDefault();
            id++;
            var cloneElement = $("#clone").clone();
            cloneElement.find('label').remove();
            cloneElement.removeAttr("value");
            cloneElement.find('[name="gejala_id[0]"]').attr('name', `gejala_id[${id}]`).val('');
            cloneElement.find('[name="cf_pakar[0]"]').attr('name', `cf_pakar[${id}]`).val('');
            $("#tambahan").append(cloneElement);
        });
        $("#hapuskan").click(function (e) {
            e.preventDefault();
            if ($(".clone").length > 1) {
                id--;
                $(".clone:last").remove();
            }
        });
    });
</script>
<?php echo view('admin/footer'); ?>


