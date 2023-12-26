<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DashboardModel;
use App\Libraries\Jwt;


class Dashboard extends BaseController
{
    private $dashobardModel;
    private $jwt;

    public function __construct()
    {
        $this->jwt = new Jwt();
//        var_dump($_COOKIE['token']);
        if (isset($_COOKIE['token'])) {
            if ($this->jwt->decodeAdmin($_COOKIE['token']) == false) {
                session()->setFlashdata('errors', 'Silahkan login terlebih dahulu.');
                header("Location:".base_url('/admin/login'));
                exit();
            }
        } else {
            session()->setFlashdata('errors', 'Silahkan login terlebih dahulu.');
            header("Location: ".base_url('/admin/login'));
            exit();
        }
        $this->dashobardModel = new DashboardModel();

    }
    public function index()
    {
        $data['gejala']= $this->dashobardModel->getCount("gejala");
        $data['penyakit']= $this->dashobardModel->getCount("penyakit");
        $data['history']=$this->dashobardModel->getCount("history");
        $data['user']=$this->dashobardModel->getCount("user");
        $data['rule']=$this->dashobardModel->getCount("rule");
        echo view('admin/dashboard',$data);
    }
}