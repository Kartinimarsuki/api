<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/login_page_admin');
		} else {
			// Validasi sukses
			$this->login_admin();
		}
	}

	private function login_admin()
	{
		$this->load->model('login_model');
		$this->login_model->login_admin();
	}

	public function logout_admin()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">
		Anda berhasil logout! </div>');
		redirect('login_admin');
	}
}
