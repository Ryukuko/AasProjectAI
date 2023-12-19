<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DashboardModel;


class Dashboard extends BaseController
{
    private $dashobardModel;

    public function __construct()
    {
        //cek login
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