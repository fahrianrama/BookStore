<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'buku';
    protected $allowedFields = ['id_toko','id_buku','picture','judul', 'pengarang', 'penerbit', 'tahun_terbit','tebal', 'kategori','deskripsi', 'harga'. 'stok'];

    public function getBook(){
        $query = $this -> db -> query('SELECT * FROM buku');
        return $query->getResult('array');
    }
    public function getCategory(){
        $query = $this -> db -> query('SELECT DISTINCT kategori FROM buku');
        return $query->getResult('array');
    }
    public function getBookDashboard(){
        $query = $this -> db -> query('SELECT * FROM buku ORDER BY id_buku DESC LIMIT 10');
        return $query->getResult('array');
    }
    public function findBook($id){
        $query = $this -> db -> query("SELECT * FROM buku WHERE id_buku = '$id'");
        return $query->getResult('array');
    }
    public function getStore($id){
        $query = $this -> db -> query("SELECT id_toko FROM buku WHERE id_buku = '$id'");
        $row = $query->getRowArray();
        return $row['id_toko'];
    }
    public function getBookByCategory($kategori)
    {
        $query = $this->db->query("SELECT * FROM buku WHERE kategori = '$kategori'");
        return $query->getResult('array');
    }
    public function searchBook($keyword)
    {
        $query = $this->db->query("SELECT * FROM buku WHERE judul LIKE '%$keyword%'");
        return $query->getResult('array');
    }
    public function updateBook($data)
    {
        $query = $this->db->query("UPDATE buku SET picture = '$data[picture]', judul = '$data[judul]', pengarang = '$data[pengarang]', penerbit = '$data[penerbit]', tahun_terbit = '$data[tahun_terbit]', tebal = '$data[tebal]', kategori = '$data[kategori]', deskripsi = '$data[deskripsi]', harga = '$data[harga]', stok = '$data[stok]', id_toko = '$data[id_toko]' WHERE id_buku = '$data[id]'");
        return $query;
    }
    public function addBook($data)
    {
        $query = $this->db->query("INSERT INTO buku (id_toko, picture, judul, pengarang, penerbit, tahun_terbit, tebal, kategori, deskripsi, harga, stok) VALUES ('$data[id_toko]', '$data[picture]', '$data[judul]', '$data[pengarang]', '$data[penerbit]', '$data[tahun_terbit]', '$data[tebal]', '$data[kategori]', '$data[deskripsi]', '$data[harga]', '$data[stok]')");
        return $query;
    }
    public function deleteBook($id)
    {
        $query = $this->db->query("DELETE FROM buku WHERE id_buku = '$id'");
        return $query;
    }
    public function updateStock($id){
        $query = $this -> db -> query("UPDATE buku SET stok = stok - 1 WHERE id_buku = '$id'");
        return $query;
    }
}