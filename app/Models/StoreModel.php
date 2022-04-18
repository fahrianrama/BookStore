<?php

namespace App\Models;
use CodeIgniter\Model;

class StoreModel extends Model
{
    protected $table = 'toko';
    protected $allowedFields = ['id_toko', 'nama_toko', 'alamat', 'email'];

    public function getStore($id_toko)
    {
        $query = $this->db->query('SELECT * FROM toko WHERE id_toko = '.$id_toko);
        return $query->getResult('array');
    }
}