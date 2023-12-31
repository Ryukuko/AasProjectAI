<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\DashboardModel;
use App\Models\User\AuthModel;
use App\Libraries\Jwt;


class Profile extends BaseController{

    // protected $dashboardModel;
    private $jwt;
    private $authModel;
    protected $data;
    public function __construct()
    {
        $this->jwt = new Jwt();
        // var_dump($_COOKIE['token']);
        if (isset($_COOKIE['token'])) {
            if ($this->jwt->decodeUser($_COOKIE['token']) == false) {
                session()->setFlashdata('errors', 'Silahkan login terlebih dahulu.');
                header("Location:".base_url('/user/Auth/login'));
                exit();
            }
        } else {
            session()->setFlashdata('errors', 'Silahkan login terlebih dahulu.');
            header("Location: ".base_url('user/Auth/login'));
            exit();
        }
        $this->authModel = new AuthModel();

    }
    
    public function username(){
        $token = $_COOKIE['token'];
        $id = json_decode(base64_decode(explode('.', $token)[1]))->data->id;
        $this->data = $this->authModel->get_username_by_id($id);

    }

    public function index(){
        $this->username();
        $data = [
            'username' => $this->data,
        ];
        // var_dump($data);
        echo view('user/Profile/profile', $data);
        
    }
    public function editProfile(){
        $this->username();
        $data = [
            'username' => $this->data,
        ];
        echo view('user/profile/editProfile', $data);
    }

    public function ganti_password_aksi(){
        $token = $_COOKIE['token'];
        $username = json_decode(base64_decode(explode('.', $token)[1]))->data->username;
        $id_pengguna = $this->authModel->get_id_by_username($username);
        $password_pengguna = $this->authModel->getPasswordUser($username)['password'];
        // var_dump($id_pengguna);
        $password_lama = $this->request->getPost('password_lama');
        $password_lama_hash = hash('sha256',$password_lama);
        // var_dump($password_lama_hash);
        $validation = \Config\Services::validation();
        $data =[
            'password_lama' => $password_lama_hash,
            'password' => $this->request->getPost('password'),
            'confirm_password' => $this->request->getPost('confirm_password'),
        ];
        if($password_lama !='' and isset($password_pengguna)){
            if($password_lama_hash == $password_pengguna){
                if ($validation->run($data, 'gantiPassword') == FALSE) {
                    session()->setFlashdata('errors', $validation->getErrors());
                    session()->setFlashdata('inputs', $this->request->getPost());
                    return redirect()->to('user/profile/edit');
                } else {
                        $password = $this->request->getPost('password');
                        $datalagi = [
                            'password' => hash('sha256', $password),
                        ];
                        $simpan = $this->authModel->edit_password($id_pengguna,$datalagi);
                        if ($simpan) {
                            session()->setFlashdata('berhasil_ganti', 'Change Password Successfully');
                            return redirect()->to('user/profile/edit');
                        }                    
                    }
                }else{
                    session()->setFlashdata('password_salah','Maaf Password Lama Anda Salah!');
                    return redirect()->to('user/profile/edit');
                }
            }else{
                session()->setFlashdata('password_kosong','Maaf Password Lama kosong!');
                return redirect()->to('user/profile/edit');
        }
    }
}