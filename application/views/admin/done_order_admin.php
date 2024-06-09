<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Done Order | Admin</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="<?= base_url() ?>image/Logojpeg.jpeg">
    <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
    <script>
        function myFunction() {
            document.getElementById("FormIdTrans").submit();
        }
    </script>
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
                            <a class="nav-link" href=<?= base_url('Active_order_admin') ?>>Active Order</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link active" href=<?= base_url('Done_order_admin') ?>>Done Order</a>
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
                    <th scope="col">kode_transaksi</th>
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
                foreach ($done_order as $row) {
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
                            <a href="' . base_url() . 'Done_order_admin/getPesananSelesai/' . $row['id_transaksi'] . '" role="button" class="btn btn-primary mt-1">
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
</body>