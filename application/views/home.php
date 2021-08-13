<?php 
    //Mendapatkan banyaknya data dari pegawai, peagawai pria, pegawai wanita
    $banyak_pegawai = count($pegawai);
    $pegawai_prianya   = count($pegawai_pria);
    $pegawai_wanitanya = count($pegawai_wanita);
?>
<div class="container-fluid">

                    <div class="row">

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Banyak Pegawai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $banyak_pegawai ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Pegawai Pria</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pegawai_prianya ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-male fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Pegawai Wanita</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pegawai_wanitanya ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-female fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="row mt-12 row-cols-12 row-cols-sm-12 row-cols-md-12 g-12">
                        <div class="col">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                Data Pegawai <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                            <th style="text-align:center">Lulusan</th>
                                            <th style="text-align:center">Gaji Seluruh</th>
                                            <th style="text-align:center">Date Lainya</th>
                                            <th style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($pegawai as $pegawainya) { 
                                        //Memanggil Fungsi untuk mendapatkan data jabatan & data riwayat pendidikan sesuai relasi
                                        $jabatan = $controller->getJabatanByID($pegawainya['kd_jabatan']);
                                        $rPendidikan = $controller->getRPendidikanByID($pegawainya['kd_riwayat_pendidikan']);
                                        $gaji = $jabatan['gaji'];
                                        $komisi = $jabatan['komisi'];
                                        //Menjumlahkan gaji dan komisi dari jabatan
                                        $gaji_seluruh = $gaji + $komisi;
                                    ?>
                                        <tr>
                                            <td ><?= $pegawainya['nama_pegawai']; ?></td>
                                            <td><?= $jabatan['jabatan']; ?></td>
                                            <td style="text-align:center"><?= $rPendidikan['pendidikan_terakhir']; ?></td>
                                            <td style="text-align:center"><?php echo "Rp " . number_format($gaji_seluruh, 0, ",", "."); ?></td> 
                                            <td style="text-align:center">
                                                <a href="<?= base_url(); ?>index.php/home/view/<?= $pegawainya['kd_pegawai']; ?>" class="btn btn-primary btn-icon-split">
                                                    <span class="text">Lihat Data</span>
                                                </a>
                                            </td>
                                            <td style="text-align:center">
                                                <a href="<?= base_url(); ?>index.php/home/edit/<?= $pegawainya['kd_pegawai']; ?>" class="btn btn-small btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="<?= base_url(); ?>index.php/home/hapus/<?= $pegawainya['kd_pegawai']; ?>" class="btn btn-small btn-danger">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        
                                        
                                    </tbody>
                                </table>
                                <div class="pull-right"><a class="btn btn-small btn-success" data-toggle="modal" data-target="#modal_tambahpegawai">Tambah Data Pegawai</a></div>
                            </div>
                        </div>
                    </div>

                </div>


        <!-- Modal Tambah Pegawai -->
        <div class="modal fade" id="modal_tambahpegawai" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                        </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/home/tambah/'?>">
                <div class="modal-body">
 
                    <h4 class="control-label col-xs-3" >Data Pegawai</h4>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Pegawai</label>
                        <div class="col-xs-8">
                            <input name="nama_pegawai" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <input name="alamat" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Lahir</label>
                        <div class="col-xs-8">
                            <input name="ttl" class="form-control" type="date" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Agama</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="agama" id="agama" required>
                                <option value="">--Pilih Agama--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Kelamin</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="jkelamin" id="jkelamin" required>
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <h4 class="control-label col-xs-3" >Data Kewarganegaraan</h4>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIK KTP</label>
                        <div class="col-xs-8">
                            <input name="nik_ktp" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama KTP</label>
                        <div class="col-xs-8">
                            <input name="nama_ktp" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat KTP</label>
                        <div class="col-xs-8">
                            <input name="alamat_ktp" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Pos KTP</label>
                        <div class="col-xs-8">
                            <input name="kodepos_ktp" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <hr>
                    <h4 class="control-label col-xs-3" >Data Riwayat Pendidikan</h4>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pendidikan Terakhir</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="pterahir" id="jkelamin" required>
                                <option value="">--Pilih Pendidikan Terakhir--</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMAK">SMA / SMK Sederajat</option>
                                <option value="S1">Starta (S1)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Sekolah Dasar</label>
                        <div class="col-xs-8">
                            <input name="nama_sd" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Sekolah Menenggah Pertama</label>
                        <div class="col-xs-8">
                            <input name="nama_smp" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Sekolah Menengah Atas / Kejuruan</label>
                        <div class="col-xs-8">
                            <input name="nama_smak" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <hr>
                    <h4 class="control-label col-xs-3" >Data Riwayat Pekerjaan</h4>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Perusahaan 1 (UTAMA)</label>
                        <div class="col-xs-8">
                            <input name="nama_perusahaan1" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jabatan Perusahaan 1 (UTAMA)</label>
                        <div class="col-xs-8">
                            <input name="jabatan_kerja1" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Lama Bekerja 1 (UTAMA)</label>
                        <div class="col-xs-8">
                            <input name="lama_bekerja1" class="form-control" type="text" placeholder="" required>
                        </div>
                        <br>
                        <div id="fieldTambah">
                    </div>

                    <button type="button" name="add" id="add" class="btn btn-success">Tambah Riwayat Pekerjaan</button>
                    
                    <hr>
                    <h4 class="control-label col-xs-3" >Data Jabatan</h4>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jabatan Pegawai</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="jabatan" required>
                                <option value="">--Pilih Jabatan--</option>
                            <?php 
                            foreach ($listJabatan as $listjabatanya) { ?>
                                <option value="<?= $listjabatanya['kd_jabatan'];?>"><?= $listjabatanya['jabatan'];?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <h4 class="control-label col-xs-3" >Data Penggajian</h4>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Metode Pembayaran</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="mBayar" id="mBayar" required>
                                <option value="">--Pilih Metode Pembayaran--</option>
                                <option value="Transfer">Transfer</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                    </div>

                    <div id="fieldGaji">
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
    
            </form>
            </div>
            </div>
        </div>

        <!-- Script Javascript Jquery Disini menambahkan option select pilihan bank dan field nomor rekening 
        apabila pengguna memilih metode pembayaran transfer, lalu terdapat fungsi menambahkan 3 field tambahan
        yaitu nama perusahaan, jabatan perusahaan, dan lama bekerja pada perusahaan 2,3.. Field ini hanya 
        dapat mengisi data sampai 3 perusahaan sesuai database yang ada -->
        <script type="text/javascript">
            $(document).ready(function(){      
            var i=2; 
            $('#mBayar').change(function(){  
                i++;             
                var nameValue = $("#mBayar").val();
                if (nameValue == "Transfer") {
                    $('#fieldGaji').append('<div class="form-group"><label class="control-label col-xs-3" >Bank Tujuan</label><div class="col-xs-8"><select class="form-control" name="banknya"><option value="">--Pilih Bank Tujuan--</option><option value="BCA">BCA</option><option value="Mandiri">Mandiri</option><option value="BRI">BRI</option><option value="BNI">BNI</option></select></div></div><div class="form-group"><label class="control-label col-xs-3" >Nomor Rekening</label><div class="col-xs-8"><input name="norek" class="form-control" type="text" placeholder="" required></div></div>');
                } else {
                    $('#fieldGaji').empty();
                
                }
            });

            $('#add').click(function(){  
                
                if(i < 4)
                    $('#fieldTambah').append('<div class="form-group"><label class="control-label col-xs-3" >Nama Perusahaan '+i+'</label><div class="col-xs-8"><input name="nama_perusahaan'+i+'" class="form-control" type="text" placeholder=""></div></div><div class="form-group"><label class="control-label col-xs-3" >Jabatan Perusahaan '+i+'</label><div class="col-xs-8"><div class="col-xs-8"><input name="jabatan_kerja'+i+'" class="form-control" type="text" placeholder=""></div><br></div><div class="form-group"><label class="control-label col-xs-3" >Lama Bekerja Perusahaan '+i+'</label><div class="col-xs-8"><input name="lama_bekerja'+i+'" class="form-control" type="text" placeholder="" required></div><br><div id="fieldTambah"></div>');
                i++;
           });
            
        
            });  
        </script>