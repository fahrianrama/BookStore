<!-- Dashboard -->
<?php 
if ($data['role'] == 'admin') {
    $this->extend('layout/admin/admin_layout');
    $this->section('content');
} else if($data['role'] == 'customer'){
    $this->extend('layout/page_layout_no_header');
    $this->section('content');
    // is id set?
    if(isset($data['id'])){
        include_once ('pages/customer/bookdesc.php');
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