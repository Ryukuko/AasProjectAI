<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RulesModel extends Model
{
    protected $table = 'rule';
    protected $protectFields = false;
    public function getSatuan($id)
    {
        return $this->where('id', $id)->first();
    }

    public function get()
    {
        $koneksi = $this->db->table($this->table);
        return $koneksi->select('rule.id, rule.cf_pakar, penyakit.nama_penyakit,penyakit.kode_penyakit, gejala.nama_gejala,gejala.kode_gejala')
            ->join('gejala', 'rule.gejala_id = gejala.id')
            ->join('penyakit', 'rule.penyakit_id = penyakit.id')
            ->get()
            ->getResult();
    }
    public function getAllPenyakit(){
        $koneksi = $this->db->table("penyakit");
        return $koneksi->select('id, kode_penyakit, nama_penyakit')->orderBy('id')->get()->getResult();
    }
    public function getAllGejala(){
        $koneksi = $this->db->table("gejala");
        return $koneksi->select('id, kode_gejala, nama_gejala')->orderBy('id')->get()->getResult();
    }

    public function insertData($data)
    {
        return $this->insert($data);
    }
    public function updateData($id, $data)
    {
        return $this->update(['id' => $id],$data);
    }
    public function deleteData($id)
    {
        return $this->delete(['id' => $id]);
    }

}