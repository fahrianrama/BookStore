<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Bookstore</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/2232/2232688.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <script src="https://kit.fontawesome.com/9769c63bf6.js" crossorigin="anonymous"></script>
</head>

<body>

    <?= $this->include('layout/admin/navbar') ?>
    <?= $this->renderSection('content') ?>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

    <?= $this->include('layout/footer') ?>

</body>

</html>