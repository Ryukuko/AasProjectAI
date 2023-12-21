<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\RulesModel;

class Rules extends BaseController
{
    private $rulesModel;
    private $validation;

    public function __construct()
    {
        //cek login
        $this->rulesModel = new RulesModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['rules'] = $this->rulesModel->get();
        echo view('admin/rules/index', $data);
    }

    public function create()
    {
        $data['penyakit'] = $this->rulesModel->getAllPenyakit();
        $data['gejala'] = $this->rulesModel->getAllGejala();
        echo view('admin/rules/create', $data);
    }
    public function add()
    {
        $data = array(
            'penyakit_id' => $this->request->getPost('penyakit_id'),
            'gejala_id' => $this->request->getPost('gejala_id'),
            'cf_pakar' => $this->request->getPost('cf_pakar'),
        );
        $rulesValidation = [
            'penyakit_id' => ['label' => 'Kode Penyakit', 'rules' => 'trim|required|is_not_unique[penyakit.id]|checkManyToManyAdd'],
            'gejala_id' => ['label' => 'Kode Gejala', 'rules' => 'trim|required|is_not_unique[gejala.id]'],
            'cf_pakar' => ['label' => 'CF Pakar', 'rules' => 'trim|required|cfPakarValidation'],
        ];
        $customError = [
            'cf_pakar' => [
                'cfPakarValidation' => 'Nilai CF Pakar harus berupa angka diantara 0 hingga 1.',
            ],
            'penyakit_id' => [
                'checkManyToManyAdd' => 'Kombinasi Kode Gejala dan Kode Penyakit tersebut sudah ada.',
            ]
        ];
        $this->validation->setRules($rulesValidation,$customError);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/rules/create'));
        }
        else {
            $this->rulesModel->insertData($data);
            return redirect()->to(base_url('admin/rules'));
        }
    }

    public function edit($id)
    {
        $data['id'] = $id;
        $this->validation->setRules([
            'id' => 'required|integer|is_not_unique[rule.id]'
        ]);
        if (!$this->validation->run($data)) {
            return redirect()->to(base_url('admin/rules'));
        }
        $data['penyakit'] = $this->rulesModel->getAllPenyakit();
        $data['gejala'] = $this->rulesModel->getAllGejala();
        $data['rules'] = $this->rulesModel->getSatuan($id);
        echo view('admin/rules/edit', $data);
    }
    public function update()
    {
        $data = array(
            'id' => $this->request->getPost('id'),
            'penyakit_id' => $this->request->getPost('penyakit_id'),
            'gejala_id' => $this->request->getPost('gejala_id'),
            'cf_pakar' => $this->request->getPost('cf_pakar')
        );
        $rulesValidation = [
            'id' => ['label' => 'ID','rules'=>'trim|required|is_not_unique[rule.id]'],
            'penyakit_id' => ['label' => 'Kode Penyakit', 'rules' => 'trim|required|is_not_unique[penyakit.id]|checkManyToManyUpdate'],
            'gejala_id' => ['label' => 'Kode Gejala', 'rules' => 'trim|required|is_not_unique[gejala.id]'],
            'cf_pakar' => ['label' => 'CF Pakar', 'rules' => 'trim|required|cfPakarValidation']
        ];
        $customError = [
            'cf_pakar' => [
                'cfPakarValidation' => 'Nilai CF Pakar harus berupa angka diantara 0 hingga 1.',
            ],
            'penyakit_id' => [
                'checkManyToManyUpdate' => 'Kombinasi Kode Gejala dan Kode Penyakit tersebut sudah ada.',
            ]
        ];
        $this->validation->setRules($rulesValidation,$customError);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/rules/edit/' . $data['id']));
        } else {
            $this->rulesModel->updateData($data['id'], $data);
            return redirect()->to(base_url('admin/rules'));
        }
    }
    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $rulesValidation = [
            'id' => ['label' => 'ID', 'rules' => 'trim|required|is_not_unique[rule.id]']
        ];
        $customError = [
            'id' => [
                'is_not_unique' => 'ID rules tidak valid.',
            ],
        ];
        $this->validation->setRules($rulesValidation, $customError);
        if (!$this->validation->run($data)) {
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('admin/rules'));
        } else {
            $this->rulesModel->deleteData($data['id']);
            return redirect()->to(base_url('admin/rules'));
        }
    }
}