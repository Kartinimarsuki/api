<?php
class produk_user_model extends CI_Model
{
    public function getProduk()
    {
        // Koneksi ke database
        $this->load->database();

        // Buat query
        $sql = "SELECT * FROM produk";

        // Eksekusi
        $hasil = $this->db->query($sql);

        // Jabarkan hasil
        $data = $hasil->result_array();

        return $data;
    }

    public function getJumlahProduk()
    {
        // Ambil data user
        $user = $this->session->userdata('id_user');
        // Buat query jumlah_barang di taruh di count keranjang
        $sql = "SELECT SUM(jumlah_barang) as jmlbarang FROM keranjang_detail WHERE id_user = '$user'";
        $hasil = $this->db->query($sql);
        $data = $hasil->result_array();
        $data2 = $data[0]['jmlbarang'];
        if ($data2 == NULL) {
            return 0;
        } else {
            return $data2;
        }
    }

    public function getEditedProduk()
    {
        // Koneksi ke database
        $this->load->database();

        // Tangkap data
        $id_produk = $this->input->get('id_produk');

        // Buat query
        $sql = "SELECT * FROM produk WHERE id";

        // Eksekusi
        $hasil = $this->db->query($sql);

        // Jabarkan hasil
        $data = $hasil->result_array();

        // echo '<pre>';print_r($data);echo '</pre>'; die;
        return $data;
    }
}
