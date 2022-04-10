<div class="container my-5">
    <div class="d-flex flex-row justify-content-center">
        <?php 
        foreach ($data['buku'] as $data){ ?>
            <div class="card mx-3" style="width: 18rem;">
                <img src="<?= $data['picture'];?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['judul']; ?></h5>
                    <p class="card-text"><?= $data['deskripsi']; ?>.</p>
                    <a href="<?= base_url('katalog/detail')?>/<?=$data['id_buku'];?>" class="btn btn-primary">Details</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>