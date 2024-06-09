<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | Buronciz</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrapOri.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/style2.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styleProfile.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="<?= base_url() ?>image/Logojpeg.jpeg">
    <script src=<?= base_url("assets/bootstrap.bundle.js") ?>;></script>
    <script src=<?= base_url("assets/select.js") ?>;></script>
</head>

<body>
    <!-- LOGIN PAGE -->
    <form action="<?= base_url() ?>Registrasi/Mendaftar" method="POST" enctype="mulitpart/form-data">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase text-center">Registrasi</h2>
                                <p class="text-white-50 mb-5 text-center">Silahkan isi form registrasi di bawah!</p>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control form-control-lg" value="<?= set_value('nama') ?>" />
                                    <small class="text-danger"><?= form_error('nama') ?></small>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Nomor HP</label>
                                    <input type="text" name="nomorhp" class="form-control form-control-lg" value="<?= set_value('nomorhp') ?>" />
                                    <small class="text-danger"><?= form_error('nomorhp') ?></small>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control form-control-lg" value="<?= set_value('email') ?>" />
                                    <small class="text-danger"><?= form_error('email') ?></small>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Kota/Kabupaten</label>
                                    <br>
                                    <select class="form-select form-control form-control-lg" name="kota">
                                        <option <?php if (isset($_POST['kota']) && $_POST['kota'] == 'Makassar') echo "selected='selected'"; ?>>Makassar</option>
                                        <option <?php if (isset($_POST['kota']) && $_POST['kota'] == 'Maros') echo "selected='selected'"; ?>>Maros</option>
                                        <option <?php if (isset($_POST['kota']) && $_POST['kota'] == 'Gowa') echo "selected='selected'"; ?>>Gowa</option>
                                        <option <?php if (isset($_POST['kota']) && $_POST['kota'] == 'Pangkep') echo "selected='selected'"; ?>>Pangkep</option>
                                    </select>
                                </div>



                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Kecamatan</label>
                                    <input type="text" name="kecamatan" class="form-control form-control-lg" value="<?= set_value('kecamatan') ?>" />
                                    <small class="text-danger"><?= form_error('kecamatan') ?></small>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Kelurahan</label>
                                    <input type="text" name="kelurahan" class="form-control form-control-lg" value="<?= set_value('kelurahan') ?>" />
                                    <small class="text-danger"><?= form_error('kelurahan') ?></small>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Kode Pos</label>
                                    <input type="text" name="kodepos" class="form-control form-control-lg" value="<?= set_value('kodepos') ?>" />
                                    <small class="text-danger"><?= form_error('kodepos') ?></small>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control form-control-lg" value="<?= set_value('alamat') ?>" />
                                    <small class="text-danger"><?= form_error('alamat') ?></small>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password1" class="form-control form-control-lg" />
                                            <small class="text-danger"><?= form_error('password1') ?></small>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Konfirmasi Password</label>
                                            <input type="password" name="password2" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="text-center">
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Registrasi</button>
                                </div>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">Adami akun ta'? <a href="<?= base_url() ?>Login" class="text-white-50 fw-bold">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>