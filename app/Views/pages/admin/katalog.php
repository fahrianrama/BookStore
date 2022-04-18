<div class="container-fluid">
    <?php if(isset($data['keyword']))
        {
            echo '<h3 class="text-center my-5">Hasil pencarian untuk "'.$data['keyword'].'"</h3>';
        }
        else if(isset($data['kategori_now'])){
            echo '<h3 class="text-center my-5">Kategori : "'.$data['kategori_now'].'"</h3>';
        }
        else{
            ?>
            <div class="text-center my-5">
                <h3>Katalog Buku
                    <span><a data-bs-toggle="modal" href="#addproduct" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-success" title="Tambahkan Data"><i class="fa-solid fa-plus"></i></a></span>
                </h3>
            </div>
            <?php
        }
        ?>
    <div class="d-flex flex-row flex-wrap justify-content-center ">
    <?php 
        // pagination
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $jumlahDataPerHalaman = 8;
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
<div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/addbuku')?>" method="POST">
                    <!-- Image Link -->
                    <div class="form-group my-2">
                        <label for="picture">Image Link</label>
                        <input type="text" class="form-control" id="picture" name="picture">
                    </div>
                    <!-- Judul -->
                    <div class="form-group my-2">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <!-- Kategori -->
                    <div class="form-group my-2">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori">
                    </div>
                    <!-- Pengarang -->
                    <div class="form-group my-2">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang">
                    </div>
                    <!-- Penerbit -->
                    <div class="form-group my-2">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit">
                    </div>
                    <!-- Tahun Terbit -->
                    <div class="form-group my-2">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit">
                    </div>
                    <!-- Tebal -->
                    <div class="form-group my-2">
                        <label for="tebal">Tebal</label>
                        <input type="text" class="form-control" id="tebal" name="tebal">
                    </div>
                    <!-- Deskripsi -->
                    <div class="form-group my-2">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <!-- Harga -->
                    <div class="form-group my-2">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>
                    <!-- Stok -->
                    <div class="form-group my-2">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok">
                    </div>
                    <!-- ID Toko -->
                    <div class="form-group my-2">
                        <label for="id_toko">ID Toko</label>
                        <input type="text" class="form-control" id="id_toko" name="id_toko">
                    </div>
                    <!-- Submit -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>