<div class="container my-5">
    <h2 class="text-center mb-5">Kategori Buku : <?= ucfirst($data['kategori_now'])?></h2>
    <div class="d-flex flex-row justify-content-center">
        <?php 
        foreach ($data['buku'] as $buku){
            if($buku['kategori']==$data['kategori_now']){?>
            <div class="card mx-3 shadow" style="width: 18rem;">
                <img src="<?= $buku['picture'];?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $buku['judul']; ?></h5>
                    <p class="card-text text-success">Rp. <?= number_format($buku['harga']) ?></p>
                    <?php
                    $string = strip_tags($buku['deskripsi']);
                    if (strlen($string) > 100) {

                        // truncate string
                        $stringCut = substr($string, 0, 100);
                        $endPoint = strrpos($stringCut, ' ');

                        //if the string doesn't contain any space then it will cut without word basis.
                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        $string .= '...';
                    }
                    echo '<p class-"card-text">',$string,'</p>';
                    ?>
                    <a href="<?= base_url('katalog/detail')?>/<?=$buku['id_buku'];?>" class="btn btn-primary">Details</a>
                </div>
            </div>
        <?php
            }
        }
        ?>
    </div>
</div>