<?php
namespace App\Models\Admin;
use CodeIgniter\Model;
class DashboardModel extends Model
{
    public function getCount($table)
    {
        return $this->db->table($table)->countAll();
    }

}