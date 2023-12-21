<?php


namespace App\Controllers\Admin;

use App\Models\Admin\AuthenticationModel;
use App\Controllers\BaseController;
use App\Libraries\Jwt;

class Authentication extends BaseController
{
    private $jwt;
    private $authenticationModel;

    public function __construct()
    {
        $this->authenticationModel = new AuthenticationModel();
        $this->jwt = new Jwt();
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        if ($password!='' and $username!=''){
            if (hash('sha256', $password) == $this->authenticationModel->getPasswordAdmin($username)['password']) {
                $data = array(
                    "username" => $username,
                    "role" => "admin"
                );
                $token = $this->jwt->encode($data);
                setcookie('token', $token, time()+3600, '/', '', false, true);
                return redirect()->to(base_url('admin/dashboard'));
            }else {
                    $this->session->setFlashdata('errors', 'Username atau Password salah.');
                    return redirect()->to(base_url('/'));
                }
        } else {
            session()->setFlashdata('errors', 'Username atau Password salah.');
            return redirect()->to(base_url('/admin/login'));
        }
    }
}