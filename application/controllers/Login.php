<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email harus diisi!', 'valid_email' => 'Email anda tidak valid!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password harus diisi!']);
		// Cek Valudasi
		if ($this->form_validation->run() == false) {
			$this->load->view('user/login_page_user');
		} else {
			// Validasi sukses
			$this->login();
		}
	}

	private function login()
	{
		$this->load->database();

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Buat query
		$sql = "SELECT * FROM user WHERE email = '$email'";
		// Eksekusi query
		$hasil = $this->db->query($sql);
		// Tampilkan query
		$data = $hasil->result_array();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// echo $data['0']['is_active'];
		// die;

		// Jika user didapat
		if ($data) {
			// Jika user aktif
			if ($data['0']['is_active'] == 1) {
				if (password_verify($password, $data['0']['password'])) {
					$info = [
						'id_user' => $data['0']['id_user'],
						'email' => $data['0']['email'],
						'nama' => $data['0']['nama']
					];
					$this->session->set_userdata($info);
					// echo '<pre>';
					// print_r($info);
					// echo '</pre>';
					// die;
					redirect('home');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password anda salah! </div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email ini belum di aktivasi! </div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email atau password anda salah! </div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$id_user = $this->session->userdata('id_user');
		$query = "DELETE FROM keranjang_detail WHERE id_user = '$id_user'";
		$this->db->query($query);
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Anda berhasil logout! </div>');
		redirect('login');
	}
}
