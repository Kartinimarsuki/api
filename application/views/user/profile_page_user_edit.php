<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit | Buronciz</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrapProfile.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/styleProfile.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
    <link rel="icon" href="<?= base_url() ?>image/Logojpeg.jpeg">
    <script src="<?= base_url() ?>assets/bootstrap.bundle.js"></script>
    <script src="<?= base_url() ?>assets/jquery-3.6.2.js"></script>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
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

<body>
    <div class="container emp-profile">
        <?= $this->session->flashdata('message_profilePage'); ?>
        <form action="<?= base_url() ?>Profile_user_edit/editData" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img class="img-fluid" id="output" src="<?= base_url('image/image_user/') . $data_user[0]['gambar'] ?>" alt="" />
                        <div class="file btn btn-lg btn-primary mt-3 rounded">
                            Ganti Foto
                            <input type="hidden" type="file" name="gambar_lama" value="<?= $data_user[0]['gambar'] ?>" />
                            <input onchange="loadFile(event)" type="file" name="gambar" />
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
                        </ul>
                    </div>
                    <div class="">
                        <div class="tab-content profile-tab" id="myTabContent">
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
                                        <label class="col-form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $data_user[0]['email'] ?>"></input>
                                        <small class="text-danger"><?= form_error('email'); ?></small>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Nomor HP</label>
                                        <input type="number" name="nomor_hp" class="form-control" value="<?= $data_user[0]['nomor_hp'] ?>"></input>
                                        <small class="text-danger"><?= form_error('nomor_hp') ?></small>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Alamat</label>
                                        <input name="alamat" class="form-control" value="<?= $data_user[0]['alamat'] ?>"></input>
                                        <small class="text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label>Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control" value="<?= $data_user[0]['kecamatan'] ?>"></input>
                                        <small class="text-danger"><?= form_error('kecamatan') ?></small>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Kelurahan</label>
                                        <input type="text" name="kelurahan" class="form-control" value="<?= $data_user[0]['kelurahan'] ?>"></input>
                                        <small class="text-danger"><?= form_error('kelurahan') ?></small>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label>Kode Pos</label>
                                        <input type="number" name="kode_pos" class="form-control" value="<?= $data_user[0]['kode_pos'] ?>"></input>
                                        <small class="text-danger"><?= form_error('kode_pos') ?></small>
                                    </div>
                                </div>
                                <br>
                                <a href="<?= base_url('Profile_user') ?>" type="button" class="btn btn-secondary">Kembali</a>
                                <button type="submit" style="background-color: #fa9b1b;" class="btn">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>