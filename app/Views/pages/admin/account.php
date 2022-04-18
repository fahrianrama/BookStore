<!-- account customer -->
<?php

if(isset($data['useracc'])){
    foreach ($data['useracc'] as $user);
    ?>
    <div class="container justify-content-center">
        <div class="card my-5">
            <form action="<?= base_url('admin/updateacc') ?>" method="POST" accept-charset="utf-8">
                <div class="card-header">
                    <h3>Profile Setting</h3>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                    <div class="form-group my-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>">
                    </div>
                    <!-- Password -->
                    <div class="form-group my-3">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" value="<?php echo $user['password']; ?>">
                    </div>
                <!-- end -->
                </div>
                <div class="card-footer">
                    <a data-bs-toggle="modal" href="#updateacc" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary float-end my-3">Save</a>
                    <div class="modal fade" id="updateacc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            Apakah anda yakin ingin mengubah akun anda?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" class="btn btn-success">Yakin</button>
                            </div>
                        </div>
                        </div>
                    </div>
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