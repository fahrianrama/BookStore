<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomerModel;
use App\Models\BookModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class Account extends Controller
{
    public function index($username)
    {
        $model = new CustomerModel();
        $data['customer'] = $model->findCustomer($username);
        return view('account', ['data' => $data]);
    }
    public function register(){
        $model = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role'),
        ];
        $model->newUser($data);
        return redirect()->to(base_url('/'));
    }
    public function search($username)
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $model = new CustomerModel();
        $model2 = new BookModel();
        $data = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'customer' => $model->findCustomer($username),
            'buku' => $model2->getBook(),
            'kategori' => $model2->getCategory(),
        ];
        return view('account', ['data' => $data]);
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
    public function update()
    {
        $model = new CustomerModel();
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        // get data from form
        helper('form');
        $data = [
            'username' => $session->get('username'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'bank' => $this->request->getVar('bank'),
        ];
        // update data
        $model->updateCustomer($data);
        // redirect to account page
        $username = $session->get('username');
        $model = new CustomerModel();
        $model2 = new BookModel();
        $sendata = [
            'user' => $session->get('username'),
            'role' => $session->get('role'),
            'customer' => $model->findCustomer($username),
            'buku' => $model2->getBook(),
            'kategori' => $model2->getCategory(),
        ];
        return view('account', ['data' => $sendata]);
    }
    public function cart($username)
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $model = new CustomerModel();
        $model2 = new BookModel();
        $model3 = new OrderModel();
        $customer = $model->getCustomerID($username);
        if($customer == false){
            $datacustomer = [
                'username' => $username,
                'nama' => 'kosong',
                'email' => 'kosong',
                'no_hp' => 'kosong',
                'alamat' => 'kosong',
                'bank' => 'kosong',
            ];
            $model -> insertCust($datacustomer);
        }
        $data = [
            'user' => $username,
            'bank' => $model->getBank($session->get('username')),
            'role' => $session->get('role'),
            'customer' => $customer,
            'transaksi' => $model3->getOrder($customer),
            'buku' => $model2->getBook(),
            'kategori' => $model2->getCategory(),
        ];
        return view('cart', ['data' => $data]);
    }
    public function konfirmasi($idtransaksi)
    {
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $username = $session->get('username');
        $model = new BookModel();
        $model3 = new OrderModel();
        $model3 -> confirmOrder($idtransaksi);
        $idbuku = $model3 -> getBookID($idtransaksi);
        $model->updateStock($idbuku);
        return $this-> cart($username);
    }
    public function batal($idtransaksi){
        $session = session();
        if(!$session->get('username')){
            return redirect()->to('/login');
        }
        $username = $session->get('username');
        $model3 = new OrderModel();
        $model3 -> cancelOrder($idtransaksi);
        return $this-> cart($username);
    }
}