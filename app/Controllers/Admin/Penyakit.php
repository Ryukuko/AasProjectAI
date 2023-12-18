<?php

namespace App\Controllers\Admin;
//use namespace model
use App\Controllers\BaseController;

class Penyakit extends BaseController
{
    public function __construct()
    {
        //cek login
        //load model
    }
    public function index()
    {
        echo view('admin/penyakit/index');
    }
    public function create()
    {
        echo view('admin/penyakit/create');
    }
}