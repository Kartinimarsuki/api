<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan_User | Buronciz</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrapKeranjang.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/cart.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="<?= base_url() ?>image/Logojpeg.jpeg">
    <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
</head>

<body>
    <section class="h-100 h-custom pp-body">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Pesanan</h1>
                                        </div>
                                        <hr class="my-4">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <label>Kode Order:</label>
                                            <p><?= $pesananAktif[0]['id_transaksi'] ?></p>
                                        </div>
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <label>Nama Customer:</label>
                                            <p><?= $pesananAktif[0]['nama'] ?></p>
                                        </div>
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <label>Pesanan:</label>
                                            <?php
                                            foreach ($pesananAktifDetail as $row) {
                                                echo '
                                                <span>' . $row['id_transaksi_detail'] . '. ' . $row['nama_produk'] . ' (' . $row['jumlah_barang'] . ' Produk)</span>
                                                ';
                                            }
                                            ?>
                                        </div>
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="<?= base_url('Active_order_admin') ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Kembali</a></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


</html>