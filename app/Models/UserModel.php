<?php
// Login Models
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['id_user','username', 'password','role'];
}