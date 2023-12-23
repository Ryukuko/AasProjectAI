<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\DashboardModel;
use App\Libraries\Jwt;


class Dashboard extends BaseController{

    public function __construct()
    {
        
    }
    public function index(){
        echo view('user/dashboard');
    }
}