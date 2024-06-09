<?php

class Checkout_user_model extends CI_Model
{
    public function getAlamatUser()
    {
        $this->load->database();
        // Ambil data user
        $id_user = $this->session->userdata('id_user');

        $sql = "SELECT nama, nomor_hp, Kota_Kabupaten, kelurahan, kecamatan, kode_pos, alamat FROM user WHERE id_user = $id_user";

        $hasil = $this->db->query($sql)->result_array();

        return $hasil;
    }

    public function getBelanja()
    {
        $this->load->database();
        // Ambil data user
        $id_user = $this->session->userdata('id_user');

        $sql = "SELECT kd.nama_produk, kd.jumlah_barang, kd.harga_total, pro.deskripsi_produk, pro.id_produk FROM keranjang_detail kd INNER JOIN produk pro ON pro.id_produk = kd.id_produk WHERE id_user = '$id_user'";

        $hasil = $this->db->query($sql)->result_array();

        return $hasil;
    }

    public function getTotalBelanja()
    {
        $this->load->database();
        // Ambil data user
        $id_user = $this->session->userdata('id_user');

        $sql = "SELECT SUM(harga_total) as harga_total FROM keranjang_detail WHERE id_user = $id_user";

        $hasil = $this->db->query($sql)->result_array();
        $hasil2 = $hasil[0]['harga_total'];


        return $hasil2;
    }

    public function gantiAlamat()
    {
        // Koneksi ke database
        $this->load->database();

        // Tangkap data
        $id_user = $this->session->userdata('id_user');
        $nomor_hp = $this->input->post('nomor_hp');
        $alamat = $this->input->post('alamat');
        $kota_kabupaten = $this->input->post('kota_kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $kode_pos = $this->input->post('kode_pos');

        // Validasi form
        $this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('kota_kabupaten', 'kota_kabupaten', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required|trim');
        $this->form_validation->set_rules('kode_pos', 'kode_pos', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message_Checkout', '<div class="alert alert-danger" role="alert">
            Ada kolom yang kosong! </div>');
            return;
        } else {
            $update = "UPDATE user SET nomor_hp='$nomor_hp', alamat='$alamat', kota_kabupaten='$kota_kabupaten', kecamatan ='$kecamatan', kelurahan ='$kelurahan', kode_pos ='$kode_pos'  WHERE id_user='$id_user'";
            $this->db->query($update);
            $this->session->set_flashdata('message_Checkout', '<div class="alert alert-success" role="alert">
            Alamat berhasil diganti! </div>');
            return;
        }
    }

    public function order()
    {
        // Method ambil data tanggal PHP
        date_default_timezone_set('Asia/Jakarta');
        $now = date('y-m-d h:m:s');

        // Ambil data pesanan
        $id_user = $this->session->userdata('id_user');
        $id_pembayaran = 1;
        $ongkir = $this->input->post('ddlselect');
        $total_harga = $this->input->post('subtotal');
        $waktu_transaksi = $now;
        $status = 'Sedang Diproses';


        // Query insert data ke table transaksi
        $sql = "INSERT INTO transaksi (id_user, id_pembayaran, ongkir, total_harga, waktu_transaksi, status)
        VALUES ('$id_user', '$id_pembayaran', '$ongkir' , '$total_harga', '$waktu_transaksi', '$status')";
        $this->db->query($sql);

        // Query ambil max id transaksi dari berdasarkan id_user
        $querymax = "SELECT MAX(id_transaksi) as max FROM transaksi WHERE id_user = '$id_user'";
        $querymax2 = $this->db->query($querymax)->result_array();
        $max = $querymax2[0]['max'];

        // Query insert data ke table transaksi_detail dari table transaksi dan keranjang
        $sql2 = "INSERT INTO transaksi_detail (id_transaksi, id_produk, jumlah_barang, nama_produk, sub_total) SELECT id_transaksi, id_produk, jumlah_barang, nama_produk, harga_total FROM transaksi LEFT JOIN keranjang_detail ON transaksi.id_user = keranjang_detail.id_user WHERE transaksi.id_transaksi = '$max'";
        $this->db->query($sql2);

        // Query hapus data dari keranjang
        $sql3 = "DELETE FROm keranjang_detail WHERE id_user = '$id_user'";
        $this->db->query($sql3);

        return;
    }
}
