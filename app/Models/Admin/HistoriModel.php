<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class HistoriModel extends Model
{
    protected $table = 'history';
    protected $protectFields = false;

    public function get()
    {
        $koneksi = $this->db->table($this->table);
        return $koneksi->select('history.id, user.username, penyakit.nama_penyakit,penyakit.solusi, history.presentase, history.tanggal, history.gejala')
            ->join('user', 'history.id_user = user.id')
            ->join('penyakit', 'history.id_penyakit = penyakit.id')
            ->get()
            ->getResult();
    }

    public function deleteData($id)
    {
        return $this->delete(['id' => $id]);
    }

}