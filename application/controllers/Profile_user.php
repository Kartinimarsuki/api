<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
    }

    public function index()
    {
        // Ambil data dari session
        $info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $namaprofile['nama'] =  $info['user']['nama'];
        $namaprofile2['id_user'] = $info['user']['id_user'];

        $this->load->model('Profile_user_model');
        $data_user['data_user'] = $this->Profile_user_model->getUser();
        $data_pesanan['data_pesanan'] = $this->Profile_user_model->getPesanan();
        $data_history['data_history'] = $this->Profile_user_model->getHistory();


        $data = $namaprofile + $namaprofile2 + $data_user + $data_pesanan + $data_history;

        $this->load->view('user/profile_page_user', $data);
    }
}
