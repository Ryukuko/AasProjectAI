<?php

namespace App\Controllers\Admin;
//use namespace model
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        //cek login
        //load model
    }
    public function index()
    {
        echo view('admin/dashboard');
    }
}