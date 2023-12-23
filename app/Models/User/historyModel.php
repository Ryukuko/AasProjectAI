<?php 
namespace App\Models\User;
use CodeIgniter\Model;
class historyModel extends Model{
    protected $table = 'history';
    protected $primaryKey = 'id';
    
    public function getHistory($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id'=> $id]);
        }
    }

}

?>