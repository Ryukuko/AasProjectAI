<?php


namespace App\Controllers\Admin;
//use namespace model
use App\Controllers\BaseController;

class Rules extends BaseController
{
    public function __construct()
    {
        //cek login
        //load model
    }

    public function index()
    {
        echo view('admin/rules/index');
    }
    public function create()
    {
        echo view('admin/rules/create');
    }
}