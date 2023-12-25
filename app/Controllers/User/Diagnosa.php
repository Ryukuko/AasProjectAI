<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\DiagnosaModel;
use App\Models\User\GejalaModel;
use App\Models\User\RuleModel;
use App\Libraries\Jwt;


class Diagnosa extends BaseController{

    protected $diagnosaModel;
    protected $gejalaModel;
    protected $ruleModel;
    protected $historyModel;
    private $jwt;
    public function __construct()
    {
        $this->jwt = new Jwt();
        // var_dump($_COOKIE['token']);
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
        $this->diagnosaModel = new DiagnosaModel();
        $this->gejalaModel = new GejalaModel();
        $this->ruleModel = new RuleModel();
    }
    public function index(){
        $data['gejala'] = $this->gejalaModel->getGejala();
        echo view('user/diagnosa/diagnosaPasien', $data);
    }
    public function hitungCf(){
        $gejala = $this->gejalaModel->getGejala();
        $gejalaTerpilih = $this->request->getPost('gejala');

        if(!is_array($gejalaTerpilih)){
            $gejalaTerpilih = [];
        }
        
        $nilaiCFUser = []; // Membuat array kosong untuk menyimpan nilai CF dari setiap gejala terpilih
        foreach ($gejala as $g) {
            if (in_array($g['id'], $gejalaTerpilih)) {
                $nilaiCFUser[$g['id']] = $this->request->getPost($g['id']);
                // Jika gejala terpilih, ambil nilai CF dari form dan simpan dalam array dengan key berupa id gejala
            }
        }

        // Ambil nilai CF pakar dari tabel rule
        $nilaiCFPakar = $this->ruleModel->getCFPakar($gejalaTerpilih);
        // print_r($nilaiCFPakar);
        $cfSetiapPenyakit = []; // Array untuk menyimpan nilai CF setiap penyakit
        $semuaPenyakit = $this->ruleModel->getAllPenyakit($gejalaTerpilih); // Ubah menjadi metode yang sesuai
        // print_r($semuaPenyakit);
        foreach ($semuaPenyakit as $penyakit) {
            $idPenyakit = $penyakit['penyakit_id'];
            foreach ($gejala as $g) {
                $idGejala = $g['id'];
                if (isset($nilaiCFUser[$idGejala]) && isset($nilaiCFPakar[$idGejala])) {
                    $cfPakarGejala = $nilaiCFPakar[$idGejala]; // Ambil nilai CF pakar untuk gejala tertentu
                    
                    if (!isset($cfSetiapPenyakit[$idPenyakit])) {
                        $cfSetiapPenyakit[$idPenyakit] = [];
                    }
                    if(isset($cfSetiapPenyakit[$idPenyakit])  && isset($cfSetiapPenyakit[$idPenyakit][$idGejala])){
                        $cfSetiapPenyakit[$idPenyakit][$idGejala] = $nilaiCFUser[$idGejala] * $cfPakarGejala[$idGejala];
                    }
                }
                // Tambahkan nilai CF untuk gejala pada setiap penyakit
                // var_dump($nilaiCFUser[$idGejala]);
                // var_dump($cfPakarGejala);
            }
        }
        return $cfSetiapPenyakit;

    }
}