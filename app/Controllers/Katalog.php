<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\BookModel;

class Katalog extends Controller
{
    public function index()
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $model = new BookModel();
        $data = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'buku' => $model->getBook(),
        ];
        echo view('katalog',  ['data' => $data]);
    }
    public function detail($id)
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $model = new BookModel();
        $data = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'buku' => $model->findBook($id),
            'id' => $id,
        ];
        echo view('katalog',  ['data' => $data]);
    }
}

