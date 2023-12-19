<?php
namespace App\Models\Admin;
use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $table = 'penyakit';
    protected $protectFields = false;
    public function get($id = false)
    {
        if($id){
            return $this->where('id', $id)->first();
        } else {
            return $this->findAll();
        }
    }
    public function insertData($data)
    {
        return $this->insert($data);
    }
    public function updateData($id, $data)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

}