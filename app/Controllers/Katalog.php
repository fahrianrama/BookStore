<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\BookModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\StoreModel;

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
            'kategori' => $model->getCategory(),
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
        $toko = $model->getStore($id);
        $tokomodel = new StoreModel();

        $data = [
            'toko' => $tokomodel->getStore($toko),
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'buku' => $model->findBook($id),
            'kategori' => $model->getCategory(),
            'id' => $id,
        ];
        echo view('katalog',  ['data' => $data]);
    }
    public function kategori($kategori)
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $model = new BookModel();
        $data = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'buku' => $model->getbook(),
            'kategori' => $model->getCategory(),
            'kategori_now' => $kategori,
        ];
        echo view('katalog',  ['data' => $data]);
    }
    public function beli($id)
    {
        $custmodel = new CustomerModel();
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        helper('form');
        if($this->request->getVar('pembayaran') == 'transfer'){
            $status = 'Belum Dibayar';
        }
        else{
            $status = 'Dibayar';
        }
        $data = [
            'id_customer' => $custmodel->getCustomerID($session->get('username')),
            'id_buku' => $id,
            'jumlah' => $this ->request->getVar('jumlah'),
            'jenis_pembayaran' => $this ->request->getVar('pembayaran'),
            'tanggal_transaksi' => date('Y-m-d'),
            'status' => $status,
            'kurir' => $this ->request->getVar('kurir'),
        ];
        $ordermodel = new OrderModel();
        $ordermodel->newOrder($data);
        return redirect()->to('/katalog');
    }
    public function search()
    {
        $search = $this->request->getVar('search');
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $model = new BookModel();
        $data = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'keyword' => $search,
            'buku' => $model->searchBook($search),
            'kategori' => $model->getCategory(),
        ];
        echo view('katalog',  ['data' => $data]);
    }
}

