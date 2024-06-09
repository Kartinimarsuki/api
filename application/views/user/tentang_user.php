<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami | Buronciz</title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/style2.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
  <link rel="icon" href="image/Logojpeg.jpeg">
  <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
</head>

<body class="pp-body">
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
            <a class="nav-link" href=<?= base_url('produk') ?>>Produk</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href=<?= base_url('outlet') ?>>outlet</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link active" href=<?= base_url('tentang') ?>>Tentang Kami</a>
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

  <!-- Header -->
  <div>
    <img src="image/tentang/header.jpg" width="1536px" height="582px" alt="">
  </div>

  <!-- Konten -->
  <div class="container mt-5">
    <div class="text-center">
      <h1>Tentang Kami</h1>
      <span style="font: size 15px;">
        Kami adalah perusahaan yang bergerak di bidang kuliner
      </span>
    </div>
  </div>
  <div class="container mt-5 pb-5">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod? Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus id, labore, voluptate saepe quasi debitis deleniti incidunt et non commodi soluta nesciunt ad consequatur, aliquid sed aut. Id, quaerat quod?
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