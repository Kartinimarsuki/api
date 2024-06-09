<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		// $this->load->model('M_Home');
	}

	public function index()
	{
		$this->load->view('user/registration_page_user');
	}

	public function Mendaftar()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama harus diisi!']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email ini sudah terdaftar', 'required' => 'Email harus diisi!']);
		$this->form_validation->set_rules('nomorhp', 'Nomor HP', 'required|trim|min_length[11]|max_length[13]', ['required' => 'Nomor HP harus diisi!']);
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim', ['required' => 'Kelurahan harus diisi!']);
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim', ['required' => 'Kecamatan harus diisi!']);
		$this->form_validation->set_rules('kodepos', 'Kode Pos', 'required|trim', ['required' => 'Kode pos harus diisi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi!']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', ['required' => 'Password harus diisi!', 'matches' => 'Password tidak sama!', 'min_length' => 'Password terlalu pendek!']);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('user/registration_page_user');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'nomor_hp' => htmlspecialchars($this->input->post('nomorhp', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'Kota_Kabupaten' => htmlspecialchars($this->input->post('kota', true)),
				'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
				'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
				'kode_pos' => htmlspecialchars($this->input->post('kodepos', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'gambar' => 'profile.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'is_active' => 1
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Registrasi Berhasil! Silahkan Login! </div>');
			redirect('login');
		}
	}
}
