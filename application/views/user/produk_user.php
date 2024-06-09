<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk | Buronciz</title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/style2.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
  <link rel="icon" href="image/Logojpeg.jpeg">
  <style type="text/css">
    ::marker {
      color: #ffe966;
    }
  </style>
  <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
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
  <nav class="navbar navbar-expand-lg navbar-dark pp-nav-bg">
    <div class="container">
      <a class="navbar-brand text-end col-sm-3" href="#">
        <img src="image/Logojpeg.jpeg" width="150">
      </a>

      <!-- tombol collapse -->
      <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-sm-9 text-start" id="collapsibleNavbar">
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

        <!-- Icons -->
        <ul class="ms-3 navbar-nav d-flex flex-row me-1">
          <li class="nav-item me-3 me-lg-0" style="font-size: 21.5px;">
            <a class="nav-link" id="footera" href=<?= base_url('Cart/getKeranjang/' . $id_user . '') ?>>
              <i class="fa fa-cart-shopping"></i>
              <span class='count count-warning' id='lblCartCount'><?= $count ?></span>
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0 nav-item dropdown">
            <a id="footera" class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?= base_url('image/image_user/') . $gambar ?>" class="pp-profile-pict" alt="Avatar"> <?= $nama ?></a>
            <!-- menu dropdown -->
            <ul class="dropdown-menu dropdown-menu-dark text" aria-labelledby="navbarDarkDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="<?= base_url('Profile_user') ?>"><i class="fa fa-user"></i> Profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="<?= base_url('Profile_user') ?>"><i class="fa fa-receipt"></i> Pesanan</a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="Login/logout"><i class="fa fa-power-off"></i> Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Search Bar -->
  <div class="container justify-content-center mt-5">
    <div class="row">
      <div>
        <div class="input-group">
          <input onkeyup="cari_barang()" id="searchbar" type="text" class="form-control input-text" placeholder="Cari Produk...." aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
      </div>
    </div>
  </div>


  <!-- Konten -->
  <div class="mb-5">
    <div class="container">
      <?= $this->session->flashdata('messageTambah'); ?>
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
                  <div class="wcf-right"><a href="' . base_url() . 'Cart/tambahKeranjang/' . $row['id_produk'] . '/' . $row['harga'] . '/' . $id_user . '" class="buy-btn"><i class="fa fa-cart-shopping"></i></a></div>
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
  <div class="pp-footer-bg pt-3 pb-5">
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
            <a id="footera" class="nav-link" href="">Kebijakan Privasi</a>
            <a id="footera" class="nav-link" href="">Syarat dan Ketentuan</a>
            <a id="footera" class="nav-link" href="">Sertifikat Halal</a>
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
</body>

</html>