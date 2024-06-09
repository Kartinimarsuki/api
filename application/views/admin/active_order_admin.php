<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Order | Admin</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="<?= base_url() ?>image/Logojpeg.jpeg">
    <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
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
                            <a class="nav-link" href=<?= base_url('Produk_admin') ?>>List Product</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link active" href=<?= base_url('Active_order_admin') ?>>Active Order</a>
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

    <div class="text-start container">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">kode_trasaksi</th>
                    <th scope="col">id_user</th>
                    <th scope="col">nama</th>
                    <th scope="col">ongkir</th>
                    <th scope="col">total_harga</th>
                    <th scope="col">email_user</th>
                    <th scope="col">kota/kabupaten</th>
                    <th scope="col">kode_pos</th>
                    <th scope="col">alamat</th>
                    <th scope="col">waktu_pemesanan</th>
                    <th scope="col">status_pesanan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pesananAktif as $row) {
                    echo '
                    <tr>
                        <td scope="row">' . $row['id_transaksi'] . '</td>
                        <td>' . $row['id_user'] . '</td>
                        <td>' . $row['nama'] . '</td>
                        <td>Rp' . $row['ongkir'] . '</td>
                        <td>Rp' . $row['total_harga'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['Kota_Kabupaten'] . '</td>
                        <td>' . $row['kode_pos'] . '</td>
                        <td>' . $row['alamat'] . '</td>
                        <td>' . $row['waktu_transaksi'] . '</td>
                        <td>' . $row['status'] . '</td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editPesanan' . $row['id_transaksi'] . '">
                                <span class="badge">Edit status</span>
                            </button>
                            <br>
                            <a href="' . base_url() . 'Active_order_admin/getPesanan/' . $row['id_transaksi'] . '" role="button" class="btn btn-primary mt-1">
                                <span class="badge">Periksa pesanan</span>
                            </a>
                        </td>
                     </tr>
                            ';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal edit status pesanan -->
    <?php
    foreach ($pesananAktif as $row) {
        echo '
        <div class="modal fade" id="editPesanan' . $row['id_transaksi'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">EDIT STATUS PESANAN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                    <form action="' . base_url('Active_order_admin/updateStatus') . '" method="POST" enctype="multipart/form-data">
                        <input name="id_transaksi" type="number" value="' . $row['id_transaksi'] . '" hidden>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Status pesanan:</label>
                            <select class="form-select form-control form-control-lg" name="status" id="recipient-name">
                                <option value="Sedang Diproses">Sedang Diproses</option>
                                <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Update</button>
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