<?php

if ($data['role'] == 'admin') {
    $this->extend('layout/admin/admin_layout_no_header');
    $this->section('content');
    include_once 'pages/admin/account.php';
} else if($data['role'] == 'customer'){
    $this->extend('layout/page_layout_no_header');
    $this->section('content');
    // Account page for customer
    include_once 'pages/customer/account.php';
}
else{
    $this->extend('layout/page_layout');
    $this->section('content');
}
?>
<?= $this->endSection() ?>