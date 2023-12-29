<?php 
namespace App\Models\User;
use CodeIgniter\Model;
class GejalaModel extends Model{
    protected $table = 'gejala';
    // protected $primaryKey = 'id';
    
    public function getGejala($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where('id', $id)->first();
        }
    }
    public function getGejalaYangPunyaRule()
    {
        $gejalaIds = $this->db->table('rule')
            ->select('gejala_id')
            ->distinct()
            ->get()
            ->getResult();
        $gejalaIds=array_column($gejalaIds, 'gejala_id');

        $gejalaData = $this->db->table($this->table)
            ->whereIn('id', $gejalaIds)
            ->get()
            ->getResultArray();

        return $gejalaData;
    }
}

?>