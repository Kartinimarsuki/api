<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		if (!$this->session->userdata('email')) {
			// Ambil data produk
			$this->load->model('Produk_user_model');
			$dataProduk['produk'] = $this->Produk_user_model->getProduk();
			$this->load->view('user_before_login/bl_home', $dataProduk);
		} else {
			// Ambil data dari session
			$info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$namaprofile['nama'] =  $info['user']['nama'];
			$namaprofile2['id_user'] = $info['user']['id_user'];
			$namaprofile3['gambar'] = $info['user']['gambar'];

			$this->load->model('Produk_user_model');
			$dataProduk['produk'] = $this->Produk_user_model->getProduk();
			$countKeranjang['count'] = $this->Produk_user_model->getJumlahProduk();


			$data = $namaprofile + $namaprofile2 + $namaprofile3 + $countKeranjang + $dataProduk;
			$this->load->view('user/home_user', $data);
		}
	}
}
