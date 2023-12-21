<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\HistoriModel;
use App\Libraries\Jwt;

class Histori extends BaseController
{
    private $historiModel;
    private $validation;
    private $jwt;
    public function __construct()
    {
        $this->jwt = new Jwt();
        if (isset($_COOKIE['token'])) {
            if ($this->jwt->decodeAdmin($_COOKIE['token']) == false) {
                session()->setFlashdata('errors', 'Silahkan login terlebih dahulu.');
                header("Location:".base_url('/admin/login'));
                exit();
            }
        } else {
            session()->setFlashdata('errors', 'Silahkan login terlebih dahulu.');
            header("Location: ".base_url('/admin/login'));
            exit();
        }
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
        $customError = [
            'id' => [
                'is_not_unique' => 'ID histori tidak valid.',
            ],
        ];
        $this->validation->setRules($historiValidation,$customError);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/histori'));
        } else {
            $this->historiModel->deleteData($data['id']);
            return redirect()->to(base_url('admin/histori'));
        }
    }
}