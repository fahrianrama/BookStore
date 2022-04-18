<?php

if($data['role'] == 'admin'){
    $this->extend('layout/admin/admin_layout_no_header');
    $this->section('content');
    include_once 'pages/admin/pesanan.php';
}
else if($data['role'] == 'customer'){
    $this->extend('layout/page_layout_no_header');
    $this->section('content');
    include_once 'pages/customer/cart.php';
}
else{
    $this->extend('layout/kurir_layout');
    $this->section('content');
    include_once('pages/kurir/dashboard.php');
}
?>
<?= $this->endSection() ?>