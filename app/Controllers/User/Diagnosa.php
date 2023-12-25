<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\GejalaModel;
use App\Libraries\Jwt;
use App\Models\User\AuthModel;

class Diagnosa extends BaseController{
    protected $gejalaModel;
    private $jwt;
    protected $authModel;
    protected $username;
    public function __construct()
    {
        $this->jwt = new Jwt();
        if (isset($_COOKIE['token'])) {
            if ($this->jwt->decodeUser($_COOKIE['token']) == false) {
                session()->setFlashdata('errors', 'Silahkan login terlebih dahulu.');
                header("Location:".base_url('/user/Auth/login'));
                exit();
            }
        } else {
            session()->setFlashdata('errors', 'Silahkan login terlebih dahulu.');
            header("Location: ".base_url('user/Auth/login'));
            exit();
        }
        $this->gejalaModel = new GejalaModel();
        $this->authModel = new AuthModel();
    }
    public function index(){
        $id=json_decode(base64_decode(explode('.', $_COOKIE['token'])[1]))->data->id;
        $this->username = $this->authModel->get_username_by_id($id);
        $namaPengguna = [
            'username' => $this->username
        ];
        $data['gejala'] = $this->gejalaModel->getGejala();
        $viewData = array_merge($data, $namaPengguna);
        echo view('user/diagnosa/diagnosaPasien', $viewData);
    }
    public function hitungCf()
    {
        if (isset($_POST[0])) {
            $cf_user = [];
            foreach ($_POST as $key => $value) {
                $pisahinDuluGaSih = explode("|", $value);
                $cf_user[$key] = $pisahinDuluGaSih;
            }

            $dbku = \Config\Database::connect();
            $query = $dbku->table('rule');
            $results = $query->get()->getResultArray(); // ambil semua data rule

            $dataArrayDenganCfPakarKaliCfUser = [];
            foreach ($results as $row) { //kalikan cf user pada id gejala yg sesuai sehingga terbentuk cf gejala
                //menghitung cf gejala sekalian di buat array baru dengan nama $dataArrayDenganCfPakarKaliCfUser
                for ($i = 0; $i < count($cf_user); $i++) {
                    if ($row['gejala_id'] == $cf_user[$i][0]) {
                        $dataArrayDenganCfPakarKaliCfUser[] = [$row['penyakit_id'], $row['gejala_id'], $row['cf_pakar'] * $cf_user[$i][1]];
                        break;
                    }
                }
                //dimensi 2 : 0 id penyakit , 1 id gejala , 2 cf user * cf pakar (cf gejala)
            }

            function memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser, $idPenyakit)
            {
                $Penyakit = [];
                for ($i = 0; $i < count($dataArrayDenganCfPakarKaliCfUser); $i++) {
                    //jika bagian id penyakit sama dengan $idPenyakit diinput maka kita jadikan satu
                    if ($dataArrayDenganCfPakarKaliCfUser[$i][0] == $idPenyakit) {
                        $Penyakit[] = [$idPenyakit, $dataArrayDenganCfPakarKaliCfUser[$i][1], $dataArrayDenganCfPakarKaliCfUser[$i][2]];
                    }
                }
                return $Penyakit;
                //dimensi 2 : 0 id penyakit , 1 id gejala , 2 cf user * cf pakar (cf gejala) tapi spesifik penyakit
            }

            function menghitungPresentaseMenggunakanRumusCFVer2($dataArrayPenyakitSpesifik)
            {
                //perhitungan awal tidak ikut looping
                $cfOld = $dataArrayPenyakitSpesifik[0][2] + $dataArrayPenyakitSpesifik[1][2] * (1 - $dataArrayPenyakitSpesifik[0][2]);
                for ($i = 2; $i < count($dataArrayPenyakitSpesifik); $i++) {
                    //sesuai rumus cf yak ges yak
                    $cfOld = $cfOld + $dataArrayPenyakitSpesifik[$i][2] * (1 - $cfOld);
                }
                //dimensi 2 : 0 id penyakit , 1 id gejala , 2 cf user * cf pakar (cf gejala) tapi spesifik penyakit
                $hasilAkhir['id_penyakit'] = $dataArrayPenyakitSpesifik[0][0];
                $hasilAkhir['gejala'][]=[];
                for ($i = 0; $i < count($dataArrayPenyakitSpesifik); $i++) {
                    if ($dataArrayPenyakitSpesifik[$i][2] != 0) {
                        $hasilAkhir['gejala'][] = $dataArrayPenyakitSpesifik[$i][1];
                    }
                }
                $hasilAkhir['presentase'] = $cfOld;
                return $hasilAkhir;
            }

            $bronkitisData = memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser, 1);
            $bronkitisAll = menghitungPresentaseMenggunakanRumusCFVer2($bronkitisData);
            echo $bronkitisAll['presentase'];
            var_dump($bronkitisAll['gejala']);
            echo $bronkitisAll['id_penyakit'];
            echo "<br>";

