<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Active_order_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message2', '<div class="alert alert-danger" role="alert">
			Anda harus login terlebih dahulu! </div>');
            redirect('login_admin');
        }
    }

    public function index()
    {
        // Ambil data dari session
        $info['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $profileadmin['username'] = $info['admin']['username'];
        $profileadmin2['gambar'] = $info['admin']['gambar'];

        // Ambil data pesanan user yang masih dalam proses
        $this->load->model('Order_admin_model');
        $pesananAktif['pesananAktif'] = $this->Order_admin_model->getPesananAktif();

        $data = $profileadmin + $profileadmin2 + $pesananAktif;

        $this->load->view('admin/active_order_admin', $data);
    }

    public function updateStatus()
    {
        $this->load->model('Order_admin_model');
        $this->Order_admin_model->updateStatus();
        redirect('Active_order_admin');
    }

    public function getPesanan($id_transaksi)
    {
        // Ambil data pesanan user yang masih dalam proses
        $this->load->model('Order_admin_model');
        $pesananAktif['pesananAktif'] = $this->Order_admin_model->getPesananAktif2($id_transaksi);
        $pesananAktifDetail['pesananAktifDetail'] = $this->Order_admin_model->getPesananAktifDetail($id_transaksi);

        $data = $pesananAktif + $pesananAktifDetail;
        $this->load->view('admin/cek_pesanan_admin', $data);
    }
}
