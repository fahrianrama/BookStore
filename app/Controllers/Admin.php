<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\OrderModel;
use App\Models\BookModel;
use App\Models\CustomerModel;
use App\Models\StoreModel;
use App\Models\UserModel;

class Admin extends Controller
{
    public function showuser($id)
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $bookmodel = new BookModel();
        $usermodel = new UserModel();
        $data = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'useracc' => $usermodel->getUser($id),
            'kategori' => $bookmodel->getCategory(),
        ];
        echo view('account', ['data' => $data]);
    }
    public function updateacc()
    {
        $usermodel = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $id = $this->request->getVar('id_user');
        $usermodel->updateUser($username, $password, $id);
        return redirect()->to('/login');
    }
    public function pesanan()
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
        $model->konfirmasi($id);
        $this->pesanan();
    }
    public function katalog()
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
        echo view('katalog', ['data' => $data]);
    }
    public function detail($id)
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $model = new BookModel();
        $toko = $model->getStore($id);
        $modeltoko = new StoreModel();
        $data = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'buku' => $model->findBook($id),
            'kategori' => $model->getCategory(),
            'id' => $id,
            'toko' => $modeltoko->getStore($toko),
        ];
        echo view('katalog', ['data' => $data]);
    }
    public function edit($id)
    {
        $model = new BookModel();
        $data = [
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'kategori' => $this->request->getVar('kategori'),
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tebal' => $this->request->getVar('tebal'),
            'id_toko' => $this->request->getVar('id_toko'),
            'picture' => $this->request->getVar('picture'),
            'id' => $id,
        ];
        $model->updateBook($data);
        $this->detail($id);
    }
    public function addbuku()
    {
        $model = new BookModel();
        $data = [
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'kategori' => $this->request->getVar('kategori'),
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tebal' => $this->request->getVar('tebal'),
            'id_toko' => $this->request->getVar('id_toko'),
            'picture' => $this->request->getVar('picture'),
        ];
        $model->addBook($data);
        $this->katalog();
    }
    public function deletebuku($id)
    {
        $model = new BookModel();
        $model->deleteBook($id);
        $this->katalog();
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
            'buku' => $model->getBookByCategory($kategori),
            'kategori' => $model->getCategory(),
            'kategori_now' => $kategori,
        ];
        echo view('katalog', ['data' => $data]);
    }
    public function search()
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $keyword = $this->request->getVar('keyword');
        $model = new BookModel();
        $data = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'buku' => $model->searchBook($keyword),
            'kategori' => $model->getCategory(),
            'keyword' => $keyword,
        ];
        echo view('katalog', ['data' => $data]);
    }
}