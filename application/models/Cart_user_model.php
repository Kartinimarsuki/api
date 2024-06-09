<?php
class Cart_user_model extends CI_Model
{
    public function tambahKeranjang($id_produk, $harga, $id_user)
    {
        // Koneksi ke database
        $this->load->database();

        // Tangkap data gambar
        $gambar = "SELECT gambar from produk WHERE id_produk='$id_produk'";
        $gambarupload = $this->db->query($gambar);
        $gambararray = $gambarupload->result_array();
        $gambarfix = $gambararray[0]['gambar'];

        // Tangkap data produk
        $nama_produk = "SELECT nama_produk from produk WHERE id_produk='$id_produk'";
        $produkupload = $this->db->query($nama_produk);
        $produkarray = $produkupload->result_array();
        $produkfix = $produkarray[0]['nama_produk'];

        // Query cek ketersediaan barang
        $sql = "SELECT status_ketersediaan FROM produk WHERE status_ketersediaan = 'kosong' AND id_produk ='$id_produk'";
        $hasil = $this->db->query($sql);
        $kosong = $hasil->result_array();

        // Tangkap data user
        $user = $this->session->userdata('id_user');

        // Query cek barang duplikat
        $sqlDuplicate = "SELECT id_produk from keranjang_detail WHERE id_produk='$id_produk' AND id_user = '$id_user'";
        $cekDuplicate = $this->db->query($sqlDuplicate);
        $apakahAda = $cekDuplicate->result_array();

        if ($apakahAda) {
            // $hargaFix = "SELECT harga from produk WHERE id_produk = '$id_produk'";
            // $hargaFix2 = $this->db->query($hargaFix);
            // $hargaFixFix = $hargaFix2->result_array();
            // $hargaFixBanget = $hargaFixFix[0]['harga'];

            // $sql = "UPDATE keranjang_detail SET jumlah_barang = jumlah_barang + 1, harga_total = harga_total + $hargaFixBanget WHERE id_produk='$id_produk' AND id_user = '$id_user'";
            // $this->db->query($sql);

            $this->session->set_flashdata('messageTambah', '<div class="alert alert-danger" role="alert">
			Barang sudah ada dikeranjang! </div>');
            redirect('Produk');
        } else if ($kosong) {
            $this->session->set_flashdata('messageTambah', '<div class="alert alert-danger" role="alert">
			Barang ini sedang kosong! </div>');
            redirect('Produk');
        } else {
            // Query masukkan data
            $sql = "INSERT INTO keranjang_detail(id_keranjang_detail, id_user, id_produk, nama_produk, jumlah_barang, harga_total, waktu_ditambahkan, gambar)
            values ('', '$user', '$id_produk', '$produkfix', '1', '$harga', 'GETDATE()', '$gambarfix')";

            // Eksekusi
            $this->db->query($sql);

            $this->session->set_flashdata('messageTambah', '<div class="alert alert-success" role="alert">
            Barang berhasil ditambah ke keranjang! </div>');
            redirect('Produk');
        }

        // echo '<pre>';
        // print_r($apakahAda);
        // echo '</pre>';
        // die;
    }

    public function getKeranjang($id_user)
    {
        // Koneksi ke database
        $this->load->database();

        // Buat query
        $sql = "SELECT pro.id_produk, pro.nama_produk, pro.harga,  kd.* FROM keranjang_detail kd INNER JOIN produk pro ON pro.id_produk = kd.id_produk WHERE id_user = '$id_user'";

        // Eksekusi
        $hasil = $this->db->query($sql);

        // Jabarkan hasil
        $data = $hasil->result_array();
        // echo '<pre>';
        // print_r(count($data));
        // echo '</pre>';
        // die;
        if (count($data) == 0) {
            return 1;
        } else {
            // echo '<pre>';print_r($sql);echo '</pre>'; die;
            return $data;
        }
    }

    public function updateKeranjangTambah($id_produk, $id_user, $jumlah_barang, $harga_total)
    {
        // Koneksi ke database
        $this->load->database();

        $inputHarga = "SELECT harga FROM produk WHERE id_produk = '$id_produk'";
        $hasil = $this->db->query($inputHarga);
        $data = $hasil->result_array();
        $data2 = $data[0]['harga'];


        $sql = "UPDATE keranjang_detail SET jumlah_barang = $jumlah_barang + 1 , harga_total = $harga_total + $data2 WHERE id_produk='$id_produk' AND id_user = '$id_user'";

        $this->db->query($sql);

        redirect('Cart/getKeranjang/' . $id_user . '');
    }

    public function updateKeranjangKurang($id_produk, $id_user, $jumlah_barang, $harga_total)
    {
        // Koneksi ke database
        $this->load->database();

        $inputHarga = "SELECT harga FROM produk WHERE id_produk = '$id_produk'";
        $hasil = $this->db->query($inputHarga);
        $data = $hasil->result_array();
        $data2 = $data[0]['harga'];

        $queryjmlbarang = "SELECT jumlah_barang FROM keranjang_detail WHERE id_produk = '$id_produk' AND id_user = '$id_user'";
        $exc = $this->db->query($queryjmlbarang);
        $datajmlbarang = $exc->result_array();

        // echo '<pre>';
        // print_r($datajmlbarang[0]['jumlah_barang']);
        // echo '</pre>';
        // die;

        if ($datajmlbarang[0]['jumlah_barang'] <= 1) {
            $sql = "DELETE FROM keranjang_detail WHERE id_user = '$id_user' AND id_produk = '$id_produk'";
            $this->db->query($sql);
            redirect('Cart/getKeranjang/' . $id_user . '');
        } else {
            $sql = "UPDATE keranjang_detail SET jumlah_barang = $jumlah_barang - 1 , harga_total = $harga_total - $data2 WHERE id_produk='$id_produk' AND id_user = '$id_user'";
            $this->db->query($sql);
            redirect('Cart/getKeranjang/' . $id_user . '');
        }
    }

    public function hapusKeranjang($id_user, $id_produk)
    {
        // Koneksi ke database
        $this->load->database();
        $sql = "DELETE FROM keranjang_detail WHERE id_user = '$id_user' AND id_produk = '$id_produk'";
        $this->db->query($sql);
        redirect('Cart/getKeranjang/' . $id_user . '');
    }

    public function cekTotalHarga($id_user)
    {
        // Cek total harga
        $sql = "SELECT SUM(harga_total) as harga_total FROM keranjang_detail WHERE id_user = '$id_user'";
        $hasil2 = $this->db->query($sql);
        $data3 = $hasil2->result_array();
        $data4 = $data3[0]['harga_total'];

        return $data4;
    }
}
