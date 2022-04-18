<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\OrderModel;
use App\Models\BookModel;
use App\Models\CustomerModel;

class Kurir extends Controller
{
    public function index()
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $model = new OrderModel();
        $bookmodel = new BookModel();
        $data = [
            'user' => $session->get('username'),
            'content' => 'index',
            'role' => $session->get('role'),
            'transaksi' => $model->getOrders(),
            'buku' => $bookmodel->getBook(),
            'kategori' => $bookmodel->getCategory(),
            'customer' => new CustomerModel(),
        ];
        echo view('cart', ['data' => $data]);
    }
    public function data()
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $model = new OrderModel();
        $bookmodel = new BookModel();
        $data = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'transaksi' => $model->getOrders(),
            'buku' => $bookmodel->getBook(),
            'kategori' => $bookmodel->getCategory(),
            'customer' => new CustomerModel(),
        ];
        echo view('cart', ['data' => $data]);
    }
    public function konfirmasi($id)
    {
        $model = new OrderModel();
        $model->konfirmasiantar($id);
    $this->index();
    }
}