<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $allowedFields = ['id_customer','username', 'nama', 'email', 'no_hp', 'alamat', 'bank'];

    public function insertCust($data)
    {
        $query = $this->db->query("INSERT INTO customer (username, nama, email, no_hp, alamat, bank) VALUES ('$data[username]', '$data[nama]', '$data[email]', '$data[no_hp]', '$data[alamat]', '$data[bank]')");
        return $query;
    }
    public function findCustomer($username)
    {
        $query = $this -> db -> query("SELECT * FROM customer WHERE username = '$username'");
        return $query->getResult('array');
    }
    public function getCustomerID($username)
    {
        // find customer id
        $query = $this -> db -> query("SELECT id_customer FROM customer WHERE username = '$username'");
        $row = $query -> getRowArray();
        if($row)
        {
            return $row['id_customer'];
        }
        else
        {
            return false;
        }
    }
    public function getCustomerName($id)
    {
        // find customer username
        $query = $this -> db -> query("SELECT username FROM customer WHERE id_customer = '$id'");
        $row = $query -> getRowArray();
        return $row['username'];
    }
    public function getBank($username)
    {
        // find customer id
        $query = $this -> db -> query("SELECT bank FROM customer WHERE username = '$username'");
        $row = $query -> getRowArray();
        return $row['bank'];
    }
    public function getCustomerLocation($id)
    {
        // find customer username
        $query = $this -> db -> query("SELECT alamat FROM customer WHERE id_customer = '$id'");
        $row = $query -> getRowArray();
        return $row['alamat'];
    }
    public function updateCustomer($data)
    {
        $query = $this -> db -> query("UPDATE customer SET nama = '$data[nama]', email = '$data[email]', no_hp = '$data[no_hp]', alamat = '$data[alamat]', bank = '$data[bank]' WHERE username = '$data[username]'");
        return $query;
    }
}