<?php

class Data_pegawai extends CI_Model
{
    //Mengambil semua data pegawai
    public function getDataPegawai()
    {
        return $this->db->get('data_pegawai')->result_array(); 
    }

    //Mengambil semua data jabatan
    public function getDataJabatan()
    {
        return $this->db->get('data_jabatan')->result_array(); 
    }

    //Mengambil semua data berdasarkan kode tertentu
    public function getDataPegawaiByID($kdnya)
    {
        return $this->db->get_where('data_pegawai', ['kd_pegawai' => $kdnya])->row_array();
    }

    public function getJabatanByID($kdnya)
    {
        return $this->db->get_where('data_jabatan', ['kd_jabatan' => $kdnya])->row_array();
    }

    public function getKewarganegaraanByID($kdnya)
    {
        return $this->db->get_where('data_kewarganegaraan', ['kd_kewarganegaraan' => $kdnya])->row_array();
    }

    public function getPGajiByID($kdnya)
    {
        return $this->db->get_where('data_pembayaran_gaji', ['kd_pembayaran_gaji' => $kdnya])->row_array();
    }

    public function getRPekerjaanByID($kdnya)
    {
        return $this->db->get_where('data_riwayat_pekerjaan', ['kd_riwayat_pekerjaan' => $kdnya])->row_array();
    }

    public function getRPendidikanByID($kdnya)
    {
        return $this->db->get_where('data_riwayat_pendidikan', ['kd_riwayat_pendidikan' => $kdnya])->row_array();
    }

    //Memanggil data dengan jenis kelamin tertentu pada table data_pegawai
    public function getPegawaiPria()
    {
        return $this->db->get_where('data_pegawai', ['jenis_kelamin' => 'Pria'])->result_array();
    }

    public function getPegawaiWanita()
    {
        return $this->db->get_where('data_pegawai', ['jenis_kelamin' => 'Wanita'])->result_array();
    }

