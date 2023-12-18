<?php

namespace App\Controllers;
//use namespace model
class Users extends BaseController
{
    public function __construct()
    {
        //cek login
        //load model
    }
    public function index()
    {
        echo view('users/index');
    }
}