<?php

namespace App\Controllers;
use App\Controllers\BaseController;



class landingPage extends BaseController{


    public function __construct()
    {
        
    }
    public function index(){
        echo view('landingPage/index');
    }
}