<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\UsersModel;
use App\Libraries\Jwt;

class Users extends BaseController
{
    private $usersModel;
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
        $this->usersModel = new UsersModel();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data['users'] = $this->usersModel->get();
        echo view('admin/users/index',$data);
    }
    public function create(){
        echo view('admin/users/create');
    }
    public function add()
    {
        $data = array(
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        );
        $usersValidation = [
            'username' => ['label' => 'Username','rules'=>'trim|required|is_unique[user.username]'],
            'password' => ['label' => 'Password','rules'=>'trim|required'],
        ];
        $this->validation->setRules($usersValidation);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/users/create'));
        } else {
            $data['password']= hash('sha256', $this->request->getPost('password'));
            $this->usersModel->insertData($data);
            return redirect()->to(base_url('admin/users'));
        }
    }
    public function edit($id)
    {
        $data['id'] = $id;
        $this->validation->setRules([
            'id' => 'required|integer|is_not_unique[user.id]'
        ]);
        if (!$this->validation->run($data)) {
            return redirect()->to(base_url('admin/users'));
        }
        $data['users'] = $this->usersModel->get($id);
        echo view('admin/users/edit', $data);
    }
    public function update()
    {
        $data = array(
            'id' => $this->request->getPost('id'),
            'username' => $this->request->getPost('username'),
        );
        if ($this->request->getPost('password')!=''){
            $data['password']=hash('sha256', $this->request->getPost('password'));
        }
        $usersValidation = [
            'id' => ['label' => 'ID','rules'=>'trim|required|is_not_unique[user.id]'],
            'username' => ['label' => 'Username','rules'=>'trim|required|is_unique[user.username,id,{id}]'],
        ];
        $this->validation->setRules($usersValidation);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/users/edit/' . $data['id']));
        } else {
            $this->usersModel->updateData($data['id'], $data);
            return redirect()->to(base_url('admin/users'));
        }
    }
    public function delete($id)
    {
        $data['id'] = $id;
        $usersValidation = [
            'id' => ['label' => 'ID','rules'=>'trim|required|is_not_unique[user.id]']
        ];
        $customError = [
            'id' => [
                'is_not_unique' => 'ID user tidak valid.',
            ]
        ];
        $this->validation->setRules($usersValidation,$customError);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/users'));
        } else {
            $this->usersModel->deleteData($data['id']);
            return redirect()->to(base_url('admin/users'));
        }
    }
}