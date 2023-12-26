<?php 
namespace App\Models\User;
use CodeIgniter\Model;
class historyModel extends Model{
    protected $table = 'history';
    protected $primaryKey = 'id';
    
    public function getHistory($id)
    {
        $koneksi = $this->db->table($this->table);
        return $koneksi->select('penyakit.nama_penyakit,penyakit.solusi, history.presentase, history.tanggal, history.gejala')
            ->where('history.id_user', $id)
            ->join('user', 'history.id_user = user.id')
            ->join('penyakit', 'history.id_penyakit = penyakit.id')
            ->get()
            ->getResult();
    }

}

?>