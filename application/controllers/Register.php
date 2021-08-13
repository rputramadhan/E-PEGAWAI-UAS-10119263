<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Load Model Auth
		$this->load->model('auth');
	}

	public function index()
	{
		//Mengarahkan URL untuk view registrasi
		$this->load->view('registrasi');
	}

	public function proses()
	{
		//Rules tiap field untuk proses pendaftaran
		$this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|is_unique[tb_user.username]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('nama', 'nama','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run()==true)
	   	{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama = $this->input->post('nama');
			//Memasukan username, password, dan nama kedalam database, Memberikan flashdata pendaftaran berhasil & mengarahkan kehalaman login
			$this->auth->register($username,$password,$nama);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			redirect('masuk');
		}
		else
		{
			//Terdapat rule field yang tidak sesuai,  menampilkan kesalahan berupa flash data dan mengarahkan kehalaman registrasi kembali 
			$this->session->set_flashdata('error', validation_errors());
			redirect('registrasi');
		}
	}
}
