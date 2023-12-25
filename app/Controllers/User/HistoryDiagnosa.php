<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\historyModel;
use App\Libraries\Jwt;


class HistoryDiagnosa extends BaseController{

    protected $historyModel;
    private $jwt;
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
        $this->historyModel = new historyModel();
    }
    public function index(){
        $id=json_decode(base64_decode(explode('.', $_COOKIE['token'])[1]))->data->id;
        $data['gejala'] = $this->historyModel->getHistory($id);
        echo view('user/Riwayat/index', $data);
    }

}