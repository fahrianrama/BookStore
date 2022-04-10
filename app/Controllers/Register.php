<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{
    public function index()
    {
        helper('form');
        $data = [];
        return view('register', $data);
    }
    public function save()
    {
        helper('form');
        $rules = [
            'username' => 'required|alpha_numeric|min_length[5]|is_unique[user.username]',
            'password' => 'required|min_length[8]|max_length[255]',
            'role'     => 'required'
        ];
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'role'     => $this->request->getVar('role')
            ];
            $model -> save($data);
            return redirect()->to('/login');
        }
        else{
            $data['validation'] = $this->validator;
            return view('register', $data);
        }
    }
}