<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container my-2">
      <div class="text-white">
        <i class="fa-solid fa-book fa-lg"></i>
        <a class="fa-solid navbar-brand disabled mx-3">BookStore</a>
      </div>

    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" id="dashboard" href="<?= base_url('dashboard')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="katalog" href="<?= base_url('katalog') ?>">Katalog Buku</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="kategori" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori Buku
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <!-- get category from database -->
            <?php
            foreach ($data['kategori'] as $book){
              ?>
              <li class="dropdown-item"><a href="<?= base_url(); ?>/katalog/kategori/<?= $book['kategori']; ?>" class="dropdown-item"><?= ucfirst($book['kategori']); ?></a></li>
              <?php
            };
            ?>
          </ul>
        </li>
      </ul>
      <form class="d-flex mx-5" action="<?=base_url('katalog/search')?>" method="POST">
        <input class="form-control me-2" type="search" name="search" placeholder="Cari Buku" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      <!-- user profile -->
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-user-circle fa-lg"></i>
          <?= ucfirst($data['user']); ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="<?= base_url('/account/cart/'),'/',$data['user'] ?>">Keranjang <i class="fa-solid fa-cart-plus float-end"></i></a>
          <a class="dropdown-item" href="<?= base_url()?>/account/search/<?= $data['user']?>">Setting <i class="fa-solid fa-gears float-end"></i></a>
          <a class="dropdown-item" href="<?= base_url()?>/account/logout">Logout <i class="fa-solid fa-arrow-right-from-bracket float-end"></i></a>
        </div>
      </div>
    </div>
  </div>
</nav>