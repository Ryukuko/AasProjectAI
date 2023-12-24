<?php
namespace App\Models;
use CodeIgniter\Model;
class TestModel extends Model
{
    protected $table = "gejala";
    public function getGejalaId()
    {
        return $this->findAll();
    }

}