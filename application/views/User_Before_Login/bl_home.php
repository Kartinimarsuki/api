<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda | Buronciz</title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
  <link rel="icon" href="image/Logojpeg.jpeg">
  <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
</head>

<body class="pp-body">
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
          <a id="tentang" class="nav-link" style="font-weight: 750;" href="<?= base_url('Tentang') ?>">Baca Selengkapnya &nbsp;&nbsp; →</a>
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
      <div class="row">
        <div class="col-md-3">
          <div class="wsk-cp-product">
            <div class="wsk-cp-img">
              <a href="#"><img src="image/produk/1.jpeg" alt="Product" class="img-responsive" /></a>
            </div>
            <div class="wsk-cp-text">
              <div class="category">
                <span>Hot Product</span>
              </div>
              <div class="title-product">
                <h3>Ciz Coklat Oreo</h3>
              </div>
              <div class="description-prod">
                <p>Buronciz dengan topik coklat dan oreo pilihan</p>
              </div>
              <div class="card-footer">
                <div class="wcf-left"><span class="price">Rp13.000</span></div>
                <div class="wcf-right"><a href="#" class="buy-btn" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="fa fa-cart-shopping"></i></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="wsk-cp-product">
            <div class="wsk-cp-img">
              <a href="#"><img src="image/produk/2.jpeg" alt="Product" class="img-responsive" />
            </div></a>
            <div class="wsk-cp-text">
              <div class="category">
                <span>Hot Product</span>
              </div>
              <div class="title-product">
                <h3>Ciz Choco Chips</h3>
              </div>
              <div class="description-prod">
                <p>Buronciz dengan topping choco chips plihan terbaik</p>
              </div>
              <div class="card-footer">
                <div class="wcf-left"><span class="price">Rp13.000</span></div>
                <div class="wcf-right"><a href="#" class="buy-btn" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="fa fa-cart-shopping"></i></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="wsk-cp-product">
            <div class="wsk-cp-img">
              <a href=""><img src="image/produk/3.jpeg" alt="Product" class="img-responsive" />
            </div></a>
            <div class="wsk-cp-text">
              <div class="category">
                <span>Hot Product</span>
              </div>
              <div class="title-product">
                <h3>Ciz Aren</h3>
              </div>
              <div class="description-prod">
                <p>Buronciz dengan toppin gula aren pilian yang diimpor langsung dari Afrika</p>
              </div>
              <div class="card-footer">
                <div class="wcf-left"><span class="price">Rp12.000</span></div>
                <div class="wcf-right"><a href="#" class="buy-btn" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="fa fa-cart-shopping"></i></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="wsk-cp-product">
            <div class="wsk-cp-img">
              <a href="#"><img src="image/produk/4.jpeg" alt="Product" class="img-responsive" />
            </div></a>
            <div class="wsk-cp-text">
              <div class="category">
                <span>Hot Product</span>
              </div>
              <div class="title-product">
                <h3>Ciz Red Velvet</h3>
              </div>
              <div class="description-prod">
                <p>Buronciz dengan ras red velvet yang sangat lembut di lidah</p>
              </div>
              <div class="card-footer">
                <div class="wcf-left"><span class="price">Rp13.000</span></div>
                <div class="wcf-right"><a href="#" class="buy-btn" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="fa fa-cart-shopping"></i></a></div>
              </div>
            </div>
          </div>
        </div>
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
</php>