<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hubungi | Buronciz</title>
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
            <a class="nav-link" href=<?= base_url('tentang') ?>>Tentang Kami</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link active" href=<?= base_url('hubungi') ?>>Hubungi Kami</a>
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

  <!-- header -->
  <div class="mt-5">
    <div class="text-center">
      <p style="font-size: 72px; font-weight: 1000;">INFO LEBIH LANJUT:</p>
    </div>
  </div>

  <!-- konten -->
  <div class="container2">
    <div class="row">
      <div class="col-sm-6">
        <form action="action_page.php" class="pp-form-warna">
          <div class="text-center">
            <h3>Isi formulir dibawah untuk mengetahui informasi lebih lanjut mengenai Buronciz. CS akan menghubungi anda melalui email</h3>
          </div>
          <br>
          <label class="ms-5" for="nama">Nama Lengkap</label>
          <br>
          <div class="text-center">
            <input type="text" id="nama" name="nama">
          </div>
          <br>
          <label class="ms-5" for="email">Email</label>
          <br>
          <div class="text-center">
            <input type="text" id="email" name="email">
          </div>
          <br>
          <label class="ms-5" for="nomor">Nomor Telepon</label>
          <br>
          <div class="text-center">
            <input type="text" id="nomor" name="nomor">
          </div>
          <br>
          <label class="ms-5" for="pesan">Pesan</label>
          <br>
          <div class="text-center">
            <textarea id="subject" name="subject" placeholder="Tuliskan pesan anda.." style="height:200px"></textarea>
          </div>
          <p></p>
          <input class="ms-5" type="submit" value="Submit">
        </form>
      </div>
      <div class="col-sm-6 text-center">
        <img src="image/Logo_Whatsapp_-_Download_File_Vector_PNG-removebg-preview.png" alt="">
        <p></p>
        <h2>Atau hubungi +6286666111, Customer Service Buronciz akan menghubungi Anda secepatnya!</h2>
        <input id="submit2" type="submit" value="Hubungi Sekarang!">
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