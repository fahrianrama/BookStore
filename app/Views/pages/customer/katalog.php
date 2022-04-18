<div class="container-fluid my-5">
    <?php if(isset($data['keyword']))
        {
            echo '<h3 class="text-center mb-5">Hasil pencarian untuk "'.$data['keyword'].'"</h3>';
        }
        ?>
    <div class="d-flex flex-row flex-wrap justify-content-center">
        <?php 
        // pagination
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $jumlahDataPerHalaman = 16;
        $jumlahData = count($data['buku']);
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $awalData = ($page - 1) * $jumlahDataPerHalaman;
        $akhirData = $page * $jumlahDataPerHalaman;
        $data['buku'] = array_slice($data['buku'], $awalData, $akhirData);
        // end pagination
        foreach($data['buku'] as $data) : ?>
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
                    $string .= '...';
                }
                echo '<p class-"card-text">',$string,'</p>';
                ?>
                <a href="<?= base_url('katalog/detail')?>/<?=$data['id_buku'];?>" class="stretched-link"></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= base_url(); ?>/customer/katalog?page=<?= $page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                    <a class="page-link" href="<?= base_url(); ?>/katalog?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
                <?php endfor; ?>
                <?php if($page < $jumlahHalaman) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= base_url(); ?>/katalog?page=<?= $page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
        
    </div>
</div>