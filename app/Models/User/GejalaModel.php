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
            return $this->getWhere(['id'=> $id]);
        }
    }
}

?>