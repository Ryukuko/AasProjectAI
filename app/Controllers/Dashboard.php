<?php

namespace App\Controllers;
//use namespace model
class Dashboard extends BaseController
{
    public function __construct()
    {
        //cek login
        //load model
    }
    public function index()
    {
        echo view('header');
        echo view('sidebar');
        echo view('dashboard');
        echo view('dashboard');
        echo view('footer');
    }
}