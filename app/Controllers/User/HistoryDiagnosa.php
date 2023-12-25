<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\historyModel;
use App\Libraries\Jwt;
use App\Models\User\AuthModel;


class HistoryDiagnosa extends BaseController{

    protected $historyModel;
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
        $this->historyModel = new historyModel();
        $this->authModel = new AuthModel();
    }
    public function username(){
        $token = $_COOKIE['token'];
        $id = json_decode(base64_decode(explode('.', $token)[1]))->data->id;
        $this->username = $this->authModel->get_username_by_id($id);

    }
    public function index(){
        $id=json_decode(base64_decode(explode('.', $_COOKIE['token'])[1]))->data->id;
        $data['gejala'] = $this->historyModel->getHistory($id);
        $this->username = $this->authModel->get_username_by_id($id);
        $namaPengguna = [
            'username' => $this->username
        ];
        // var_dump($this->username);
        $viewData = array_merge($data, $namaPengguna);
        echo view('user/Riwayat/index', $viewData);
    }

}