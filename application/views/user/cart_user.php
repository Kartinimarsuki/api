<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang | Buronciz</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrapKeranjang.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/cart.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="<?= base_url() ?>image/Logojpeg.jpeg">
    <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
    <script>
        function numberWithCommas(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(".");
        }

        function getharga() {
            // Untuk barang keranjang
            var Rp = "Rp";
            <?php
            foreach ($keranjang as $row) {
                echo '
                var harga_cart' . $row['id_produk'] . ' = ' . $row['harga_total'] . ';
                document.getElementById("harga_total' . $row['id_produk'] . '").innerHTML = Rp.concat(numberWithCommas((' . $row['harga_total'] . ').toFixed(0)));
                document.getElementById("total_harga_cart").innerHTML = Rp.concat(numberWithCommas((' . $subtotal . ').toFixed(0)));
                ';
            }
            ?>
        }
    </script>
</head>

<body onload="getharga();">
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
                                            <h1 class="fw-bold mb-0 text-black">Keranjang</h1>

                                        </div>

                                        <!-- Barang start -->
                                        <?php
                                        $str = "'value'";
                                        foreach ($keranjang as $row)
                                            // $harga_total = $row['harga_total'];
                                            echo '
                                            <hr class="my-4">

                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="' . base_url() . 'image/produk/' . $row['gambar'] . '" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-black mb-0">' . $row['nama_produk'] . '</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <button class="btn btn-link px-2" onclick="decrement' . $row['id_produk'] . '()">
                                                        <a href="' . base_url() . 'Cart/updateKeranjangKurang/' . $row['id_produk'] . '/' . $id_user . '/' . $row['jumlah_barang'] . '/' . $row['harga_total'] . '">
                                                            <i class="fas fa-minus"></i>
                                                        </a>    
                                                    </button>
    
                                                    <input style="text-align: center;" id="qtyInput' . $row['id_produk'] . '"  min="1" name="quantity" value="' . $row['jumlah_barang'] . '" onchange ="updateInput' . $row['id_produk'] . '(this.value)" type="number" class="form-control form-control-sm" readonly/>
    
                                                    <button class="btn btn-link px-2" onclick="increment' . $row['id_produk'] . '()">
                                                        <a href="' . base_url() . 'Cart/updateKeranjangTambah/' . $row['id_produk'] . '/' . $id_user . '/' . $row['jumlah_barang'] . '/' . $row['harga_total'] . '">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0 cost" id="harga_total' . $row['id_produk'] . '"></h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="' . base_url() . 'Cart/hapusKeranjang/' . $id_user . '/' . $row['id_produk'] . '" class="text-muted">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            ';
                                        ?>


                                        <!-- Barang end -->

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="<?= base_url('Produk') ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Lanjut belanja</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total Harga</h5>
                                            <h5 id="total_harga_cart"></h5>
                                        </div>
                                        <div>
                                            <a style="text-decoration: none;" class="d-grid gap-2" href="<?= base_url('Checkout') ?>">
                                                <button type="Submit" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Checkout</button>
                                            </a>
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