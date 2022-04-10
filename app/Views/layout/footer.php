<footer class="jumbotron jumbotron-fluid mt-5 mb-0" style="position: absolute; bottom:auto; width:100%;">
    <div class="container text-center">Copyright &copy; <?= Date('Y') ?> BookStore</div>
</footer>
<script>
    $link = document.getElementsByClassName('nav-link');
    for ($i = 0; $i < $link.length; $i++) {
        if ($link[$i].getAttribute('href') == window.location.href) {
            $link[$i].classList.add('active');
        }
    }
</script>