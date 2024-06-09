<?php

class Order_admin_model extends CI_Model
{
    public function getPesananAktif()
    {
        // Buat query untuk pesanan user
        $sql = "SELECT * FROM transaksi LEFT JOIN user ON transaksi.id_user = user.id_user
        WHERE transaksi.status = 'Sedang Diproses' OR transaksi.status = 'Dalam Perjalanan';";

        $data = $this->db->query($sql)->result_array();

        return $data;
    }

    public function getPesananAktif2($id_transaksi)
    {
        // Buat query untuk pesanan user
        $sql = "SELECT * FROM transaksi LEFT JOIN user ON transaksi.id_user = user.id_user
       WHERE transaksi.status = 'Sedang Diproses' AND transaksi.id_transaksi = '$id_transaksi' OR transaksi.status = 'Dalam Perjalanan' AND transaksi.id_transaksi = '$id_transaksi';";

        $data = $this->db->query($sql)->result_array();

        return $data;
    }

    public function getPesananAktifDetail($id_transaksi)
    {
        // Buat query untuk pesanan detaiil user
        $sql = "SELECT * FROM transaksi LEFT JOIN transaksi_detail ON transaksi.id_transaksi = transaksi_detail.id_transaksi 
        LEFT JOIN produk ON transaksi_detail.id_produk = produk.id_produk
        LEFT JOIN user ON transaksi.id_user = user.id_user
        WHERE transaksi.status = 'Sedang Diproses' AND transaksi.id_transaksi = '$id_transaksi' OR transaksi.status = 'Dalam Perjalanan' AND transaksi.id_transaksi = '$id_transaksi';";

        $data = $this->db->query($sql)->result_array();

        return $data;
    }

    public function getPesananDoneDetail($id_transaksi)
    {

        // Buat query untuk pesanan detaiil user
        $sql = "SELECT * FROM transaksi LEFT JOIN transaksi_detail ON transaksi.id_transaksi = transaksi_detail.id_transaksi 
        LEFT JOIN produk ON transaksi_detail.id_produk = produk.id_produk
        WHERE transaksi.status = 'Selesai' AND transaksi.id_transaksi = '$id_transaksi';";

        $data = $this->db->query($sql)->result_array();

        return $data;
    }

    public function getPesananSelesai()
    {
        // Buat query untuk pesanan user yang sudah selesai
        $sql = "SELECT * FROM transaksi LEFT JOIN user ON transaksi.id_user = user.id_user
        WHERE transaksi.status = 'Selesai';";

        $data = $this->db->query($sql)->result_array();

        return $data;
    }

    public function getPesananSelesai2($id_transaksi)
    {
        // Buat query untuk pesanan user yang sudah selesai
        $sql = "SELECT * FROM transaksi LEFT JOIN user ON transaksi.id_user = user.id_user
        WHERE transaksi.status = 'Selesai' AND transaksi.id_transaksi = '$id_transaksi';";

        $data = $this->db->query($sql)->result_array();

        return $data;
    }

    public function updateStatus()
    {
        $status = $this->input->post('status');
        $id_transaksi = $this->input->post('id_transaksi');

        $sql = "UPDATE transaksi SET status='$status' WHERE id_transaksi = '$id_transaksi'";
        $this->db->query($sql);
        return;
    }
}
