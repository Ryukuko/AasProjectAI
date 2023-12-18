<?php

namespace App\Controllers\Admin;
//use namespace model
use App\Controllers\BaseController;

class Histori extends BaseController
{
    public function __construct()
    {
        //cek login
        //load model
    }
    public function index()
    {
        echo view('admin/histori/index');
    }
}