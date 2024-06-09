<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata('email')) {
            $this->load->view('user_before_login/bl_home');
        }
    }

    public function index()
    {

        // Ambil data dari session
        $info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $namaprofile['nama'] =  $info['user']['nama'];
        $this->load->model('Cart_user_model');
        // $dataKeranjang['keranjang'] = $this->Cart_user_model->getKeranjang();
        $this->load->model('Produk_user_model');
        $dataProduk['produk'] = $this->Produk_user_model->getProduk();

        $data = $namaprofile + $dataProduk;
        $this->load->view('user/cart_user', $data);
    }

    public function getKeranjang($id_user)
    {
        // Ambil data dari session
        $info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $namaprofile['nama'] =  $info['user']['nama'];
        $namaprofile2['id_user'] = $info['user']['id_user'];

        // Cek isi keranjang
        $this->load->model('Cart_user_model');
        $dataKeranjang['keranjang'] = $this->Cart_user_model->getKeranjang($id_user);

        if ($dataKeranjang['keranjang'] != 1) {
            // Cek total harga
            $dataHarga['subtotal'] = $this->Cart_user_model->cekTotalHarga($id_user);

            $this->load->model('produk_user_model');
            $dataProduk['produk'] = $this->produk_user_model->getProduk();


            $data = $dataKeranjang + $namaprofile + $namaprofile2 + $dataProduk + $dataHarga;
            $this->load->view('user/cart_user', $data);
        } else {
            redirect('Cart/getKeranjangKosong');
        }
    }

    public function getKeranjangKosong()
    {
        if (!$this->session->userdata('email')) {
            $this->load->view('user_before_login/bl_home');
        } else {
            $this->load->view('user/cart_user_kosong');
        }
    }

    public function tambahKeranjang($id_produk, $harga, $id_user)
    {
        if (!$this->session->userdata('email')) {
            $this->load->view('user_before_login/bl_home');
        } else {
            // Ambil data user
            $info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $namaprofile['nama'] =  $info['user']['nama'];


            // Ambil data keranjang
            $this->load->model('Cart_user_model');
            $this->Cart_user_model->tambahKeranjang($id_produk, $harga, $id_user);
            $dataKeranjang['keranjang'] = $this->Cart_user_model->getKeranjang($id_user);
            // Cek total harga
            $dataHarga['subtotal'] = $this->Cart_user_model->cekTotalHarga($id_user);


            // Ambil data produk
            $this->load->model('produk_user_model');
            $dataProduk['produk'] = $this->produk_user_model->getProduk();


            $data = $dataKeranjang + $dataProduk + $namaprofile + $dataHarga;

            $this->load->view('user/cart_user', $data);
        }
    }

    public function updateKeranjangTambah($id_produk, $id_user, $jumlah_barang, $harga_total)
    {
        if (!$this->session->userdata('email')) {
            $this->load->view('user_before_login/bl_home');
        } else {
            // Update keranjang di database
            $this->load->model('Cart_user_model');
            $this->Cart_user_model->updateKeranjangTambah($id_produk, $id_user, $jumlah_barang, $harga_total);

            // Cek total harga
            $dataHarga['subtotal'] = $this->Cart_user_model->cekTotalHarga($id_user);
            $this->load->view('user/cart_user', $dataHarga);
        }
    }

    public function updateKeranjangKurang($id_produk, $id_user, $jumlah_barang, $harga_total)
    {
        if (!$this->session->userdata('email')) {
            $this->load->view('user_before_login/bl_home');
        } else {
            // Update keranjang di database
            $this->load->model('Cart_user_model');
            $this->Cart_user_model->updateKeranjangKurang($id_produk, $id_user, $jumlah_barang, $harga_total);

            // Cek total harga
            $dataHarga['subtotal'] = $this->Cart_user_model->cekTotalHarga($id_user);
            $this->load->view('user/cart_user', $dataHarga);
        }
    }

    public function hapusKeranjang($id_user, $id_produk)
    {
        if (!$this->session->userdata('email')) {
            $this->load->view('user_before_login/bl_home');
        } else {
            $this->load->model('Cart_user_model');
            $this->Cart_user_model->hapusKeranjang($id_user, $id_produk);
        }
    }
}
