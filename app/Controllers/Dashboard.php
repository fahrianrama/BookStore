<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Controllers\Admin;
use App\Models\BookModel;

class Dashboard extends Controller
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
            'buku' => $model->getBookDashboard(),
            'kategori' => $model->getCategory(),
        ];
        return view('dashboard', ['data' => $data]);
    }
}