<?php

class Data_jabatan extends CI_Model
{

    //Mengambil semua data yang berada pada data_jabatan
    public function getDataJabatan()
    {
        return $this->db->get('data_jabatan')->result_array(); 
    }

    //Mengambil semua data yang jabatan dengan kd tertentu
    public function getJabatanByID($kdnya)
    {
        return $this->db->get_where('data_jabatan', ['kd_jabatan' => $kdnya])->row_array();
    }

    //Fungsi menambahkan data jabatan baru kedalam database
    public function tambahDataJabatan()
    {
        //Mendapatkan angka kode terakhir kode jabatan untuk mendapatkan kode jabatan kunci baru
        $data_jabatan = $this->db->select('kd_jabatan')->from('data_jabatan')->order_by('kd_jabatan', 'desc')->limit(1)->get()->row_array();
        $jabatan      = substr($data_jabatan['kd_jabatan'],3,1) + 1;
        $key_jabatan  = "KJ-".$jabatan;

        $data = [
            "kd_jabatan" => $key_jabatan,
            "jabatan" => $this->input->post('jabatan', true),
            "gaji" => $this->input->post('gaji', true),
            "komisi" => $this->input->post('komisi', true)
        ];
        $this->db->insert('data_jabatan', $data);

    }

    //Fungsi edit data jabatan
    public function EditDataJabatan($kdnya)
    {
        
        $data = [
            "jabatan" => $this->input->post('jabatan', true),
            "gaji" => $this->input->post('gaji', true),
            "komisi" => $this->input->post('komisi', true)
        ];
        $this->db->where('kd_jabatan',  $kdnya);
        $this->db->update('data_jabatan', $data);

    }

    //Fungsi hapus data jabatan
    public function hapusDataJabatan($kdnya)
    {

        $this->db->where('kd_jabatan', $kdnya);
        $this->db->delete('data_jabatan');
        
    }

}
