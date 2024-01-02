<?php
namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Libraries\Jwt;
use App\Models\User\AuthModel;
class Login extends BaseController
{
    private $authModel;
    private $jwt;
    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->jwt = new Jwt();
    }
    public function login()
    {
        echo view('user/Auth/login');
    }
    public function proses_login(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        //validasi inputan
        if ($username !='' and $password != '' and isset($this->authModel->getPasswordUser($username)['password'])){
            if(hash('sha256',$password) == $this->authModel->getPasswordUser($username)['password']){
                $data = array(
                    'username' => $username,
                    "role" => "user",
                    "id" => $this->authModel->get_id_by_username($username)
                );
                $token = $this->jwt->encode($data);
                setcookie('token', $token, time()+3600, '/', '', false, true);
                return redirect()->to(base_url('user/dashboard'));
            }else{
                session()->setFlashdata('errors', "Username atau Password Salah.");
                return redirect()->to(base_url('user/Auth/login'));
            }
        }else{
            session()->setFlashdata("errors", "Username atau Password kosong.");
            return redirect()->to(base_url('user/Auth/login'));
        }
    }
    public function logout(){
        setcookie('token', '', time() - 3600, '/');
        header("Location: " . base_url('/user/Auth/login'));
        exit();
    }
}