<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\HistoriModel;

class Histori extends BaseController
{
    private $historiModel;
    private $validation;
    public function __construct()
    {
        //cek login
        $this->historiModel = new HistoriModel();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data['histori'] = $this->historiModel->get();
        echo view('admin/histori/index',$data);
    }
    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $historiValidation = [
            'id' => ['label' => 'ID','rules'=>'trim|required|is_not_unique[history.id]']
        ];
        $this->validation->setRules($historiValidation);
        if (!$this->validation->run($data)) {
            return redirect()->to(base_url('admin/histori'));
        } else {
            $this->historiModel->deleteData($data['id']);
            return redirect()->to(base_url('admin/histori'));
        }
    }
}