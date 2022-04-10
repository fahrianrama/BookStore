<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Bookstore</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/2232/2232688.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
	<!-- Kit -->
	<script src="https://kit.fontawesome.com/9769c63bf6.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url(<?= base_url('img/bg2.jpg') ?>);">
    <!-- Login Page -->
    <div class="d-flex justify-content-center align-items-center" style="height: 622px;">
        <div class="container p-3" style="height: auto; width:25rem;">
            <div class="card shadow" style="width: 25rem; height:auto;">
                <img src="<?= base_url('img/books.png')?>" class="card-img-top" alt="...">
                <div class="card-body p-5">
                    <h3 class="card-title mb-5">Sign Up</h3>
                    <form action="<?= base_url('register/save') ?>" method="post">
                        <div class="form-group my-4">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group mb-4">
                            <!-- Role -->
                            <select class="form-control" id="role" name="role">
                                <option value="" disabled>Select Role</option>
                                <option value="kurir">Kurir</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-block">Sign Me Up!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Login Page -->
    <!-- jQuery -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>
