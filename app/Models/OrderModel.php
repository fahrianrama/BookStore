<?php

namespace App\Models;
use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['id_customer', 'id_buku', 'jumlah', 'jenis_pembayaran', 'tanggal_transaksi', 'kurir', 'status'];

    public function newOrder($data)
    {
        $query = $this->db->query("INSERT INTO transaksi (id_customer, id_buku, jumlah, jenis_pembayaran, tanggal_transaksi, kurir, status) VALUES ('".$data['id_customer']."', '".$data['id_buku']."', '".$data['jumlah']."', '".$data['jenis_pembayaran']."', '".$data['tanggal_transaksi']."', '".$data['kurir']."', '".$data['status']."')");
        return $query;
    }
    public function getOrders()
    {
        $query = $this->db->query("SELECT * FROM transaksi");
        return $query->getResult('array');
    }
    public function getOrder($id)
    {
        $query = $this->db->query("SELECT * FROM transaksi WHERE id_customer = '".$id."' ORDER BY id_transaksi DESC");
        return $query->getResult('array');
    }
    public function confirmOrder($id)
    {
        $query = $this->db->query("UPDATE transaksi SET status = 'Dibayar' WHERE id_transaksi = '".$id."'");
        return $query;
    }
    public function cancelOrder($id)
    {
        $query = $this->db->query("UPDATE transaksi SET status = 'Dibatalkan' WHERE id_transaksi = '".$id."'");
        return $query;
    }
    public function konfirmasi($id)
    {
        $query = $this->db->query("UPDATE transaksi SET status = 'Dikonfirmasi' WHERE id_transaksi = '".$id."'");
        return $query;
    }
    public function konfirmasiantar($id)
    {
        $query = $this->db->query("UPDATE transaksi SET status = 'Diantar' WHERE id_transaksi = '".$id."'");
        return $query;
    }
    public function getBookID($id)
    {
        $query = $this->db->query("SELECT id_buku FROM transaksi WHERE id_transaksi = '".$id."'");
        $row = $query->getRowArray();
        return $row['id_buku'];
    }
}