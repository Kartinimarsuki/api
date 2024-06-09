<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_admin extends CI_Controller
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
		$this->load->model('Home_admin_model');
		// Ambil data dari session
		$info['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$profileadmin['username'] = $info['admin']['username'];
		$profileadmin2['gambar'] = $info['admin']['gambar'];

		$dataUser['dataUser'] = $this->Home_admin_model->getUser();

		$data = $profileadmin + $profileadmin2 + $dataUser;
		$this->load->view('admin/home_admin', $data);
	}
}
