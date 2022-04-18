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
    // auto total
    function totalharga(){
        var jumlah = parseInt(document.getElementById('jumlah').value);
        var harga = parseInt(document.getElementById('harga').value);
        var total = jumlah * harga;
        document.getElementById('total').value = total;
    }
</script>