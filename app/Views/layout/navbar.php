<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
            foreach ($data['buku'] as $book){
              ?>
              <li class="dropdown-item"><a href="<?= base_url(); ?>/buku/kategori/<?= $book['kategori']; ?>" class="dropdown-item"><?= ucfirst($book['kategori']); ?></a></li>
              <?php
            };
            ?>
          </ul>
        </li>
      </ul>
      <form class="d-flex mx-5">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      <!-- user profile -->
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-user-circle fa-lg"></i>
          <?= ucfirst($data['user']); ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </div>
    </div>
  </div>
</nav>