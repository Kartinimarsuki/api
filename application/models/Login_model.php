<?php

class login_model extends CI_Model
{

	public function login_admin()
	{
		$this->load->database();
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Buat query
		$sql = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
		// Eksekusi query
		$hasil = $this->db->query($sql);
		// Tampilkan query
		$data = $hasil->result_array();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// echo $data['0']['password'];
		// die;

		// Jika admin didapat
		if ($data) {
			$info = [
				'username' => $data['0']['username'],
				'nama' => $data['0']['nama']
			];
			$this->session->set_userdata($info);
			redirect('Home_admin');
		} else {
			$this->session->set_flashdata('message2', '<div class="alert alert-danger" role="alert">
			Username atau password anda salah! </div>');
			redirect('Login_admin');
		}
	}
}
