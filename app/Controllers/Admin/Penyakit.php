<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PenyakitModel;

class Penyakit extends BaseController
{
    private $penyakitModel;
    private $validation;

    public function __construct()
    {
        //cek login
        $this->penyakitModel = new PenyakitModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['penyakit'] = $this->penyakitModel->get();
        echo view('admin/penyakit/index', $data);
    }

    public function create()
    {
        echo view('admin/penyakit/create');
    }

    public function add()
    {
        $data = array(
            'nama_penyakit' => $this->request->getPost('nama_penyakit'),
            'solusi' => $this->request->getPost('solusi'),
            'kode_penyakit' => $this->request->getPost('kode_penyakit'),
        );
        $penyakitValidation = [
            'kode_penyakit' => ['label' => 'Kode Penyakit','rules'=>'trim|required|is_unique[penyakit.kode_penyakit]'],
            'nama_penyakit' => ['label' => 'Nama Penyakit','rules'=>'trim|required'],
            'solusi' => ['label' => 'Solusi','rules'=>'trim|required']
        ];
        $this->validation->setRules($penyakitValidation);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/penyakit/create'));
        } else {
            $this->penyakitModel->insertData($data);
            return redirect()->to(base_url('admin/penyakit'));
        }
    }

    public function edit($id)
    {
        $data['id'] = $id;
        $this->validation->setRules([
            'id' => 'required|integer|is_not_unique[penyakit.id]'
        ]);
        if (!$this->validation->run($data)) {
            return redirect()->to(base_url('admin/penyakit'));
        }
        $data['penyakit'] = $this->penyakitModel->get($id);
        echo view('admin/penyakit/edit', $data);
    }

    public function update()
    {
        $data = array(
            'id' => $this->request->getPost('id'),
            'nama_penyakit' => $this->request->getPost('nama_penyakit'),
            'solusi' => $this->request->getPost('solusi'),
            'kode_penyakit' => $this->request->getPost('kode_penyakit'),
        );
        $penyakitValidation = [
            'id' => ['label' => 'ID','rules'=>'trim|required|is_not_unique[penyakit.id]'],
            'kode_penyakit' => ['label' => 'Kode Penyakit','rules'=>'trim|required|is_unique[penyakit.kode_penyakit,id,{id}]'],
            'nama_penyakit' => ['label' => 'Nama Penyakit','rules'=>'trim|required'],
            'solusi' => ['label' => 'Solusi','rules'=>'trim|required']
        ];
        $this->validation->setRules($penyakitValidation);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/penyakit/edit/' . $data['id']));
        } else {
            $this->penyakitModel->updateData($data['id'], $data);
            return redirect()->to(base_url('admin/penyakit'));
        }
    }

    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $penyakitValidation = [
            'id' => ['label' => 'ID','rules'=>'trim|required|is_not_unique[penyakit.id]']
        ];
        $this->validation->setRules($penyakitValidation);
        if (!$this->validation->run($data)) {
            return redirect()->to(base_url('admin/penyakit'));
        } else {
            $this->penyakitModel->deleteData($data['id']);
            return redirect()->to(base_url('admin/penyakit'));
        }
    }
}