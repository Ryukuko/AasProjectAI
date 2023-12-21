<?php
namespace App\Models\Admin;
use CodeIgniter\Model;
class AuthenticationModel extends Model
{
    protected $table = "admin";
    public function getPasswordAdmin($username)
    {
        return $this->select('password')
            ->where('username', $username)
            ->get()
            ->getRowArray();
    }

}