<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'buku';
    protected $allowedFields = ['id_toko','id_buku','picture','judul', 'pengarang', 'penerbit', 'tahun_terbit', 'kategori','deskripsi', 'harga'];

    public function getBook(){
        $query = $this -> db -> query('SELECT * FROM buku');
        return $query->getResult('array');
    }
    public function findBook($id){
        $query = $this -> db -> query("SELECT * FROM buku WHERE id_buku = '$id'");
        return $query->getResult('array');
    }
}