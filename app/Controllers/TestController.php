<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\TestModel;
class TestController extends BaseController
{
    private $testModel;

    public function __construct()
    {
        $this->testModel = new TestModel();
    }
    public function index()
    {
        $data['gejala'] =  $this->testModel->getGejalaId();
        echo view('test',$data);
    }
}