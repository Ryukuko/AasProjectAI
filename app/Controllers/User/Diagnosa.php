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
    public function __construct()
    {
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
    
        $nilaiCFUser = []; // Membuat array kosong untuk menyimpan nilai CF dari setiap gejala terpilih
        foreach ($gejala as $g) {
            if (in_array($g['id'], $gejalaTerpilih)) {
                $nilaiCFUser[$g['id']] = $this->request->getPost($g['id']);
                // Jika gejala terpilih, ambil nilai CF dari form dan simpan dalam array dengan key berupa id gejala
            }
        }

        // Ambil nilai CF pakar dari tabel rule
        $nilaiCFPakar = $this->ruleModel->getCFPakar($gejalaTerpilih);
        $cfSetiapPenyakit = []; // Array untuk menyimpan nilai CF setiap penyakit
        $semuaPenyakit = $this->ruleModel->getAllPenyakit(); // Ubah menjadi metode yang sesuai
        foreach ($semuaPenyakit as $penyakit) {
            $idPenyakit = $penyakit['id_penyakit'];
            foreach ($gejala as $g) {
                $idGejala = $g['id'];
                $cfPakarGejala = $nilaiCFPakar[$idGejala]; // Ambil nilai CF pakar untuk gejala tertentu
                // Tambahkan nilai CF untuk gejala pada setiap penyakit
                if (!isset($cfSetiapPenyakit[$idPenyakit])) {
                    $cfSetiapPenyakit[$idPenyakit] = [];
                }
                $cfSetiapPenyakit[$idPenyakit][$idGejala] = $nilaiCFUser[$idGejala] * $cfPakarGejala;
            }
        }
        return $cfSetiapPenyakit;
    }
}