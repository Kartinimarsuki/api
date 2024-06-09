<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_admin extends CI_Controller
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

		// Ambil data produk
		$this->load->model('Produk_admin_model');
		$dataProduk['produk'] = $this->Produk_admin_model->getProduk();

		$data = $profileadmin + $profileadmin2 + $dataProduk;

		$this->load->view('admin/produk_admin', $data);
	}

	public function tambahData()
	{
		$this->load->model('Produk_admin_model');
		$data['produk'] = $this->Produk_admin_model->tambahData();
		redirect('Produk_admin');
	}

	public function hapusData()
	{
		$this->load->model('Produk_admin_model');
		$data['produk'] = $this->Produk_admin_model->hapusData();

		redirect('Produk_admin');
	}

	public function editData()
	{
		$this->load->model('Produk_admin_model');
		$data['produk'] = $this->Produk_admin_model->editData();

		redirect('Produk_admin');
	}
}
