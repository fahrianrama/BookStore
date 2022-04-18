
<!-- Dashboard -->
<?php 
if ($data['role'] == 'admin') {
    $this->extend('layout/admin/admin_layout');
    $this->section('content');
    include_once 'pages/admin/dashboard.php';
} else if($data['role'] == 'customer'){
    $this->extend('layout/page_layout');
    $this->section('content');
    include_once('pages/customer/dashboard.php');
}
?>
<?= $this->endSection() ?>
