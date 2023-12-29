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

    //custom validasi add dinamis yang disuruh pak resa
    public function cfPakarValidationAdd()
    {
        for ($i=0;$i<count($_POST['cf_pakar']);$i++){
            if (!($_POST['cf_pakar'][$i] >= 0 and $_POST['cf_pakar'][$i] <= 1)) {
                return false;
            }
        }
        return true;
    }
    public function requiredAdd()
    {
        for ($i=0;$i<count($_POST['gejala_id']);$i++){
            if ($_POST['gejala_id'][$i]=='') {
                return false;
            }
        }
        return true;
    }
    public function checkUniqueInputAdd()
    {
        $dapatkanDuplikat=array_unique($_POST['gejala_id']);
        if (count($_POST['gejala_id']) !== count($dapatkanDuplikat)) {
            return false;
        }
        return true;
    }
    public function checkManyToManyAdd()
    {
        for ($i=0;$i<count($_POST['gejala_id']);$i++){
            $query= $this->db->table('rule')
                ->select('id')
                ->where('gejala_id',$_POST['gejala_id'][$i])
                ->where('penyakit_id',$_POST['penyakit_id'])
                ->countAllResults();
            if ($query > 0) {
                return false;
            }
        }
        return true;
    }

}