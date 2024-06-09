<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk | Admin</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="image/Logojpeg.jpeg">
    <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
    <script src="<?= base_url() ?>assets/jquery-3.6.2"></script>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="pp-body">
    <!-- navbar-->
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark pp-nav-bg">
            <div class="container">
                <a class="navbar-brand text-end col-sm-3" href="#">
                    <img src="<?= base_url() ?>image/Logojpeg.jpeg" width="150">
                </a>
                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-sm-9" id="collapsibleNavbar">
                    <ul class="navbar-nav ms-3 pp-nav-fsize">
                        <li class="nav-item me-3">
                            <a class="nav-link" href=<?= base_url('Home_admin') ?>>List User</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link active" href=<?= base_url('Produk_admin') ?>>List Product</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href=<?= base_url('Active_order_admin') ?>>Active Order</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href=<?= base_url('Done_order_admin') ?>>Done Order</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href=<?= base_url('produk') ?>>Feedback User</a>
                        </li>
                    </ul>
                    <ul class="ps-5 navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="footera" class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?= base_url('image/image_admin/') . $gambar ?>" class="pp-profile-pict" alt="Avatar"> <?= $username ?></a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="Login_admin/logout_admin"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <br>
    <div class="container">
        <?= $this->session->flashdata('message_produkAdmin'); ?>
    </div>

    <!-- Button trigger modal -->
    <div class="pt-3 pb-3 container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah
        </button>
    </div>
    <div class="text-center container">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">id_produk</th>
                    <th scope="col">nama produk</th>
                    <th scope="col">harga</th>
                    <th scope="col">deskripsi produk</th>
                    <th scope="col">gambar</th>
                    <th scope="col">status keteresediaan</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($produk as $row) {
                    echo '
                            <tr>
                                <td scope="row">' . $row['id_produk'] . '</td>
                                <td>' . $row['nama_produk'] . '</td>
                                <td>Rp' . $row['harga'] . '</td>
                                <td>' . $row['deskripsi_produk'] . '</td>
                                <td><img src="' . base_url() . 'image/admin_produk/' . $row['gambar'] . '" style="max-width: 200px; max-height: 200px;" alt=""></td>
                                <td>' . $row['status_ketersediaan'] . '</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaledit' . $row['id_produk'] . '">
                                        <span class="badge">Edit</span>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus' . $row['id_produk'] . '">
                                        <span class="badge">Hapus</span>
                                    </button>
                                    <br>
                                </td>
                            </tr>
                            ';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal_Tambah -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">TAMBAH DATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('Produk_admin/tambahData'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama produk:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nama_produk">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Harga:</label>
                            <br>
                            <label for="nmbr">Rp
                                <input type="number" class="" id="nmbr" name="harga" value="">
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Deskripsi produk:</label>
                            <input type="text" class="form-control" id="recipient-name" name="desc">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Status keteresediaan:</label>
                            <select class="form-select form-control form-control-lg" name="status" id="recipient-name">
                                <option value="Ada">Ada</option>
                                <option value="Kosong">Kosong</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Gambar:</label>
                            <input type="file" class="form-control" id="recipient-name" name="gambar">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal_Edit -->
    <?php
    foreach ($produk as $row)
        echo '
            <div class="modal fade" id="modaledit' . $row['id_produk'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">EDIT DATA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="' . base_url('Produk_admin/editData') . '" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_produk" value="' . $row['id_produk'] . '">
                            <input type="hidden" name="gambar_lama" value="' . $row['gambar'] . '">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama produk:</label>
                                    <input type="text" class="" id="recipient-name" name="nama_produk" value="' . $row['nama_produk'] . '">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Harga:</label>
                                    <label for="nmbr">Rp
                                        <input type="number" class="" id="nmbr" name="harga" value="' . $row['harga'] . '">
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Deskripsi produk:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="desc" value="' . $row['deskripsi_produk'] . '">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Status keteresediaan:</label>
                                    <select class="form-select form-control form-control-lg" name="status" id="recipient-name" value="' . $row['status_ketersediaan'] . '">
                                        <option value="Ada">Ada</option>
                                        <option value="Kosong">Kosong</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Gambar:</label>
                                    <br>
                                    <img src="' . base_url() . 'image/admin_produk/' . $row['gambar'] . '" style="max-width: 100px; max-height: 100px;" alt="">
                                    <input type="file" class="form-control" id="recipient-name" name="gambar">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            ';
    ?>

    <!-- Modal_Hapus -->
    <?php
    foreach ($produk as $row) {
        echo '
                <div class="modal fade" id="modalHapus' . $row['id_produk'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span class="" id="staticBackdropLabel">Apakah anda yakin ingin menghapus produk?</span>
                            <form action="' . base_url() . 'Produk_admin/hapusData?id_produk=' . $row['id_produk'] . '&gambar=' . $row['gambar'] . '" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_produk" value="' . $row['id_produk'] . '">
                                <input type="hidden" name="gambar_lama" value="' . $row['gambar'] . '">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            ';
    }
    ?>
</body>

</html>