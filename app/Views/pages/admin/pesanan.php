<div class="container">
    <h2 class="text-center my-5">Transaksi Customer</h2>
    <div class="d-flex flex-row flex-wrap justify-content-center">
        <?php 
        foreach ($data['transaksi'] as $transaksi){
            $customer = $data['customer']->getCustomerName($transaksi['id_customer']);
            foreach($data['buku'] as $buku) {
                if ($transaksi['id_buku'] == $buku['id_buku'] && $transaksi['status']=='Dibayar'){?>
            <div class="card mx-3 shadow" style="width: 18rem;">
                <img src="<?= $buku['picture'];?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $transaksi['jumlah'],'pcs ',$buku['judul'],' (',strtoupper($transaksi['kurir']),')'; ?></h5>
                    <p class="card-text text-success">Total Transaksi :<br> Rp. <?= number_format($buku['harga']),'*',$transaksi['jumlah'], ' = Rp.',number_format($buku['harga']*$transaksi['jumlah']) ?></p>
                    <p class="card-text">Transaksi oleh : Username(<span class="text-danger"><?= $customer?></span>)</p>
                    <p class="card-text">Alamat : <?= $data['customer']->getCustomerLocation($transaksi['id_customer']) ?></p>
                    <?php
                    if ($transaksi['status'] == 'Dibayar'){?>
                    <div class="d-grid">
                        <button type="button" class="btn btn-success disabled">
                            Terbayar oleh User
                        </button>
                        <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#konfirmasi">
                        Konfirmasi Transaksi 
                        </button>
                    </div>
                    
                    <div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Checkout</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda akan mengkonfirmasi pembayaran transaksi ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <a href="<?= base_url('admin/konfirmasi'),'/',$transaksi['id_transaksi'] ?>" role="button" class="btn btn-success">Konfirmasi</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php } else if ($transaksi['status'] == 'Belum Dibayar'){?>
                        <div class="d-grid">
                        <button class="btn btn-danger my-4" disabled>Belum Terbayar</button>
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