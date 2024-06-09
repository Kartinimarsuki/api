<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Done_order_admin extends CI_Controller
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

        $this->load->model('Order_admin_model');
        $done_order['done_order'] = $this->Order_admin_model->getPesananSelesai();


        $data = $profileadmin + $profileadmin2 + $done_order;

        $this->load->view('admin/done_order_admin', $data);
    }

    public function getPesananSelesai($id_transaksi)
    {
        $this->load->model('Order_admin_model');
        $pesananSelesaiDetail['pesananSelesaiDetail'] = $this->Order_admin_model->getPesananDoneDetail($id_transaksi);
        $pesananSelesai['pesananSelesai'] = $this->Order_admin_model->getPesananSelesai2($id_transaksi);

        $data = $pesananSelesai + $pesananSelesaiDetail;

        $this->load->view('admin/cek_pesananSelesai_admin', $data);
    }
}
