<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Load Model Auth
		$this->load->model('auth');
	}

	public function index()
	{
		//Mengarahkan URL untuk view masuk
		$this->load->view('login');
	}

	public function proses()
	{
		//Mendapatkan Data Post Username & Password
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//Jika Username & Password Terdaftar akan diarahkan pada Menu Beranda
		if($this->auth->login_user($username,$password))
		{
			redirect('home');
		}
		//Bila Tidak pengguna akan dialihkan kembali pada halaman login & mengirim flash data bahwa username & password tidak valid
		else
		{
			$this->session->set_flashdata('error','Username & Password salah');
			redirect('login');
		}
	}

	public function logout()
	{
		//Mengosongkan session yang ada & mengarahkan pengguna pada halaman login
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('is_login');
		redirect('login');
	}

	

}
