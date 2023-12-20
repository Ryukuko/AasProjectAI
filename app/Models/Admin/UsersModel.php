<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'user';
    protected $protectFields = false;

    public function get($id = false)
    {
        if ($id) {
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
        return $this->update(['id' => $id], $data);
    }

    public function deleteData($id)
    {
        return $this->delete(['id' => $id]);
    }

}