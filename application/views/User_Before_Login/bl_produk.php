<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buronciz | Produk</title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
  <link rel="icon" href="image/Logojpeg.jpeg">
  <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
  <style type="text/css">
    ::marker {
      color: #ffe966;
    }
  </style>
  <script>
    function numberWithCommas(x) {
      var parts = x.toString().split(".");
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      return parts.join(".");
    }

    function produk() {
      var Rp = "Rp";
      <?php
      foreach ($produk as $row) {
        echo '
        var harga_cart' . $row['id_produk'] . ' = ' . $row['harga'] . ';
        document.getElementById("hargaproduk' . $row['id_produk'] . '").innerHTML = Rp.concat(numberWithCommas((' . $row['harga'] . ').toFixed(0)));
      ';
      }
      ?>
    }

    function cari_barang() {
      let input = document.getElementById('searchbar').value
      input = input.toLowerCase();
      let x = document.getElementsByClassName('col-md-3');

      for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
          x[i].style.display = "none";
        } else {
          x[i].style.display = "list-item";
        }
      }
    }
  </script>
</head>


<body class="pp-body" onload="produk()">
  <!-- navbar-->
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark pp-nav-bg">
      <div class="container">
        <a class="navbar-brand text-end col-sm-3" href="#">
          <img src="image/Logojpeg.jpeg" width="150">
        </a>
        <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse col-sm-9" id="collapsibleNavbar">
          <ul class="navbar-nav ms-3 pp-nav-fsize">
            <li class="nav-item me-3">
              <a class="nav-link" href=<?= base_url('home') ?>>Beranda</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link active" href=<?= base_url('produk') ?>>Produk</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href=<?= base_url('outlet') ?>>outlet</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href=<?= base_url('tentang') ?>>Tentang Kami</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href=<?= base_url('hubungi') ?>>Hubungi Kami</a>
            </li>
          </ul>
          <ul class="ps-5 navbar-nav">
            <li class="nav-item" style="font-size: 21.5px;"><a class="nav-link" id="footera" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="fa fa-cart-shopping"></i></a></li>
            <li class="nav-item dropdown">
              <a id="footera" class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="image/image_user/profile.png" class="pp-profile-pict" alt="Avatar"> GUEST</a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="fa-regular fa-user"></i> Profile</a></li>
                <li class="dropdown-divider"></li>
                <li><a class="dropdown-item" href=<?= base_url('Login') ?>><i class="fa fa-power-off"></i> Login</a></li>
              </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Header -->
  <div class="container1">
    <img src="https://cdn-2.tstatic.net/travel/foto/bank/images/kue-pukis.jpg" alt="Snow" style="width: 1536px; height: 720px;">
    <div class="centered">
      <p style="color: #406ca4;">Produk Buronciz</p>
      <p style="font-size: 25px ; color: #482c24;">Produk yang diolah dengan kualitas terbaik</p>
    </div>
  </div>

  <!-- Search Bar -->
  <div class="container justify-content-center mt-5">
    <div class="row">
      <div>
        <div class="input-group mb-3">
          <input onkeyup="cari_barang()" id="searchbar" type="text" class="form-control input-text" placeholder="Cari Produk...." aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
      </div>
    </div>
  </div>


  <!-- Konten -->
  <div>
    <div class="container">
      <div class="row">
        <!-- AWAL CARD -->
        <?php
        foreach ($produk as $row)
          echo '
            <div class="col-md-3">
            <div class="wsk-cp-product">
            ' . $row['id_produk'] . '
              <div class="wsk-cp-img">
                <a href="#"><img src="' . base_url() . 'image/admin_produk/' . $row['gambar'] . '" alt="Product" class="img-responsive" /></a>
              </div>
              <div class="wsk-cp-text">
                <div class="category">
                  <span>' . $row['status_ketersediaan'] . '</span>
                </div>
                <div class="title-product">
                  <h3>' . $row['nama_produk'] . '</h3>
                </div>
                <div class="description-prod">
                  <p>' . $row['deskripsi_produk'] . '</p>
                </div>
                <div class="card-footer">
                  <div class="wcf-left">
                    <span class="price" id="hargaproduk' . $row['id_produk'] . '"></span>
                  </div>
                  <div class="wcf-right"><a href="#" class="buy-btn" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="fa fa-cart-shopping"></i></a></div>
                </div>
              </div>
            </div>
          </div>
          ';
        ?>
        <!-- AKHIR CARD -->
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="pp-footer-bg mt-5" style="height: 400px;">
    <div class="container">
      <div class="row">
        <!-- brand -->
        <div class="col-sm-3 text-start">
          <img src="image/Logojpeg.jpeg" width="125" alt="">
          <p class="pp-footer-fsize">Outlet Utama</p>
          <p></p>
          <p>Jl. Sultan Hasanuddin no. 18
            poros enrekang toraja</p>
        </div>
        <!-- kiri -->
        <div class="col-sm-3 mt-5">
          <p class="pp-footer-fsize">Informasi</p>
          <div>
            <a id="footera" class="nav-link" href="tentang.php">Tentang Buronciz</a>
            <a id="footera" class="nav-link" href="produk.php">Produk Buronciz</a>
            <a id="footera" class="nav-link" href="">Promo Buronciz</a>
            <a id="footera" class="nav-link" href="">Hubungi Buronciz</a>
          </div>
        </div>
        <!-- tengah -->
        <div class="col-sm-3 mt-5">
          <p class="pp-footer-fsize">Legal</p>
          <div>
            <a id="footera" class="nav-link" href="#">Kebijakan Privasi</a>
            <a id="footera" class="nav-link" href="#">Syarat dan Ketentuan</a>
            <a id="footera" class="nav-link" href="#">Sertifikat Halal</a>
          </div>
        </div>
        <!-- kanan -->
        <div class="col-sm-3 mt-5">
          <p class="pp-footer-fsize">Sosial Media</p>
          <div style="font-size: 30px; float: left;">
            <a id="footera" href=""><i class="fa-brands fa-instagram"></i></a>
          </div>
          <div style="font-size: 30px; overflow: auto; margin-left: 50px;">
            <a id="footera" href=""><i class="fa-brands fa-facebook"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Login -->
  <div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span class="" id="staticBackdropLabel">Anda harus login sebelum bisa mengakses fitur ini, apakah anda ingin login?</span>
          <form action="<?= base_url('Login') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Ya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>