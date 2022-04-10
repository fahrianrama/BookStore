<!-- Book Description -->
<div class="d-flex justify-content-center align-items-center p-5" style="height: auto;">
    <div class="card mb-3" style="max-width: 1200px;">
      <div class="row g-0">
      <?php foreach ($data['buku'] as $buku) {?>
        <div class="col-md-4">
          <img src="<?= $buku['picture'] ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h3 class="card-title"><?= $buku['judul']; ?></h3>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
</div>