    //Fungsi menambahkan data pegawai baru kedalam database
    public function tambahDataPegawai()
    {
        //Mengambil data terakhir masing masing relasi tabel yang diperlukan untuk menentukan kode key tiap tiap table
        $data_pegawai            = $this->db->select('kd_pegawai')->from('data_pegawai')->order_by('kd_pegawai', 'desc')->limit(1)->get()->row_array();
        $data_kewarganegaraan    = $this->db->select('kd_kewarganegaraan')->from('data_kewarganegaraan')->order_by('kd_kewarganegaraan', 'desc')->limit(1)->get()->row_array();
        $data_pembayaran_gaji    = $this->db->select('kd_pembayaran_gaji')->from('data_pembayaran_gaji')->order_by('kd_pembayaran_gaji', 'desc')->limit(1)->get()->row_array();
        $data_riwayat_pendidikan = $this->db->select('kd_riwayat_pendidikan')->from('data_riwayat_pendidikan')->order_by('kd_riwayat_pendidikan', 'desc')->limit(1)->get()->row_array();
        $data_riwayat_pekerjaan  = $this->db->select('kd_riwayat_pekerjaan')->from('data_riwayat_pekerjaan')->order_by('kd_riwayat_pekerjaan', 'desc')->limit(1)->get()->row_array();

        $pegawai            = substr($data_pegawai['kd_pegawai'],4,1) + 1;
        $kewarganegaraan    = substr($data_kewarganegaraan['kd_kewarganegaraan'],4,1) + 1;
        $pembayaran_gaji    = substr($data_pembayaran_gaji['kd_pembayaran_gaji'],4,1) + 1;
        $riwayat_pendidikan = substr($data_riwayat_pendidikan['kd_riwayat_pendidikan'],4,1) + 1;
        $riwayat_pekerjaan  = substr($data_riwayat_pekerjaan['kd_riwayat_pekerjaan'],4,1) + 1;

        $key_pegawai            = "KPE-".$pegawai;
        $key_kewarganegaraan    = "KKW-".$kewarganegaraan;
        $key_pembayaran_gaji    = "KPG-".$pembayaran_gaji;
        $key_riwayat_pendidikan = "KPD-".$riwayat_pendidikan;
        $key_riwayat_pekerjaan  = "KRJ-".$riwayat_pekerjaan;

        $data = [
            "kd_kewarganegaraan" => $key_kewarganegaraan,
            "nik_ktp" => $this->input->post('nik_ktp', true),
            "nama_ktp" => $this->input->post('nama_ktp', true),
            "alamat_ktp" => $this->input->post('alamat_ktp', true),
            "kodepos_ktp" => $this->input->post('kodepos_ktp', true)
        ];
        $this->db->insert('data_kewarganegaraan', $data);

        $data = [
            "kd_riwayat_pendidikan" => $key_riwayat_pendidikan,
            "pendidikan_terakhir" => $this->input->post('pterahir', true),
            "nama_sd" => $this->input->post('nama_sd', true),
            "nama_smp" => $this->input->post('nama_smp', true),
            "nama_smak" => $this->input->post('nama_smak', true)
        ];
        $this->db->insert('data_riwayat_pendidikan', $data);

        $data = [
            "kd_riwayat_pekerjaan" => $key_riwayat_pekerjaan,
            "nama_perusahaan_satu" => $this->input->post('nama_perusahaan1', true),
            "jabatan_perusahaan_satu" => $this->input->post('jabatan_kerja1', true),
            "lamakerja_perusahaan_satu" => $this->input->post('lama_bekerja1', true),
            "nama_perusahaan_dua" => $this->input->post('nama_perusahaan2', true),
            "jabatan_perusahaan_dua" => $this->input->post('jabatan_kerja2', true),
            "lamakerja_perusahaan_dua" => $this->input->post('lama_bekerja2', true),
            "nama_perusahaan_tiga" => $this->input->post('nama_perusahaan3', true),
            "jabatan_perusahaan_tiga" => $this->input->post('jabatan_kerja3', true),
            "lamakerja_perusahaan_tiga" => $this->input->post('lama_bekerja3', true)
        ];
        $this->db->insert('data_riwayat_pekerjaan', $data);

        $data = [
            "kd_pembayaran_gaji" => $key_pembayaran_gaji,
            "metode_pembayaran" => $this->input->post('mBayar', true),
            "bank_tujuan" => $this->input->post('banknya', true),
            "nomor_rekening" => $this->input->post('norek', true)
        ];
        $this->db->insert('data_pembayaran_gaji', $data);

        $data = [
            "kd_pegawai" => $key_pegawai,
            "nama_pegawai" => $this->input->post('nama_pegawai', true),
            "alamat" => $this->input->post('alamat', true),
            "tanggal_lahir" => $this->input->post('ttl', true),
            "agama" => $this->input->post('agama', true),
            "jenis_kelamin" => $this->input->post('jkelamin', true),
            "kd_kewarganegaraan" => $key_kewarganegaraan,
            "kd_jabatan" => $this->input->post('jabatan', true),
            "kd_pembayaran_gaji" => $key_pembayaran_gaji,
            "kd_riwayat_pendidikan" => $key_riwayat_pendidikan,
            "kd_riwayat_pekerjaan" => $key_riwayat_pekerjaan
        ];
        $this->db->insert('data_pegawai', $data);

    }

