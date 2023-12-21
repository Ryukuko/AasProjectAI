<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\GejalaModel;

class Gejala extends BaseController
{
    private $gejalaModel;
    private $validation;
    public function __construct()
    {
        //cek login
        $this->gejalaModel = new GejalaModel();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data['gejala'] = $this->gejalaModel->get();
        echo view('admin/gejala/index',$data);
    }
    public function create()
    {
        echo view('admin/gejala/create');
    }
    public function add()
    {
        $data = array(
            'nama_gejala' => $this->request->getPost('nama_gejala'),
            'kode_gejala' => $this->request->getPost('kode_gejala'),
        );
        $gejalaValidation = [
            'kode_gejala' => ['label' => 'Kode Gejala','rules'=>'trim|required|is_unique[gejala.kode_gejala]'],
            'nama_gejala' => ['label' => 'Nama Gejala','rules'=>'trim|required'],
        ];
        $this->validation->setRules($gejalaValidation);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/gejala/create'));
        } else {
            $this->gejalaModel->insertData($data);
            return redirect()->to(base_url('admin/gejala'));
        }
    }
    public function edit($id)
    {
        $data['id'] = $id;
        $this->validation->setRules([
            'id' => 'required|integer|is_not_unique[gejala.id]'
        ]);
        if (!$this->validation->run($data)) {
            return redirect()->to(base_url('admin/gejala'));
        }
        $data['gejala'] = $this->gejalaModel->get($id);
        echo view('admin/gejala/edit', $data);
    }
    public function update()
    {
        $data = array(
            'id' => $this->request->getPost('id'),
            'nama_gejala' => $this->request->getPost('nama_gejala'),
            'kode_gejala' => $this->request->getPost('kode_gejala'),
        );
        $gejalaValidation = [
            'id' => ['label' => 'ID','rules'=>'trim|required|is_not_unique[gejala.id]'],
            'kode_gejala' => ['label' => 'Kode Gejala','rules'=>'trim|required|is_unique[gejala.kode_gejala,id,{id}]'],
            'nama_gejala' => ['label' => 'Nama Gejala','rules'=>'trim|required'],
        ];
        $this->validation->setRules($gejalaValidation);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/gejala/edit/' . $data['id']));
        } else {
            $this->gejalaModel->updateData($data['id'], $data);
            return redirect()->to(base_url('admin/gejala'));
        }
    }

    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $gejalaValidation = [
            'id' => ['label' => 'ID','rules'=>'trim|required|is_not_unique[gejala.id]|is_unique[rule.gejala_id]']
        ];
        $customError = [
            'id' => [
                'is_not_unique' => 'ID penyakit tidak valid.',
                'is_unique' => 'Gejala ini masih dipakai untuk entitas lain.',
            ],
        ];
        $this->validation->setRules($gejalaValidation,$customError);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/gejala'));
        } else {
            $this->gejalaModel->deleteData($data['id']);
            return redirect()->to(base_url('admin/gejala'));
        }
    }
}