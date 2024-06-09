<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		if (!$this->session->userdata('email')) {
			$this->load->view('user_before_login/bl_about');
		} else {
			// Ambil data dari session
			$info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$namaprofile['nama'] =  $info['user']['nama'];
			$namaprofile2['id_user'] = $info['user']['id_user'];
			$namaprofile3['gambar'] = $info['user']['gambar'];

			$this->load->model('produk_user_model');
			$countKeranjang['count'] = $this->produk_user_model->getJumlahProduk();

			$data = $namaprofile + $namaprofile2 + $namaprofile3 + $countKeranjang;
			$this->load->view('user/tentang_user', $data);
		}
	}
}
