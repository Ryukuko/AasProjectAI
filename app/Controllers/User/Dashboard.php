<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\DashboardModel;
use App\Models\User\AuthModel;
use App\Libraries\Jwt;


class Dashboard extends BaseController{

    // protected $dashboardModel;
    private $jwt;
    private $authModel;
    protected $data;
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
        $this->authModel = new AuthModel();

    }
    
    public function username(){
        $token = $_COOKIE['token'];
        $id = json_decode(base64_decode(explode('.', $token)[1]))->data->id;
        $this->data = $this->authModel->get_username_by_id($id);

    }

    public function index(){
        $this->username();
        $data = [
            'username' => $this->data,
        ];
        // var_dump($data);
        echo view('user/dashboard', $data);
        
    }
}