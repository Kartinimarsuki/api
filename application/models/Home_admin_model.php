<?php

class Home_admin_model extends CI_Model
{
    public function getUser()
    {
        // Ambil data user
        $sql = "SELECT id_user, nama, nomor_hp, email, Kota_Kabupaten, kelurahan, kecamatan, kode_pos, alamat FROM user";
        $data = $this->db->query($sql)->result_array();
        return $data;
    }
}
