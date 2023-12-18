<?php

namespace App\Controllers\Admin;
//use namespace model
use App\Controllers\BaseController;

class Gejala extends BaseController
{
    public function __construct()
    {
        //cek login
        //load model
    }
    public function index()
    {
        echo view('admin/gejala/index');
    }
    public function create()
    {
        echo view('admin/gejala/create');
    }
}