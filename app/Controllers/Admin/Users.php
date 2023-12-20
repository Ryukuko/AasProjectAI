<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\PenyakitModel;
use App\Models\Admin\UsersModel;

class Users extends BaseController
{
    private $usersModel;
    private $validation;
    public function __construct()
    {
        //cek login
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
            session()->setFlashdata('inputs', $this->request->getPost());
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
            'username' => ['label' => 'Kode Penyakit','rules'=>'trim|required|is_unique[user.username,id,{id}]'],
        ];
        $this->validation->setRules($usersValidation);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/users/edit/' . $data['id']));
        } else {
            $this->usersModel->updateData($data['id'], $data);
            return redirect()->to(base_url('admin/users'));
        }
    }
    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $usersValidation = [
            'id' => ['label' => 'ID','rules'=>'trim|required|is_not_unique[user.id]']
        ];
        $this->validation->setRules($usersValidation);
        if (!$this->validation->run($data)) {
            return redirect()->to(base_url('admin/users'));
        } else {
            $this->usersModel->deleteData($data['id']);
            return redirect()->to(base_url('admin/users'));
        }
    }
}