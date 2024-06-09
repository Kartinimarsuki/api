<?php

class Profile_user_model extends CI_Model
{
    public function getUser()
    {
        // Koneksi ke database
        $this->load->database();

        // id_user
        $id_user = $this->session->userdata('id_user');

        // Buat query
        $sql = "SELECT * FROM user WHERE id_user = '$id_user'";

        // Eksekusi
        $hasil = $this->db->query($sql);

        // Jabarkan hasil
        $data = $hasil->result_array();

        // echo '<pre>';print_r($data);echo '</pre>';
        return $data;
    }

    public function getPesanan()
    {
        // id_user
        $id_user = $this->session->userdata('id_user');

        // Buat query untuk pesanan user
        $sql = "SELECT * FROM transaksi LEFT JOIN transaksi_detail ON transaksi.id_transaksi = transaksi_detail.id_transaksi 
        LEFT JOIN produk ON transaksi_detail.id_produk = produk.id_produk 
        WHERE transaksi.id_user = '$id_user' AND transaksi.status = 'Sedang Diproses' OR transaksi.status = 'Dalam Perjalanan'";

        $data = $this->db->query($sql)->result_array();

        return $data;
    }

    public function getHistory()
    {
        // id_user
        $id_user = $this->session->userdata('id_user');

        // Buat query untuk pesanan user
        $sql = "SELECT * FROM transaksi LEFT JOIN transaksi_detail ON transaksi.id_transaksi = transaksi_detail.id_transaksi 
        LEFT JOIN produk ON transaksi_detail.id_produk = produk.id_produk 
        WHERE transaksi.id_user = '$id_user' AND transaksi.status = 'Selesai'";

        $data = $this->db->query($sql)->result_array();

        return $data;
    }

    public function editData()
    {
        // Ambil data dari session
        $info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $namaprofile['nama'] =  $info['user']['nama'];
        $namaprofile2['id_user'] = $info['user']['id_user'];

        $this->load->model('Profile_user_model');
        $data_user['data_user'] = $this->Profile_user_model->getUser();
        $data = $namaprofile + $namaprofile2 + $data_user;

        $this->load->database();
        $this->load->library('form_validation');

        // tangkap data user
        $email = $this->input->post('email');
        $nomor_hp = $this->input->post('nomor_hp');
        $alamat = $this->input->post('alamat');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $kode_pos = $this->input->post('kode_pos');

        // tangkap data gambar
        $gambar_lama = $this->input->post('gambar_lama');
        $gambar = $_FILES['gambar']['name'];


        // id_user
        $id_user = $this->session->userdata('id_user');

        // Validasi form
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', ['is_unique' => 'Email ini sudah terdaftar', 'required' => 'Kolom ini tidak boleh kosong!']);
        $this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required|trim', ['required' => 'Kolom ini tidak boleh kosong!']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', ['required' => 'Kolom ini tidak boleh kosong!']);
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim', ['required' => 'Kolom ini tidak boleh kosong!']);
        $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required|trim', ['required' => 'Kolom ini tidak boleh kosong!']);
        $this->form_validation->set_rules('kode_pos', 'kode_pos', 'required|trim', ['required' => 'Kolom ini tidak boleh kosong!']);
        // var_dump($this->form_validation->run())
        // die;
        if ($this->form_validation->run() == false) {
            $this->load->view('user/profile_page_user_edit', $data);
        } else {
            if ($gambar && $gambar_lama == "profile.png") {
                // ada gambar baru dan foto masih default
                // Cek validasi file

                // Upload file
                // S: Upload File
                $this->load->helper('form');
                $config['upload_path']          = 'image/image_user';
                $config['allowed_types']        = 'jpg|png|jpeg';
                // var_dump($config['allowed_types']) ; die;
                // Masukkan config ke libary
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message_profilePage', '<div class="alert alert-danger" role="alert">
                    File ini tidak didukung! </div>');
                    redirect('Profile_user_edit');
                } else {
                    $data2 = array('upload_data' => $this->upload->data());
                    $this->load->view('user/profile_page_user_edit', $data2);
                }

                // E: Upload File
                // Query
                $update = "UPDATE user SET email='$email', nomor_hp='$nomor_hp', alamat='$alamat', 
                kecamatan='$kecamatan' , kelurahan='$kelurahan', kode_pos='$kode_pos', gambar='$gambar' WHERE id_user='$id_user'";
                $this->db->query($update);

                $this->session->set_flashdata('message_profilePage', '<div class="alert alert-success" role="alert">
                Profile berhasil diedit! </div>');
                redirect('Profile_user_edit');
            } elseif ($gambar) {
                // ada gambar baru
                // Cek validasi file

                // Upload file
                // S: Upload File
                $this->load->helper('form');
                $config['upload_path']          = 'image/image_user';
                $config['allowed_types']        = 'jpg|png|jpeg';
                // var_dump($config['allowed_types']) ; die;
                // Masukkan config ke libary
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message_profilePage', '<div class="alert alert-danger" role="alert">
                    File ini tidak didukung! </div>');
                    redirect('Profile_user_edit');
                } else {
                    $data2 = array('upload_data' => $this->upload->data());
                    $this->load->view('user/profile_page_user_edit', $data2);
                }

                // E: Upload File
                // hapus gambar lama
                unlink('image/image_user/' . $gambar_lama);
                // Query
                $update = "UPDATE user SET email='$email', nomor_hp='$nomor_hp', alamat='$alamat', 
                kecamatan='$kecamatan' , kelurahan='$kelurahan', kode_pos='$kode_pos', gambar='$gambar' WHERE id_user='$id_user'";
                $this->db->query($update);

                $this->session->set_flashdata('message_profilePage', '<div class="alert alert-success" role="alert">
                Profile berhasil diedit! </div>');
                redirect('Profile_user_edit');
            } else {
                // Tidak ada gambar baru
                $update = "UPDATE user SET email='$email', nomor_hp='$nomor_hp', alamat='$alamat', 
                kecamatan='$kecamatan' , kelurahan='$kelurahan', kode_pos='$kode_pos'  WHERE id_user='$id_user'";

                $this->session->set_flashdata('message_profilePage', '<div class="alert alert-success" role="alert">
                Profile berhasil diedit! </div>');

                $this->db->query($update);
                redirect('Profile_user_edit');
            }
        }
    }
}
