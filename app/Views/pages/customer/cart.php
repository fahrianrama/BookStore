<div class="container my-5">
    <h2 class="text-center mb-5">Keranjang Customer : <?= ucfirst($data['user'])?></h2>
    <div class="d-flex flex-row justify-content-center">
        <?php 
        foreach ($data['transaksi'] as $transaksi){
            foreach($data['buku'] as $buku) {
                if ($transaksi['id_buku'] == $buku['id_buku']){
                ?>
            <div class="card mx-3 shadow" style="width: 18rem;">
                <img src="<?= $buku['picture'];?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $transaksi['jumlah'],'pcs ',$buku['judul'],' (',strtoupper($transaksi['kurir']),')'; ?></h5>
                    <p class="card-text text-success">Total Transaksi :<br> Rp. <?= number_format($buku['harga']),'*',$transaksi['jumlah'], ' = Rp.',number_format($buku['harga']*$transaksi['jumlah']) ?></p>
                    <!-- data transfer bank -->
                    <p class="card-text text-danger">
                        Transfer sesuai nominal ke : 1241221512(BRI) melalui rekening <?= $data['bank']?> Anda.
                    </p>
                    <?php
                    if ($transaksi['status'] == 'Belum Dibayar'){?>
                    <div class="d-grid">
                        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#checkout">
                        Selesaikan Transaksi 
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                        Batalkan Transaksi
                        </button>
                    </div>
                    <div class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Checkout</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin telah melakukan pembayaran dan melakukan checkout?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <a href="<?= base_url('account/konfirmasi'),'/',$transaksi['id_transaksi'] ?>" role="button" class="btn btn-success">Konfirmasi</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembatalan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin akan membatalkan pesanan?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
                                <a href="<?= base_url('account/batal'),'/',$transaksi['id_transaksi'] ?>" role="button" class="btn btn-danger">Konfirmasi</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php } else if ($transaksi['status'] == 'Dibayar'){?>
                    <div class="d-grid">
                        <?php
                        if ($transaksi['jenis_pembayaran'] == 'cod'){?>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                Batalkan Transaksi
                            </button>
                            <button type="button" class="btn btn-secondary disabled my-2">
                            Menunggu Konfirmasi
                            </button>
                        <?php }else{?>
                            <button type="button" class="btn btn-secondary disabled my-4">
                            Menunggu Konfirmasi
                            </button>
                        <?php }?>
                    </div>
                    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembatalan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin akan membatalkan pesanan?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
                                <a href="<?= base_url('account/batal'),'/',$transaksi['id_transaksi'] ?>" role="button" class="btn btn-danger">Konfirmasi</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php } else if($transaksi['status'] == 'Dibatalkan'){?>
                    <div class="d-grid">
                        <button type="button" class="btn btn-danger my-4" disabled>
                        Transaksi Dibatalkan
                        </button>
                    </div>
                    <?php }else if($transaksi['status'] == 'Dikonfirmasi'){?>
                    <div class="d-grid">
                        <button type="button" class="btn btn-primary my-4" disabled>
                            Transaksi Dikonfirmasi
                        </button>
                    </div>
                    <?php }else{?>
                    <div class="d-grid">
                        <button type="button" class="btn btn-info my-4" disabled>
                            Pesanan Diantar
                        </button>
                    </div>
                    <?php }?>
                </div>
                <div class="card-footer">
                    <p class="card-text text-dark">Transaksi dibuat pada <?= $transaksi['tanggal_transaksi']?></p>
                </div>
            </div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>