<?php
namespace App\Controllers\User;
use App\Models\User\AuthModel;
use App\Controllers\BaseController;

class Register extends BaseController
{
    private $authModel;
    public function __construct() {
        $this->authModel = new AuthModel();
    }
    public function register()
    {
    echo view('user/Auth/register');
    }
    public function proses_register()
    {
        $validation = \Config\Services::validation();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'confirm_password' => $this->request->getPost('confirm_password')
        ]; 

        if ($validation->run($data, 'authregister') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            session()->setFlashdata('inputs', $this->request->getPost());
            return redirect()->to('user/Auth/register');
        } else {
            $password = $this->request->getPost('password');
            $datalagi = [
                'username' => $this->request->getPost('username'),
                'password' => hash('sha256', $password),
            ];

            $simpan = $this->authModel->register($datalagi);

            if ($simpan) {
                session()->setFlashdata('success_register', 'Register Successfully');
                return redirect()->to('user/Auth/login');
            }
        }
    }
}