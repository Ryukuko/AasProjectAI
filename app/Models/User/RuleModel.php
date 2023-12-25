<?php 
namespace App\Models\User;
use CodeIgniter\Model;
class RuleModel extends Model{
    protected $table = 'rule';
    // protected $primaryKey = 'id';

    public function getCFPakar($data){
        $query =$this->db->table($this->table);
        $query->select('cf_pakar');
        $query->whereIn('gejala_id',$data);
        $result = $query->get()->getResultArray();
        return $result;
    }
    public function getPenyakit($data){
        $query = $this->db->table($this->table);
        $query->select('penyakit_id');
        $query->whereIn('gejala_id',$data);
    }
    public function getAllPenyakit($data){
        $query = $this->db->table($this->table);
        $query->select('penyakit_id');
        $query->whereIn('gejala_id',$data);
        $result = $query->get()->getResultArray();
        return $result;
    }

//         $perubahanFormatArray = [];
//         foreach ($result as $key) {
//             $perubahanFormatArray[] = ['id_penyakit' => $key['penyakit_id']];
//     }
//     return $perubahanFormatArray;
// }
}
?>