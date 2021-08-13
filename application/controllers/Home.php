<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		//Memanggil model yang dibutuhkan dan melakukan cek apakah session login tersedia
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('data_pegawai');
		$this->auth->cek_login();
	}

	public function index()
	{
		//Mendaftarkan data yang dapat dipanggil untuk view
		$getdata['controller'] = $this->data_pegawai; 
		$getdata['pegawai'] = $this->data_pegawai->getDataPegawai();
		$getdata['listJabatan'] = $this->data_pegawai->getDataJabatan();
		$getdata['pegawai_pria'] = $this->data_pegawai->getPegawaiPria();
		$getdata['pegawai_wanita'] = $this->data_pegawai->getPegawaiWanita();

		//Mengarahkan url untuk load view
		$this->load->view('templates/header');
        $this->load->view('home', $getdata);
        $this->load->view('templates/footer');
	}

	public function view($kdnya)
    {
		//Mendaftarkan data yang dapat dipanggil untuk view
		$getdata['controller'] = $this->data_pegawai; 
		$getdata['pegawai'] = $this->data_pegawai->getDataPegawaiByID($kdnya);
		$getdata['pegawai_pria'] = $this->data_pegawai->getPegawaiPria();
		$getdata['pegawai_wanita'] = $this->data_pegawai->getPegawaiWanita();

		//Mengarahkan url untuk load view
        $this->load->view('lihat-data', $getdata);  
    }

	public function tambah()
    {
		//Mendaftarkan data yang dapat dipanggil untuk view
		$this->data_pegawai->tambahDataPegawai();
        $this->session->set_flashdata('flash', 'Ditambahkan');

		//Redirect halaman menuju home view
		redirect('home');
    }

	public function edit($kdnya)
    {
		//Mengecek ketersediaan data post kd_pegawai dan juga sebagai trigger submit form
		$kode = $this->input->post('kd_pegawai');
		//Mendaftarkan data yang dapat dipanggil untuk view
		$getdata['controller'] = $this->data_pegawai; 
		$getdata['listJabatan'] = $this->data_pegawai->getDataJabatan();
		$getdata['pegawai'] = $this->data_pegawai->getDataPegawaiByID($kdnya);
		$getdata['pegawai_pria'] = $this->data_pegawai->getPegawaiPria();
		$getdata['pegawai_wanita'] = $this->data_pegawai->getPegawaiWanita();
		if ($kode == "") {
        	$this->load->view('edit-data', $getdata);  
		} else {
			//Memanggil Fungsi Edit Data Pegawai & Redirect halaman menuju home view dan memberi flash data
			$this->data_pegawai->EditDataPegawai($kdnya);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('home');
        }
    }

	public function hapus($kdnya)
    {
		//Memanggil Fungsi hapus Data Pegawai & Redirect halaman menuju home view dan memberi flash data
		$this->data_pegawai->hapusDataPegawai($kdnya);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('home');
    }

	


}
