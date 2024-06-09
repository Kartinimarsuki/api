<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pmebayaran Berhasil | Admin</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/styleCheckout.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="<?= base_url() ?>image/Logojpeg.jpeg">
    <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="payment">
                    <div class="payment_header">
                        <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                    </div>
                    <div class="content">
                        <h1>Pembayaran Berhasil!</h1>
                        <p>Silahkan masuk ke halaman profile untuk melihat pesanan anda!</p>
                        <a href="<?= base_url('Profile_user') ?>">Lihat Pesanan</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>