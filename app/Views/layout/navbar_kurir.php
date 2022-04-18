<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container my-2">
      <div class="text-white">
        <i class="fa-solid fa-book fa-lg"></i>
        <a class="fa-solid navbar-brand disabled mx-3">BookStore</a>
      </div>

    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" id="dashboard" href="<?= base_url('kurir')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="dashboard" href="<?= base_url('kurir/data')?>">Daftar Antar</a>
      </ul>
      <!-- user profile -->
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-user-circle fa-lg"></i>
          <?= ucfirst($data['user']); ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="<?= base_url()?>/account/logout">Logout <i class="fa-solid fa-arrow-right-from-bracket float-end"></i></a>
        </div>
      </div>
    </div>
  </div>
</nav>