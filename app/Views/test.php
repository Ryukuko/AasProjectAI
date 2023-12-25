<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST[0])) {
    $cf_user = [];
    foreach ($_POST as $key => $value) {
        $pisahinDuluGaSih = explode("|", $value);
        $cf_user[$key] = $pisahinDuluGaSih;
    }
    // test print input user
    for ($i = 0; $i < count($cf_user); $i++) {
        echo "[" . $cf_user[$i][0] . "," . $cf_user[$i][1] . "]";
    }
    //dimensi 2 : 0 id gejala , 1 cf user
    echo "<br>";
    $dbku = \Config\Database::connect();
    $query = $dbku->table('rule');
    $results = $query->get()->getResultArray();
    echo "<br>";
    $dataArrayDenganCfPakarKaliCfUser = [];
    foreach ($results as $row) {
        //menghitung cf gejala sekalian di buat array baru dengan nama $dataArrayDenganCfPakarKaliCfUser
        for ($i = 0; $i < count($cf_user); $i++) {
            if ($row['gejala_id'] == $cf_user[$i][0]) {
                $dataArrayDenganCfPakarKaliCfUser[] = [$row['penyakit_id'], $row['gejala_id'], $row['cf_pakar'] * $cf_user[$i][1]];
                break;
            }
        }
        //dimensi 2 : 0 id penyakit , 1 id gejala , 2 cf user * cf pakar (cf gejala)
    }

    // test print array isian $dataArrayDenganCfPakarKaliCfUser
    for ($i = 0; $i < count($dataArrayDenganCfPakarKaliCfUser); $i++) {
        echo "[" . $dataArrayDenganCfPakarKaliCfUser[$i][0] . "," . $dataArrayDenganCfPakarKaliCfUser[$i][1] . "," . $dataArrayDenganCfPakarKaliCfUser[$i][2] . "]";
    }
    echo "<br>";

    function memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser, $idPenyakit)
    {
        $Penyakit = [];
        for ($i = 0; $i < count($dataArrayDenganCfPakarKaliCfUser); $i++) {
            //jika bagian id penyakit sama dengan $idPenyakit diinput maka kita jadikan satu
            if ($dataArrayDenganCfPakarKaliCfUser[$i][0] == $idPenyakit) {
                $Penyakit[] = [$idPenyakit,$dataArrayDenganCfPakarKaliCfUser[$i][1],$dataArrayDenganCfPakarKaliCfUser[$i][2]];
            }
        }
        return $Penyakit;
        //dimensi 2 : 0 id penyakit , 1 id gejala , 2 cf user * cf pakar (cf gejala) tapi spesifik penyakit
    }

    /*
        //hitung dengan rumus cf versi beta alias belum dinamis :v ( ini hanya sebagai record logika )
        $cfOld=$bronkitisData[0][2]+$bronkitisData[1][2]*(1-$bronkitisData[0][2]);
        for ($i = 2; $i < count($bronkitisData); $i++) {
            $cfOld=$cfOld+$bronkitisData[$i][2]*(1-$cfOld);
        }
        echo $cfOld;
    */

    function menghitungPresentaseMenggunakanRumusCF($dataArrayPenyakitSpesifik){
        //perhitungan awal tidak ikut looping
        $cfOld=$dataArrayPenyakitSpesifik[0][2]+$dataArrayPenyakitSpesifik[1][2]*(1-$dataArrayPenyakitSpesifik[0][2]);
        for ($i = 2; $i < count($dataArrayPenyakitSpesifik); $i++) {
            //sesuai rumus cf yak ges yak
            $cfOld=$cfOld+$dataArrayPenyakitSpesifik[$i][2]*(1-$cfOld);
        }
        return $cfOld;
    }

    function menghitungPresentaseMenggunakanRumusCFVer2($dataArrayPenyakitSpesifik){ // versi array
        //perhitungan awal tidak ikut looping
        $cfOld=$dataArrayPenyakitSpesifik[0][2]+$dataArrayPenyakitSpesifik[1][2]*(1-$dataArrayPenyakitSpesifik[0][2]);
        for ($i = 2; $i < count($dataArrayPenyakitSpesifik); $i++) {
            //sesuai rumus cf yak ges yak
            $cfOld=$cfOld+$dataArrayPenyakitSpesifik[$i][2]*(1-$cfOld);
        }
        //dimensi 2 : 0 id penyakit , 1 id gejala , 2 cf user * cf pakar (cf gejala) tapi spesifik penyakit
        $hasilAkhir['id_penyakit']=$dataArrayPenyakitSpesifik[0][0];
        for ($i = 0; $i < count($dataArrayPenyakitSpesifik); $i++) {
            if($dataArrayPenyakitSpesifik[$i][2]!=0){
                $hasilAkhir['gejala'][]=$dataArrayPenyakitSpesifik[$i][1];
            }
        }
        $hasilAkhir['presentase']=$cfOld;

        return $hasilAkhir;
    }



    echo "<br>";
    $bronkitisData=memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser,1);
    $bronkitisAll=menghitungPresentaseMenggunakanRumusCFVer2($bronkitisData);
    echo $bronkitisAll['presentase'];
    var_dump($bronkitisAll['gejala']);
    echo $bronkitisAll['id_penyakit'];
    echo "<br>";

    $laringitisData=memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser,2);
    $laringitisPresentase=menghitungPresentaseMenggunakanRumusCF($laringitisData);
    echo $laringitisPresentase;
    echo "<br>";

    $tonsilitisData=memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser,3);
    $tonsilitisPresentase=menghitungPresentaseMenggunakanRumusCF($tonsilitisData);
    echo $tonsilitisPresentase;
    echo "<br>";

    $tuberkolosisData=memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser,4);
    $tuberkolosisPresentase=menghitungPresentaseMenggunakanRumusCF($tuberkolosisData);
    echo $tuberkolosisPresentase;
    echo "<br>";

    $pneumoniaData=memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser,5);
    $pneumoniaPresentase=menghitungPresentaseMenggunakanRumusCF($pneumoniaData);
    echo $pneumoniaPresentase;
    echo "<br>";

    function hitungKesimpulanPenyakitGejalaDanPresentase(){

    }




}
?>
<form action="" method="post">
    <?php foreach ($gejala as $key => $value) { ?>
        <label for="gejala"><?= $value['nama_gejala'] ?></label>
        <select id="gejala" name="<?= $key ?>" value="">
            <!--                <option>Pilih yang kamu rasakan</option>-->
            <option value="<?= $value['id'] ?>|0">Sangat Tidak Yakin</option>
            <option value="<?= $value['id'] ?>|1">Sangat Yakin</option>
            <option value="<?= $value['id'] ?>|0.8">Yakin</option>
            <option value="<?= $value['id'] ?>|0.6">Ragu-ragu</option>
            <option value="<?= $value['id'] ?>|0.4">Tidak Yakin</option>

        </select>
        <br>
    <?php } ?>
    <input type="submit">
</form>
</body>
</html>