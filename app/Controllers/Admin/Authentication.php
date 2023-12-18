<?php


namespace App\Controllers\Admin;
//use namespace model
use App\Controllers\BaseController;

class Authentication extends BaseController
{
    public function __construct()
    {
        //cek login
        //load model
    }

    public function login()
    {
        echo view('admin/authentication/login');
    }
}