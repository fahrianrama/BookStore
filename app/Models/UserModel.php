<?php
// Login Models
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['id_user','username', 'password','role'];
    public function getUser($id)
    {
        $query = $this->db->query("SELECT * FROM user WHERE username = '$id'");
        return $query->getResult('array');
    }
    public function updateUser($username,$password,$id)
    {
        $query = $this->db->query("UPDATE user SET username = '$username', password = '$password' WHERE id_user = '$id'");
        return $query;
    }
    public function newUser($data)
    {
        $query = $this->db->query("INSERT INTO user (username, password, role) VALUES ('$data[username]', '$data[password]', '$data[role]')");
        return $query;
    }
}