<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Buronciz</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrapCheckout.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/style2.css">
    <link rel="icon" href="image/Logojpeg.jpeg">
    <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
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
    <script>
        function numberWithCommas(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(".");
        }

        let harga;
        var subtotal;

        function getddl() {
            harga = (parseInt(document.getElementById("info_harga_total").innerHTML) + parseInt(formid.ddlselect[formid.ddlselect.selectedIndex].value));
            document.getElementById("harga_total_input").setAttribute("value", harga);
            var harga2 = parseInt(formid.ddlselect[formid.ddlselect.selectedIndex].value);
            var Rp = "Rp";
            if (isNaN(harga) == true) {
                harga = '-';
                harga2 = '-';
                document.getElementById("harga_total").innerHTML = harga;
                document.getElementById("pengiriman").innerHTML = harga2;
            } else {
                document.getElementById("harga_total").innerHTML = Rp.concat(numberWithCommas((harga).toFixed(0)));
                document.getElementById("pengiriman").innerHTML = Rp.concat(numberWithCommas((harga2).toFixed(0)));
            }
        }

        function getddl2() {
            // Untuk barang keranjang
            var Rp = "Rp";
            <?php
            foreach ($info_belanja as $row) {
                echo '
                var harga_cart' . $row['id_produk'] . ' = ' . $row['harga_total'] . ';
                document.getElementById("harga_total_cart' . $row['id_produk'] . '").innerHTML = Rp.concat(numberWithCommas((' . $row['harga_total'] . ').toFixed(0)));
                ';
            }
            ?>
        }
    </script>
</head>

<body onload="getddl2()">
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark pp-nav-bg">
            <div class="container">
                <a class="navbar-brand text-end col-sm-3" href="#">
                    <img src="image/Logojpeg.jpeg" width="150">
                </a>
        </nav>
    </div>
    <div class="container">
        <div class="py-5 text-start">
            <h2>Checkout</h2>
        </div>
        <div>
            <?= $this->session->flashdata('message_Checkout'); ?>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Pilih Kurir</span>
                </h4>
                <p id="info_harga_total" hidden><?= $info_total_belanja ?></p>
                <form name="formid" action="<?= base_url() ?>Checkout/order" method="POST" enctype="multipart/form-data">
                    <select class="form-select" aria-label="Default select example" name="ddlselect" onchange="getddl()" required oninvalid="this.setCustomValidity('Harap pilih salah satu pengiriman yang tersedia')" oninput="this.setCustomValidity('')">
                        <option value="">Pengiriman</option>
                        <option value="5000">Reguler (Rp5.000)</option>
                        <option value="25000">Next day (Rp25.000)</option>
                        <option value="50000">Express today (Rp50.000)</option>
                    </select>

                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Keranjang Anda</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        foreach ($info_belanja as $row) {
                            echo '
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">' . $row['nama_produk'] . ' (' . $row['jumlah_barang'] . ' produk)</h6>
                                        <small class="text-muted">' . $row['deskripsi_produk'] . '</small>
                                    </div>
                                    <span id="harga_total_cart' . $row['id_produk'] . '" class="text-muted"></span>
                                </li>
                                    ';
                        }
                        ?>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Biaya Pengiriman</h6>
                            </div>
                            <span id="pengiriman" class="text-muted">-</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Belanja</span>
                            <input name="subtotal" id="harga_total_input" type="text" value="0" hidden>
                            <strong id="harga_total">-</strong>
                        </li>
                    </ul>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </div>
                </form>
            </div>

            <div class=" col-md-8 order-md-1">
                <h4 class="mb-3">Alamat Pengiriman</h4>
                <?php
                foreach ($info_user as $row) {
                    echo '
                    <div style="list-style-type: none;">
                    <li class="fw-bold">' . $row['nama'] . '</li>
                    <li>' . $row['nomor_hp'] . '</li>
                    <li>' . $row['alamat'] . '</li>
                    <li>' . $row['kecamatan'] . ', ' . $row['Kota_Kabupaten'] . ', ' . $row['kode_pos'] . '</li>
                    </div>
                    ';
                }
                ?>
                <br>
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#gantiAlamat">
                    Ganti Alamat
                </button>
                <hr style="opacity: 1;" class="mb-4">
            </div>
        </div>
        <div class="">
            <h6 class="mb-0"><a href="<?= base_url('Cart/getKeranjang/' . $id_user . '') ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Kembali ke Keranjang</a></h6>
        </div>
    </div>

    <!-- Modal Ganti Alamat -->
    <?php
    foreach ($info_user as $row) {
        echo '
        <div class="modal fade" id="gantiAlamat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">GANTI ALAMAT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="' . base_url('Checkout/gantiAlamat') . '" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nomor HP:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nomor_hp" value="' . $row['nomor_hp'] . '">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Alamat:</label>
                            <input type="text" class="form-control" id="recipient-name" name="alamat" value="' . $row['alamat'] . '">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kota/Kabupaten:</label>
                            <input type="text" class="form-control" id="recipient-name" name="kota_kabupaten" value="' . $row['Kota_Kabupaten'] . '">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kecamatan:</label>
                            <input type="text" class="form-control" id="recipient-name" name="kecamatan" value="' . $row['kecamatan'] . '">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kelurahan:</label>
                            <input type="text" class="form-control" id="recipient-name" name="kelurahan" value="' . $row['kelurahan'] . '">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kode Pos:</label>
                            <input type="number" class="form-control" id="recipient-name" name="kode_pos" value="' . $row['kode_pos'] . '">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Update</button>
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