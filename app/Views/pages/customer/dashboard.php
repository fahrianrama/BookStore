<div class="container-fluid my-5">
    <div class="d-flex flex-row flex-wrap justify-content-center">
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $jumlahDataPerHalaman = 8;
        $jumlahData = count($data['buku']);
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $awalData = ($page - 1) * $jumlahDataPerHalaman;
        $akhirData = $page * $jumlahDataPerHalaman;
        $data['buku'] = array_slice($data['buku'], $awalData, $akhirData);
        foreach ($data['buku'] as $data){?>
            <div class="card mx-3 my-4 shadow" style="width: 18rem;">
                <img src="<?= $data['picture'];?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['judul']; ?></h5>
                    <p class="card-subtitle"><?= ucfirst($data['kategori']) ?></p>
                    <p class="card-text text-success">Rp. <?= number_format($data['harga']) ?></p>
                    <?php
                    $string = strip_tags($data['deskripsi']);
                    if (strlen($string) > 100) {

                        // truncate string
                        $stringCut = substr($string, 0, 100);
                        $endPoint = strrpos($stringCut, ' ');

                        //if the string doesn't contain any space then it will cut without word basis.
                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        $string .= ' ...';
                    }
                    echo '<p class-"card-text">',$string,'</p>';
                    ?>
                    <a href="<?= base_url('katalog/detail')?>/<?=$data['id_buku'];?>" class="stretched-link"></a>
                </div>
            </div>
        <?php               
        }
        ?>
    </div>
</div>