<!-- Dashboard -->
<?php 
if ($data['role'] == 'admin') {
    $this->extend('layout/admin/admin_layout_no_header');
    $this->section('content');
    if(isset($data['id'])){
        include_once ('pages/admin/detail.php');
    }
    else{
        include_once('pages/admin/katalog.php');
    }
} else if($data['role'] == 'customer'){
    $this->extend('layout/page_layout_no_header');
    $this->section('content');
    // is id set?
    if(isset($data['id'])){
        include_once ('pages/customer/bookdesc.php');
    }
    // is kategori set
    else if(isset($data['kategori_now'])){
        include_once('pages/customer/kategori.php');
    }
    // is checkout is set
    else if(isset($data['order'])){
        include_once('pages/customer/order.php');
    }
    else{
        include_once('pages/customer/katalog.php');
    }
}
else{
    $this->extend('layout/page_layout');
    $this->section('content');
}
?>
<?= $this->endSection() ?>