<!-- Book Description -->
<div class="d-flex justify-content-center align-items-center p-5 flex-column" style="height: auto;">
  <div class="card mb-3" style="max-width: 1200px;">
    <!-- Deskripsi Toko -->

  </div>
  <div class="card mb-3" style="max-width: 1200px;">
    <div class="row g-0 align-items-center shadow-sm">
    <?php foreach ($data['buku'] as $buku) {?>
      <div class="col-md-4">
        <img src="<?= $buku['picture'] ?>" class="img-fluid rounded-start">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title"><?= $buku['judul'] ?><span class="text-danger"><?= ' (Stok : ', $buku['stok'],')';?></span></h3>
          <p class="card-text"><?= ucfirst($buku['kategori']) ?></p>
          <p class="card-text"><?=number_format($buku['tebal'])?> halaman</p>
          
          <p class="card-text">Pengarang : <?= $buku['pengarang'] ?></p>
          <p class="card-text">Penerbit/Tahun : <?= $buku['penerbit']?>/<?= $buku['tahun_terbit'] ?></p>
          <p class="card-text">Deskripsi : <?= $buku['deskripsi'] ?></p>
          <div class="float-end" style="height: auto;">
            <label class="card-text text-success align-top mx-3 fs-4">Rp. <?= number_format($buku['harga'])?></label>
            <a data-bs-toggle="modal" href="#orderproduct" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-warning mb-3 shadow" title="Edit Data Buku"><span><i class="fa-solid fa-pen-to-square mx-4"></i></span></a>
            <a data-bs-toggle="modal" href="#deleteproduct" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-danger mb-3 shadow" title="Delete Buku"><span><i class="fa-solid fa-trash-can mx-4"></i></span></a>
          </div>
        </div>
      </div>
      <div class="modal fade" id="orderproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku : <?= $buku['judul'] ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="<?= base_url('admin/edit')?>/<?= $buku['id_buku']?>" method="POST">
                <!-- Judul -->
                <div class="form-group my-2">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $buku['judul'] ?>">
                </div>
                <!-- Kategori -->
                <div class="form-group my-2">
                  <label for="kategori">Kategori</label>
                  <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $buku['kategori'] ?>">
                </div>
                <!-- Pengarang -->
                <div class="form-group my-2">
                  <label for="pengarang">Pengarang</label>
                  <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $buku['pengarang'] ?>">
                </div>
                <!-- Penerbit -->
                <div class="form-group my-2">
                  <label for="penerbit">Penerbit</label>
                  <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku['penerbit'] ?>">
                </div>
                <!-- Tahun Terbit -->
                <div class="form-group my-2">
                  <label for="tahun_terbit">Tahun Terbit</label>
                  <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>">
                </div>
                <!-- Tebal -->
                <div class="form-group my-2">
                  <label for="tebal">Tebal</label>
                  <input type="text" class="form-control" id="tebal" name="tebal" value="<?= $buku['tebal'] ?>">
                </div>
                <!-- Deskripsi -->
                <div class="form-group my-2">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $buku['deskripsi'] ?></textarea>
                </div>
                <!-- Harga -->
                <div class="form-group my-2">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" value="<?= $buku['harga'] ?>">
                </div>
                <!-- Stok -->
                <div class="form-group my-2">
                  <label for="stok">Stok</label>
                  <input type="text" class="form-control" id="stok" name="stok" value="<?= $buku['stok'] ?>">
                </div>
                <!-- Image Link -->
                <div class="form-group my-2">
                  <label for="picture">Image Link</label>
                  <input type="text" class="form-control" id="picture" name="picture" value="<?= $buku['picture'] ?>">
                </div>
                <!-- ID Toko -->
                <div class="form-group my-2">
                  <label for="id_toko">ID Toko</label>
                  <input type="text" class="form-control" id="id_toko" name="id_toko" value="<?= $buku['id_toko'] ?>">
                </div>
                <!-- Submit -->
                <div class="d-grid">
                  <button type="submit" class="btn btn-warning">Edit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="deleteproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Buku</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin ingin menghapus buku ini?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
              <a href="<?= base_url('admin/deletebuku'),'/',$buku['id_buku']; ?>" type="button" class="btn btn-danger">Hapus</a>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="card shadow" style="min-width: 1000px">
    <div class="card-body text-left">
      <?php
      foreach($data['toko'] as $toko){
        ?>
        <h5 class="card-title"><?= $toko['nama_toko'],'</h5>', $toko['alamat']?>
        <p class="card-text"><?= $toko['email'] ?></p>
        <?php
      }
      if ($data['toko'] == null) {
        ?>
        <h5 class="card-title">Toko Tidak Ditemukan</h5>
        <?php
      }
      ?>
    </div>
  </div>
</div>