    //Fungsi edit data Pegawai
    public function EditDataPegawai($kdnya)
    {
        //Mengambil data pegawai dengan kode tertentu dan mendapatkan beberapa row untuk mengetahui foreign key tiap tiap table yang berelasi
        $pegawai = $this->db->get_where('data_pegawai', ['kd_pegawai' => $kdnya])->row_array();
        $kewarganegaraan    = $pegawai['kd_kewarganegaraan'];
        $jabatan            = $pegawai['kd_jabatan'];
        $pembayaran_gaji    = $pegawai['kd_pembayaran_gaji'];
        $riwayat_pendidikan = $pegawai['kd_riwayat_pendidikan'];
        $riwayat_pekerjaan  = $pegawai['kd_riwayat_pekerjaan'];
        
        echo $kdnya."<br>";
        echo $kewarganegaraan."<br>";
        echo $jabatan."<br>";
        echo $pembayaran_gaji."<br>";
        echo $riwayat_pendidikan."<br>";
        echo $riwayat_pekerjaan."<br>";
        
        $data = [
            "nik_ktp" => $this->input->post('nik_ktp', true),
            "nama_ktp" => $this->input->post('nama_ktp', true),
            "alamat_ktp" => $this->input->post('alamat_ktp', true),
            "kodepos_ktp" => $this->input->post('kodepos_ktp', true)
        ];
        $this->db->where('kd_kewarganegaraan',  $kewarganegaraan);
        $this->db->update('data_kewarganegaraan', $data);

        $data = [
            "pendidikan_terakhir" => $this->input->post('pterahir', true),
            "nama_sd" => $this->input->post('nama_sd', true),
            "nama_smp" => $this->input->post('nama_smp', true),
            "nama_smak" => $this->input->post('nama_smak', true)
        ];
        $this->db->where('kd_riwayat_pendidikan',  $riwayat_pendidikan);
        $this->db->update('data_riwayat_pendidikan', $data);

        $data = [
            "nama_perusahaan_satu" => $this->input->post('nama_perusahaan1', true),
            "jabatan_perusahaan_satu" => $this->input->post('jabatan_kerja1', true),
            "lamakerja_perusahaan_satu" => $this->input->post('lama_bekerja1', true),
            "nama_perusahaan_dua" => $this->input->post('nama_perusahaan2', true),
            "jabatan_perusahaan_dua" => $this->input->post('jabatan_kerja2', true),
            "lamakerja_perusahaan_dua" => $this->input->post('lama_bekerja2', true),
            "nama_perusahaan_tiga" => $this->input->post('nama_perusahaan3', true),
            "jabatan_perusahaan_tiga" => $this->input->post('jabatan_kerja3', true),
            "lamakerja_perusahaan_tiga" => $this->input->post('lama_bekerja3', true)
        ];
        $this->db->where('kd_riwayat_pekerjaan',  $riwayat_pekerjaan);
        $this->db->update('data_riwayat_pekerjaan', $data);

        $data = [
            "metode_pembayaran" => $this->input->post('mBayar', true),
            "bank_tujuan" => $this->input->post('banknya', true),
            "nomor_rekening" => $this->input->post('norek', true)
        ];
        $this->db->where('kd_pembayaran_gaji',  $pembayaran_gaji);
        $this->db->update('data_pembayaran_gaji', $data);

        $data = [
            "nama_pegawai" => $this->input->post('nama_pegawai', true),
            "alamat" => $this->input->post('alamat', true),
            "tanggal_lahir" => $this->input->post('ttl', true),
            "agama" => $this->input->post('agama', true),
            "jenis_kelamin" => $this->input->post('jkelamin', true)
        ];
        $this->db->where('kd_pegawai',  $kdnya);
        $this->db->update('data_pegawai', $data);

    }

    //Fungsi hapus data pegawai
    public function hapusDataPegawai($kdnya)
    {
        //Mengambil data pegawai dengan kode tertentu dan mendapatkan beberapa row untuk mengetahui foreign key tiap tiap table yang berelasi
        $pegawai = $this->db->get_where('data_pegawai', ['kd_pegawai' => $kdnya])->row_array();
        $kewarganegaraan    = $pegawai['kd_kewarganegaraan'];
        $jabatan            = $pegawai['kd_jabatan'];
        $pembayaran_gaji    = $pegawai['kd_pembayaran_gaji'];
        $riwayat_pendidikan = $pegawai['kd_riwayat_pendidikan'];
        $riwayat_pekerjaan  = $pegawai['kd_riwayat_pekerjaan'];

        $this->db->where('kd_pegawai', $kdnya);
        $this->db->delete('data_pegawai');

        $this->db->where('kd_kewarganegaraan', $kewarganegaraan);
        $this->db->delete('data_kewarganegaraan');

        $this->db->where('kd_jabatan', $jabatan);
        $this->db->delete('data_jabatan');

        $this->db->where('kd_pembayaran_gaji', $pembayaran_gaji);
        $this->db->delete('data_pembayaran_gaji');

        $this->db->where('kd_riwayat_pendidikan', $riwayat_pendidikan);
        $this->db->delete('data_riwayat_pendidikan');

        $this->db->where('kd_riwayat_pekerjaan', $riwayat_pekerjaan);
        $this->db->delete('data_riwayat_pekerjaan');
        
    }

}