            $laringitisData = memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser, 2);
            $laringitisAll = menghitungPresentaseMenggunakanRumusCFVer2($laringitisData);
            echo $laringitisAll['presentase'];
            var_dump($laringitisAll['gejala']);
            echo $laringitisAll['id_penyakit'];
            echo "<br>";

            $tonsilitisData = memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser, 3);
            $tonsilitisAll = menghitungPresentaseMenggunakanRumusCFVer2($tonsilitisData);
            echo $tonsilitisAll['presentase'];
            var_dump($tonsilitisAll['gejala']);
            echo $tonsilitisAll['id_penyakit'];
            echo "<br>";

            $tuberkolosisData = memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser, 4);
            $tuberkolosisAll = menghitungPresentaseMenggunakanRumusCFVer2($tuberkolosisData);
            echo $tuberkolosisAll['presentase'];
            var_dump($tuberkolosisAll['gejala']);
            echo $tuberkolosisAll['id_penyakit'];
            echo "<br>";

            $pneumoniaData = memasukkanDataArrayCfPakarKaliCfUserKePenyakitSpesifik($dataArrayDenganCfPakarKaliCfUser, 5);
            $pneumoniaAll = menghitungPresentaseMenggunakanRumusCFVer2($pneumoniaData);
            echo $pneumoniaAll['presentase'];
            var_dump($pneumoniaAll['gejala']);
            echo $pneumoniaAll['id_penyakit'];
            echo "<br>";

            $presentaseTertinggi=max($bronkitisAll['presentase'],$laringitisAll['presentase'],$tonsilitisAll['presentase'],$tuberkolosisAll['presentase'],$pneumoniaAll['presentase']);
            function dapatkanKembaliDatanya($bronkitisAll,$laringitisAll,$tonsilitisAll,$tuberkolosisAll,$pneumoniaAll,$presentaseTertinggi){
                if($bronkitisAll['presentase']==$presentaseTertinggi){
                    return $bronkitisAll;
                }elseif($laringitisAll['presentase']==$presentaseTertinggi){
                    return $laringitisAll;
                }elseif($tonsilitisAll['presentase']==$presentaseTertinggi){
                    return $tonsilitisAll;
                }elseif($tuberkolosisAll['presentase']==$presentaseTertinggi){
                    return $tuberkolosisAll;
                }elseif($pneumoniaAll['presentase']==$presentaseTertinggi){
                    return $pneumoniaAll;
                }
            }
            $dataAkhir=dapatkanKembaliDatanya($bronkitisAll,$laringitisAll,$tonsilitisAll,$tuberkolosisAll,$pneumoniaAll,$presentaseTertinggi);

            $jadikanArray = array_map('intval',$dataAkhir['gejala']);
            $mengambilGejalaSesuaiIdGejala = $dbku->table('gejala')->whereIn('id',$jadikanArray )->select(['nama_gejala'])->get()->getResultArray();

            //mengubah ke format nama gejala, nama gejala, nama gejala
            $strings = array_map(function($item) {
                return $item['nama_gejala'];
            }, $mengambilGejalaSesuaiIdGejala);
            $gejalaYangSudahString = implode(", ", $strings);

            $id=json_decode(base64_decode(explode('.', $_COOKIE['token'])[1]))->data->id;
            $presentaseAkhir=$dataAkhir['presentase']*100;

            if (trim($gejalaYangSudahString)==""){
                header("Location:".base_url('/user/diagnosa/diagnosaPasien'));
                exit();
            }

            $data=array(
                "id_user"=>$id,
                "id_penyakit"=>$dataAkhir['id_penyakit'],
                "presentase" =>$presentaseAkhir."%",
                "gejala" =>$gejalaYangSudahString,
                "tanggal"=>date("Y-m-d")
            );
            $dbku->table('history')->insert($data);
            header("Location:".base_url('/user/riwayat'));
            exit();

        }
    }
}