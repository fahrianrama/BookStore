
<!-- Dashboard -->
<?php 
if ($data['role'] == 'admin') {
    $this->extend('layout/admin/admin_layout');
    $this->section('content');
} else if($data['role'] == 'customer'){
    $this->extend('layout/page_layout');
    $this->section('content');
    include_once('pages/customer/dashboard.php');
}
else{
    $this->extend('layout/page_layout');
    $this->section('content');
}
?>
<?= $this->endSection() ?>
