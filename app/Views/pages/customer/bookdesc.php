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
          <h3 class="card-title"><?= $buku['judul']; ?></h3>
          <p class="card-text"><?= ucfirst($buku['kategori']) ?></p>
          <p class="card-text"><?=number_format($buku['tebal'])?> halaman</p>
          
          <p class="card-text">Pengarang : <?= $buku['pengarang'] ?></p>
          <p class="card-text">Penerbit/Tahun : <?= $buku['penerbit']?>/<?= $buku['tahun_terbit'] ?></p>
          <p class="card-text">Deskripsi : <?= $buku['deskripsi'] ?></p>
          <div class="float-end" style="height: auto;">
            <label class="card-text text-success align-top mx-3 fs-4">Rp. <?= number_format($buku['harga'])?></label>
            <a data-bs-toggle="modal" href="#orderproduct" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary mb-3 shadow" title="Tambahkan ke Keranjang"><span><i class="fa-solid fa-cart-plus mx-4"></i></span></a>
          </div>
        </div>
      </div>
      <div class="modal fade" id="orderproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pesan Buku : <?= $buku['judul'] ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="<?= base_url('katalog/beli')?>/<?= $buku['id_buku']?>" method="POST">
                <!-- username -->
                <div class="form-group my-2">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" value="<?=$data['user']?>" placeholder="Username" disabled>
                </div>
                <!-- Jumlah -->
                <div class="form-group my-2">
                  <label for="jumlah">Jumlah</label>
                  <input type="number" onblur="totalharga()" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                </div>
                <!-- Harga -->
                <div class="form-group my-2">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" value="<?= $buku['harga']?>" placeholder="Harga" disabled>
                </div>
                <!-- Total -->
                <div class="form-group my-2">
                  <label for="total">Total</label>
                  <input type="text" class="form-control" id="total" name="total" placeholder="Total" disabled>
                </div>
                <!-- Kurir -->
                <div class="form-group my-2">
                  <label for="kurir">Kurir</label>
                  <select class="form-control" id="kurir" name="kurir">
                    <option value="null " disabled>--Pilih Kurir--</option>
                    <option value="jne">JNE</option>
                    <option value="sicepat">SICEPAT</option>
                    <option value="jnt">J&T</option>
                  </select>
                </div>
                <!-- Pembayaran -->
                <div class="form-group mb-5">
                  <label for="pembayaran">Pembayaran</label>
                  <select class="form-control" id="pembayaran" name="pembayaran">
                    <option value="transfer">Transfer</option>
                    <option value="cod">Cash On Delivery</option>
                  </select>
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
      <?php } ?>
    </div>
  </div>
  <div class="card shadow" style="min-width: 1200px">
    <div class="card-body text-left">
      <?php
      foreach($data['toko'] as $toko){
        ?>
        <h5 class="card-title"><?= $toko['nama_toko'],'</h5>', $toko['alamat']?>
        <p class="card-text"><?= $toko['email'] ?></p>
        <?php
      }
      ?>
    </div>
  </div>
</div>