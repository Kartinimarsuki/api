<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda | Buronciz</title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/style2.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
  <link rel="icon" href="<?= base_url() ?>image/Logojpeg.jpeg">
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
  </script>
</head>

<body onload="produk()" class="pp-body">
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
            <a class="nav-link active" href=<?= base_url('home') ?>>Beranda</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href=<?= base_url('produk') ?>>Produk</a>
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

  <!-- Carousel -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/Carousel 1(3).png" alt="CR1" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="image/Carousel 2.png" alt="CR2" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="image/Carousel3.png" alt="CR3" class="d-block w-100">
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>


  <!-- Body -->
  <div class="container-lg mt-5 pb-5">
    <div class="gallery justify-content-center">
      <figure class="gallery__item gallery__item--1 zoom">
        <img src="image/Body2.jpeg" class="gallery__img" alt="">
      </figure>
      <figure class="gallery__item gallery__item--2 zoom">
        <img src="image/Body1.jpeg" class="gallery__img" alt="">
      </figure>
      <figure class="gallery__item gallery__item--3 zoom">
        <img src="image/Body Image2.jpg" class="gallery__img" alt="">
      </figure>
    </div>
  </div>

  <!-- Body2 -->
  <div class="pp-body2-bg">
    <div class="container pb-5 pt-5">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-6 text-center ">
          <img src="image/Logojpeg.jpeg" width="90%" alt="">
        </div>
        <div class="col-md-6">
          <span style="font-weight: 1000; font-size: 29px; color: brown;">Tentang Kami</span>
          <p></p>
          <span style="font-size: 22px;" class="pp-truncating">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, nemo? Repudiandae, inventore possimus? Doloribus soluta earum iure. Hic amet dolor aut culpa, repudiandae, repellendus harum labore vero voluptas quis sapiente! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente aspernatur officiis accusantium, explicabo mollitia neque nemo expedita facere quaerat voluptate voluptatum fuga? Ullam quaerat ducimus beatae minus quae neque odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum qui excepturi accusamus unde soluta eum! Nam cum officia iusto omnis totam ab ducimus, hic exercitationem labore placeat repellendus est quidem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam dolorum iusto id quisquam totam tempora? Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita laborum excepturi modi corporis voluptatibus voluptas a vitae error cupiditate quaerat? Perspiciatis officiis doloremque placeat rem doloribus consequuntur exercitationem repellendus distinctio. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi suscipit similique, eum laboriosam eveniet molestiae non saepe quidem corrupti dicta hic cum totam. Porro est voluptatum hic accusamus sunt! Sint.</span>
          <p></p>
          <a id="tentang" class="nav-link" style="font-weight: 750;" href="tentang.php">Baca Selengkapnya &nbsp;&nbsp; →</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Body3 -->
  <div class="container pt-5">
    <div class="text-center">
      <span style="font-size: 30px; font-weight: bolder;">Produk Andalan Kami</span>
      <p></p>
      <span style="font-style: italic;" class="pp-teks">Buronciz menawarkan produk-produk terbaik di Indonesia. Bahan-bahan pilihan terbaik, tekstur yang seimbang, rasa yang kaya, dan penyajian yang lezat digunakan untuk membuat setiap produk menjadi sempurna.</span>
      <p></p>
      <span style="font-style: italic;" class="pp-teks">
        Buronciz merupakan keseimbangan antara passion dan pekerjaan.
      </span>
    </div>
  </div>

  <!-- Body4 -->
  <div class="shell">
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
</php>