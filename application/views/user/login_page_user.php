<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Buronciz</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrapOri.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styleProfile.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="image/Logojpeg.jpeg">
    <script src=<?= base_url("assets/bootstrap.bundle.js") ?>;></script>
</head>

<body>
    <!-- LOGIN PAGE -->
    <form action="<?= base_url() ?>login" method="POST" enctype="mulitpart/form-data">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase text-center">Login</h2>
                                <p class="text-white-50 mb-5 text-center">Masukkan username dan password!</p>

                                <?= $this->session->flashdata('message'); ?>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control form-control-lg" value="<?= set_value('email'); ?>" />
                                    <small class="text-danger"><?= form_error('email') ?></small>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg" />
                                    <small class="text-danger"><?= form_error('password') ?></small>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                                <div class="text-center">
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>
                                </div>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">Anda user baru? <a href="<?= base_url() ?>Registrasi" class="text-white-50 fw-bold">Registrasi</a>
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