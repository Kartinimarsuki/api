<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buronciz | Login</title>
        <link rel="stylesheet" href="<?= base_url()?>assets/bootstrapOri.css">
        <link rel="stylesheet" href="<?= base_url()?>assets/fontawesome/css/all.css">
        <link rel="icon" href="image/Logojpeg.jpeg">
        <script src=<?= base_url("assets/bootstrap.bundle.js")?>;></script>
    </head>
    <body style="background-color: orange;">
        <!-- LOGIN PAGE -->
        <form action="<?= base_url()?>login_admin" method="POST" enctype="mulitpart/form-data">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase text-center">Login Admin</h2>
                                    <p class="text-white-50 mb-5 text-center">Masukkan username dan password!</p>
                                    
                                    <?= $this->session->flashdata('message2'); ?>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control form-control-lg">
                                        <small class="text-danger"><?= form_error('username') ?></small>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg" />
                                        <small class="text-danger"><?= form_error('password') ?></small>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>
                                    </div>                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>