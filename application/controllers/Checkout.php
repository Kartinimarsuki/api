<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $id_user = $this->session->userdata('id_user');
        // Cek isi keranjang
        $this->load->model('Cart_user_model');
        $dataKeranjang['keranjang'] = $this->Cart_user_model->getKeranjang($id_user);
        if (!$this->session->userdata('email')) {
            redirect("login");
        } elseif ($dataKeranjang['keranjang'] == 1) {
            redirect('Cart/getKeranjangKosong');
        }
    }

    public function index()
    {
        $info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $namaprofile2['id_user'] = $info['user']['id_user'];

        $this->load->model('Checkout_user_model');
        $infouser['info_user'] = $this->Checkout_user_model->getAlamatUser();
        $infobelanja['info_belanja'] = $this->Checkout_user_model->getBelanja();
        $infototalbelanja['info_total_belanja'] = $this->Checkout_user_model->getTotalBelanja();

        $data = $infouser + $infobelanja + $infototalbelanja + $namaprofile2;
        $this->load->view('user/checkout_user', $data);
    }

    public function gantiAlamat()
    {
        $this->load->model('Checkout_user_model');
        $infouser['info_user'] = $this->Checkout_user_model->gantiAlamat();
        redirect('Checkout');
    }

    public function order()
    {
        $this->load->model('Checkout_user_model');
        $this->Checkout_user_model->order();
        $this->load->view('user/pembayaran_berhasil');
    }
}
