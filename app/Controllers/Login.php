<?php
// Login Controller
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;


class Login extends BaseController
{
    public function index()
    {
        helper('form');
        return view('login');
    }
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where(['username' => $username])->first();
        if($data){
            if($password == $data['password']){
                $session->set('username', $data['username']);
                $session->set('role', $data['role']);
                return redirect()->to('/dashboard');
            }
            else{
                $session->setFlashdata('gagal', 'Password Salah');
                return redirect()->to('/login');
            }
        }
        else{
            $session->setFlashdata('gagal', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

}