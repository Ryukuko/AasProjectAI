<?php 

namespace App\Models\User;
use CodeIgniter\Model;

class AuthModel extends Model{
    protected $table = "user";

    public function getPasswordUser($username)
    {
        $query = $this->where('username',$username)->countAll();

        if($query >0 ){
            $hasil = $this->table($this->table)->where('username',$username)->limit(1)->get()->getRowArray();
        }else{
            $hasil = array();
        }return $hasil;

        // return $this->select('password')
        //     ->where('username', $username)
        //     ->get()
        //     ->getRowArray();

    }
    public function register($data){
        return $this->db->table($this->table)->insert($data);
    }
    public function get_username_by_id($username){
        $query = $this->where('id', $username)->get();

        if ($query->getNumRows() > 0) {
            return $query->getRow()->username;
        }
    }
    public function get_id_by_username($username){
        $query = $this->where('username',$username)->get();
        if ($query->getNumRows() > 0) {
            return $query->getRow()->id;
        }
    }
    public function edit_password($id, $data)
{
    $query = $this->db->table($this->table);
    $query->set($data);
    $query->where('id', $id);

    // Eksekusi query
    return $query->update();
}

}