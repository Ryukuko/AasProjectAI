<?php

namespace App\Validation;

class RulesControllerValidation
{
    private $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function cfPakarValidation($cfPakar)
    {
        if ($cfPakar >= 0 and $cfPakar <= 1) {
            return true;
        } else {
            return false;
        }
    }
    public function checkManyToManyAdd()
    {
        $query= $this->db->table('rule')
            ->select('id')
            ->where('gejala_id',$_POST['gejala_id'])
            ->where('penyakit_id',$_POST['penyakit_id'])
            ->countAllResults();
        if ($query > 0) {
            return false;
        } else {
            return true;
        }
    }
    public function checkManyToManyUpdate()
    {
        $query1= $this->db->table('rule')
            ->select('id')
            ->where('id',$_POST['id'])
            ->where('gejala_id',$_POST['gejala_id'])
            ->where('penyakit_id',$_POST['penyakit_id'])
            ->countAllResults();
        $query2= $this->db->table('rule')
            ->select('id')
            ->where('gejala_id',$_POST['gejala_id'])
            ->where('penyakit_id',$_POST['penyakit_id'])
            ->countAllResults();
        if ($query1 > 0 and $query2 > 0 or $query2 <= 0) {
            return true;
        }
        else {
            return false;
        }
    }

}