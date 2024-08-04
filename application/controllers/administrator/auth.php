<?php
class Auth extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Login | Pages';
		$this->load->view('auth/layouts/header', $data);
		$this->load->view('auth/login');
		$this->load->view('auth/layouts/footer');
	}

	public function proses_login()
	{
		$this->load->model('login_model'); // Memuat model login_model

		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => 'Username Wajib diisi'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Password Wajib diisi'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login | Pages';
			$this->load->view('auth/layouts/header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/layouts/footer');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password')); // Gunakan md5 untuk mengenkripsi password

			$cek = $this->login_model->cek_login($username, $password);

			// var_dump($cek);
			// die;

			if (!empty($cek)) {
				// Inisialisasi array sesi sebelum penggunaan
				$data = [
					'username' => $cek['username'],
					'email' => $cek['email'],
					'hak_akses' => $cek['hak_akses'],
					'idu' => $cek['idu'],
				];

				$this->session->set_userdata($data); // Set semua data sesi sekaligus

				if ($data['hak_akses'] == 'admin') {
					redirect('administrator/dashboard');
				} elseif ($data['hak_akses'] == 'guru') {
					redirect('guru/dashboard');
				} elseif ($data['hak_akses'] == 'siswa') {
					redirect('siswa/dashboard'); // Sesuaikan dengan url dashboard siswa
				} else {
					$this->session->set_flashdata('error', 'Username atau Password Salah!');
					redirect('administrator/auth');
				}
			} else {
				$this->session->set_flashdata('error', ' Username atau Password Salah!');
				redirect('administrator/auth');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('hak_akses');
		$this->session->unset_userdata('nis');
		$this->session->unset_userdata('nip');
		$this->session->sess_destroy();
		redirect('/');
	}
}
