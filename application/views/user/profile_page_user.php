<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Buronciz</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrapProfile.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styleProfile.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="image/Logojpeg.jpeg">
    <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
    <script src="<?= base_url() ?>assets/jquery-3.6.2.js"></script>
    <script>
        function numberWithCommas(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(".");
        }

        function produk() {
            var Rp = "Rp";
            <?php
            foreach ($data_pesanan as $row) {
                echo '
                 document.getElementById("hargaproduk' . $row['id_transaksi_detail'] . '").innerHTML = Rp.concat(numberWithCommas((' . $row['sub_total'] . ').toFixed(0)));
            ';
            }
            ?>
        }

        function produk2() {
            var Rp = "Rp";
            <?php
            foreach ($data_history as $row) {
                echo '
                 document.getElementById("hargaproduk' . $row['id_transaksi_detail'] . '").innerHTML = Rp.concat(numberWithCommas((' . $row['sub_total'] . ').toFixed(0)));
            ';
            }
            ?>
        }
    </script>
</head>

<body onload="produk(); produk2();">
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img class="img-fluid" src="image/image_user/<?= $data_user[0]['gambar'] ?>" alt="" />
                    <div class="profile-work">
                        <div class="text-center">
                            <?= $this->session->flashdata('message_profilePage'); ?>
                            <a href="<?= base_url('Profile_user_edit') ?>" class="btn btn-outline-dark mt-3" role="button">Edit Profile</a>
                        </div>
                        <h6 class="mb-0"><a href="<?= base_url('Home') ?>" class=""><i class=" fas fa-long-arrow-alt-left me-2"></i>Kembali ke beranda</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-head">
                    <h5>
                        <?= $nama ?>
                    </h5>
                    <h6>
                        <?= $data_user[0]['email'] ?>
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#pesanan" role="tab" aria-controls="pesanan" aria-selected="false">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
                        </li>
                    </ul>
                </div>
                <div class="">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <!-- Data user -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $nama ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $data_user[0]['email'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nomor HP</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $data_user[0]['nomor_hp'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $data_user[0]['alamat'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Kecamatan</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $data_user[0]['kecamatan'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Kelurahan</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $data_user[0]['kelurahan'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Kode Pos</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $data_user[0]['kode_pos'] ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Data pesanan -->
                        <div class="tab-pane fade" id="pesanan" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container">
                                <div class="table-wrap">
                                    <table class="table table-borderless table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="text-muted fw-600">Kode Order</th>
                                                <th class="text-muted fw-600">Nama Produk</th>
                                                <th class="text-muted fw-600">Waktu Transaksi</th>
                                                <th class="text-muted fw-600">Status Pesanan</th>
                                                <th class="text-muted fw-600">Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($data_pesanan as $row)
                                                echo '
                                                <tr class="align-middle alert" role="alert">
                                                    <td>
                                                        <div class="fw-600">' . $row['id_transaksi_detail'] . '</div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <div class="fw-600 pb-1">' . $row['nama_produk'] . '</div>
                                                                <p id="hargaproduk' . $row['id_produk'] . ' class="m-0 text-grey fs-09">' . $row['jumlah_barang'] . ' Produk x Rp' . $row['harga'] . '</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fw-600">' . $row['waktu_transaksi'] . '</div>
                                                    </td>
                                                    <td>
                                                        <div class="fw-600">' . $row['status'] . '</div>
                                                    </td>
                                                    <td>
                                                        <div id="hargaproduk' . $row['id_transaksi_detail'] . '" class="fw-600"></div>
                                                    </td>
                                                </tr>
                                                ';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Data history -->
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container">
                                <div class="table-wrap">
                                    <table class="table table-borderless table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="text-muted fw-600">Kode Order</th>
                                                <th class="text-muted fw-600">Nama Produk</th>
                                                <th class="text-muted fw-600">Waktu Transaksi</th>
                                                <th class="text-muted fw-600">Status Pesanan</th>
                                                <th class="text-muted fw-600">Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($data_history as $row)
                                                echo '
                                                <tr class="align-middle alert" role="alert">
                                                    <td>
                                                        <div class="fw-600">' . $row['id_transaksi_detail'] . '</div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <div class="fw-600 pb-1">' . $row['nama_produk'] . '</div>
                                                                <p id="hargaproduk' . $row['id_produk'] . ' class="m-0 text-grey fs-09">' . $row['jumlah_barang'] . ' Produk x Rp' . $row['harga'] . '</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fw-600">' . $row['waktu_transaksi'] . '</div>
                                                    </td>
                                                    <td>
                                                        <div class="fw-600">' . $row['status'] . '</div>
                                                    </td>
                                                    <td>
                                                        <div id="hargaproduk' . $row['id_transaksi_detail'] . '" class="fw-600"></div>
                                                    </td>
                                                </tr>
                                                ';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>