<?php

namespace App\Controllers\Admin;
//use namespace model
use App\Controllers\BaseController;

class Users extends BaseController
{
    public function __construct()
    {
        //cek login
        //load model
    }
    public function index()
    {
        echo view('admin/users/index');
    }
    public function create(){
        echo view('admin/users/create');
    }
}