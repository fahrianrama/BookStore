<!-- account customer -->
<?php

if(isset($data['customer'])){
    foreach ($data['customer'] as $customer);
    ?>
    <div class="container justify-content-center">
        <div class="card my-5">
            <form action="<?= base_url('account/update') ?>" method="POST" accept-charset="utf-8">
                <div class="card-header">
                    <h3>Profile Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group my-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $customer['username']; ?>" disabled>
                    </div>
                    <!-- name -->
                    <div class="form-group my-3">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $customer['nama']; ?>">
                    </div>
                    <!-- email -->
                    <div class="form-group my-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $customer['email']; ?>">
                    </div>
                    <!-- no_hp -->
                    <div class="form-group my-3">
                        <label for="">No. HP</label>
                        <input type="text" name="no_hp" class="form-control" value="<?php echo $customer['no_hp']; ?>">
                    </div>
                    <!-- alamat -->
                    <div class="form-group my-3">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?php echo $customer['alamat']; ?></textarea>
                    </div>
                    <!-- bank -->
                    <div class="form-group my-3">
                        <label for="">Bank</label>
                        <input type="text" name="bank" class="form-control" value="<?php echo $customer['bank']; ?>">
                    </div>
                <!-- end -->
                </div>
                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary float-end my-3">Save</button>
                </div>
            </form>
        </div>
    </div>
    <?php
}
else{
    ?>
    <h1>TIDAK ADA CUSTOMER</h1>
    <?php
}