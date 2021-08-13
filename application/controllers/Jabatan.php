<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	function __construct()
	{
		//Memanggil model yang dibutuhkan dan melakukan cek apakah session login tersedia
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('data_jabatan');
		$this->auth->cek_login();
	}

	public function index()
	{
		//Mendaftarkan data yang dapat dipanggil untuk view
		$getdata['controller'] = $this->data_jabatan; 
		$getdata['listJabatan'] = $this->data_jabatan->getDataJabatan();
		
		//Mengarahkan url untuk load view
		$this->load->view('templates/header');
        $this->load->view('jabatan', $getdata);
        $this->load->view('templates/footer');
	}

	public function tambah()
    {
		//Memanggil Fungsi Tambah Data Jabatan & Redirect halaman menuju jabatan view dan memberi flash data
		$this->data_jabatan->tambahDataJabatan();
        $this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('jabatan');
    }

	public function edit($kdnya)
    {
		//Mengecek ketersediaan data post kd_jabatan dan juga sebagai trigger submit form
		$kode = $this->input->post('kd_jabatan');
		//Mendaftarkan data yang dapat dipanggil untuk view
		$getdata['controller'] = $this->data_jabatan; 
		$getdata['jabatan'] = $this->data_jabatan->getJabatanByID($kdnya);
		
		if ($kode == "") {
        	$this->load->view('edit-jabatan', $getdata);  
		} else {
			//Memanggil Fungsi Edit Data Jabatab & Redirect halaman menuju home jabatan dan memberi flash data
			$this->data_jabatan->EditDataJabatan($kdnya);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('jabatan');
        }
    }

	public function hapus($kdnya)
    {
		//Memanggil Fungsi Hapus Data Jabatan & Redirect halaman menuju jabatan view dan memberi flash data
		$this->data_jabatan->hapusDataJabatan($kdnya);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('jabatan');
    }

}
