<?php

class Produk_admin_model extends CI_Model
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

        // echo '<pre>';print_r($data);echo '</pre>';
        return $data;
    }
    public function tambahData()
    {
        $this->load->database();

        // Tangkap data
        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $desc = $this->input->post('desc');
        $status = $this->input->post('status');
        $gambar = $_FILES['gambar']['name'];

        // Upload File
        $this->load->helper('form');

        $config['upload_path'] = './image/admin_produk';
        $config['allowed_types'] = 'jpg|png|jpeg';

        // Add config to library
        $this->load->library('upload', $config);
        // Validasi form
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required|trim', ['required' => 'Nama produk tidak boleh kosong']);
        $this->form_validation->set_rules('harga', 'harga', 'required|trim', ['required' => 'Nama produk tidak boleh kosong']);
        $this->form_validation->set_rules('desc', 'desc', 'required|trim', ['required' => 'Nama produk tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message_produkAdmin', '<div class="alert alert-danger" role="alert">
            Ada kolom tambah yang kosong! </div>');
            return;
        } else {
            // Upload foto
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('message_produkAdmin', '<div class="alert alert-danger" role="alert">
                File yang diterima hanya jpg/png/jpeg dan File tidak boleh kosong! </div>');
                return;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('admin/produk_admin', $data);
            }

            // End

            // Buat query
            $sql = "INSERT INTO produk(id_produk, nama_produk, harga, deskripsi_produk, gambar, status_ketersediaan)
            values ('', '$nama_produk', '$harga', '$desc', '$gambar', '$status')";

            // Eksekusi
            $this->db->query($sql);
            $this->session->set_flashdata('message_produkAdmin', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah! </div>');
            redirect('produk_admin');
        }
    }

    public function hapusData()
    {
        // Koneksi ke database
        $this->load->database();

        // Tangkap data
        $id_produk = $this->input->get('id_produk');
        $foto_lama = $this->input->get('gambar');

        // Buat query
        $sql = "DELETE FROM produk where id_produk='$id_produk'";

        // Eksekusi
        $this->db->query($sql);

        // Hapus foto
        unlink('image/admin_produk/' . $foto_lama);
        // echo '<pre>';print_r($foto_lama);echo '</pre>'; die;

        $this->session->set_flashdata('message_produkAdmin', '<div class="alert alert-success" role="alert">
		Data berhasil dihapus! </div>');
        redirect('produk_admin');
        return;
    }

    public function editData()
    {
        // Koneksi ke database
        $this->load->database();

        // Tangkap data
        $id_produk = $this->input->post('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $deskripsi_produk = $this->input->post('desc');
        $status = $this->input->post('status');
        $gambar_lama = $this->input->post('gambar_lama');
        $gambar = $_FILES['gambar']['name'];

        // $filename= $_FILES["gambar"]["name"];
        // $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

        // Validasi form
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required|trim', ['required' => 'Nama produk tidak boleh kosong']);
        $this->form_validation->set_rules('harga', 'harga', 'required|trim', ['required' => 'Nama produk tidak boleh kosong']);
        $this->form_validation->set_rules('desc', 'desc', 'required|trim', ['required' => 'Nama produk tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message_produkAdmin', '<div class="alert alert-danger" role="alert">
            Ada kolom edit yang kosong! </div>');
            return;
        } else {
            if ($gambar) {
                // ada foto baru
                // Cek validasi file

                // Upload file
                // S: Upload File
                $this->load->helper('form');
                $config['upload_path']          = 'image/admin_produk';
                $config['allowed_types']        = 'jpg|png|jpeg';
                // var_dump($config['allowed_types']) ; die;
                // Masukkan config ke libary
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message_produkAdmin', '<div class="alert alert-danger" role="alert">
                    File ini tidak boleh diupload! </div>');
                    return;
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->load->view('admin/produk_admin', $data);
                }

                // E: Upload File
                // hapus foto lama
                unlink('image/admin_produk/' . $gambar_lama);
                // Query
                $update = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', deskripsi_produk='$deskripsi_produk', gambar='$gambar', status_ketersediaan='$status' WHERE id_produk='$id_produk'";
                $this->db->query($update);

                $this->session->set_flashdata('message_produkAdmin', '<div class="alert alert-success" role="alert">
                Data berhasil diedit! </div>');

                return;
            } else { //  tidak ada foto baru
                // Buat query
                $update = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', deskripsi_produk='$deskripsi_produk', status_ketersediaan='$status' WHERE id_produk='$id_produk'";
                $this->db->query($update);

                $this->session->set_flashdata('message_produkAdmin', '<div class="alert alert-success" role="alert">
                Data berhasil diedit! </div>');

                return;
            }
        }
    }
}
