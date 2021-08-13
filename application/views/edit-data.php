<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-PEGAWAI</title>

    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">E-PEGAWAI</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>index.php/home">
                    <i class="fas fa-fw fa fa-chevron-circle-left"></i>
                    <span>Kembali</span>
                </a>
            </li>

        </ul>


        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
            <br><br>
            <div class="container-fluid">

<!-- Mengambil Data Relasi Tabel -->
<?php
    $jabatan = $controller->getJabatanByID($pegawai['kd_jabatan']);
    $kewarganegaraan = $controller->getKewarganegaraanByID($pegawai['kd_kewarganegaraan']);
    $penggajian = $controller->getPGajiByID($pegawai['kd_pembayaran_gaji']);
    $pekerjaan = $controller->getRPekerjaanByID($pegawai['kd_riwayat_pekerjaan']);
    $pendidikan = $controller->getRPendidikanByID($pegawai['kd_riwayat_pendidikan']);

    $banknya = $penggajian['bank_tujuan'];
    $noreknya = $penggajian['nomor_rekening'];
?>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pegawai "<?= $pegawai['nama_pegawai']; ?>"</h6>
                        </div>
                        <div class="card-body">
                            
                        <form action="" method="POST">
                        <input type="hidden" name="kd_pegawai" value="<?php echo $pegawai['kd_pegawai']; ?>">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Pegawai</label>
                            <div class="col-xs-8">
                                <input name="nama_pegawai" class="form-control" type="text" placeholder="" value="<?= $pegawai['nama_pegawai']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Alamat</label>
                            <div class="col-xs-8">
                                <input name="alamat" class="form-control" type="text" placeholder="" value="<?= $pegawai['alamat']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Tanggal Lahir</label>
                            <div class="col-xs-8">
                                <input name="ttl" class="form-control" type="date" placeholder="" value="<?= $pegawai['tanggal_lahir']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Agama</label>
                            <div class="col-xs-8">
                                <select class="form-control" name="agama" id="agama" required>
                                    <option value="<?= $pegawai['agama']; ?>"><?= $pegawai['agama']; ?></option>
                                    <?php
                                        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha','Konghucu'];
                                        for($i=0; $i < count($agama); $i++){
                                            if($agama[$i] != $pegawai['agama'])
                                                echo "<option value=".$agama[$i].">".$agama[$i]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Jenis Kelamin</label>
                            <div class="col-xs-8">
                                <select class="form-control" name="jkelamin" id="jkelamin" required>
                                    <option value="<?= $pegawai['jenis_kelamin']; ?>"><?= $pegawai['jenis_kelamin']; ?></option>
                                    <?php
                                        $jkelamin = ['Pria', 'Wanita'];
                                        for($i=0; $i < count($jkelamin); $i++){
                                            if($jkelamin[$i] != $pegawai['jenis_kelamin'])
                                                echo "<option value=".$jkelamin[$i].">".$jkelamin[$i]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >NIK KTP</label>
                            <div class="col-xs-8">
                                <input name="nik_ktp" class="form-control" type="text" placeholder="" value="<?= $kewarganegaraan['nik_ktp']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama KTP</label>
                            <div class="col-xs-8">
                                <input name="nama_ktp" class="form-control" type="text" placeholder="" value="<?= $kewarganegaraan['nama_ktp']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Alamat KTP</label>
                            <div class="col-xs-8">
                                <input name="alamat_ktp" class="form-control" type="text" placeholder="" value="<?= $kewarganegaraan['alamat_ktp']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Pos KTP</label>
                            <div class="col-xs-8">
                                <input name="kodepos_ktp" class="form-control" type="text" placeholder="" value="<?= $kewarganegaraan['kodepos_ktp']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Pendidikan Terakhir</label>
                            <div class="col-xs-8">
                                <select class="form-control" name="pterahir" id="jkelamin" required>
                                    <option value="<?= $pendidikan['pendidikan_terakhir']; ?>"><?= $pendidikan['pendidikan_terakhir']; ?></option>
                                    <?php
                                        $pendidikannya = ['SD', 'SMP', 'SMAK', 'S1'];
                                        for($i=0; $i < count($pendidikannya); $i++){
                                            if($pendidikannya[$i] != $pendidikan['pendidikan_terakhir'])
                                                echo "<option value=".$pendidikannya[$i].">".$pendidikannya[$i]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Sekolah Dasar</label>
                            <div class="col-xs-8">
                                <input name="nama_sd" class="form-control" type="text" placeholder="" value="<?= $pendidikan['nama_sd']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Sekolah Menenggah Pertama</label>
                            <div class="col-xs-8">
                                <input name="nama_smp" class="form-control" type="text" placeholder="" value="<?= $pendidikan['nama_smp']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Sekolah Menengah Atas / Kejuruan</label>
                            <div class="col-xs-8">
                                <input name="nama_smak" class="form-control" type="text" placeholder="" value="<?= $pendidikan['nama_smak']; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="firstName1">Nama Perusahaan 1 (UTAMA)</label>
                                <input type="text" name="nama_perusahaan1" class="form-control required" value="<?= $pekerjaan['nama_perusahaan_satu']; ?>" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="firstName1">Jabatan Perusahaan 1 (UTAMA)</label>
                                <input type="text" name="jabatan_kerja1" class="form-control required" value="<?= $pekerjaan['jabatan_perusahaan_satu']; ?>" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="firstName1">Lama Bekerja 1 (UTAMA)</label>
                                <input type="text" name="lama_bekerja1" class="form-control required" value="<?= $pekerjaan['lamakerja_perusahaan_satu']; ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="firstName1">Nama Perusahaan 2</label>
                                <input type="text" name="nama_perusahaan2" class="form-control required" value="<?= $pekerjaan['nama_perusahaan_dua']; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="firstName1">Jabatan Perusahaan 2</label>
                                <input type="text" name="jabatan_kerja2" class="form-control required" value="<?= $pekerjaan['jabatan_perusahaan_dua']; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="firstName1">Lama Bekerja 2</label>
                                <input type="text" name="lama_bekerja2" class="form-control required" value="<?= $pekerjaan['lamakerja_perusahaan_dua']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="firstName1">Nama Perusahaan 3</label>
                                <input type="text" name="nama_perusahaan3" class="form-control required" value="<?= $pekerjaan['nama_perusahaan_tiga']; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="firstName1">Jabatan Perusahaan 3</label>
                                <input type="text" name="jabatan_kerja3" class="form-control required" value="<?= $pekerjaan['jabatan_perusahaan_tiga']; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="firstName1">Lama Bekerja 3</label>
                                <input type="text" name="lama_bekerja3" class="form-control required" value="<?= $pekerjaan['lamakerja_perusahaan_tiga']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Jabatan Pegawai</label>
                            <div class="col-xs-8">
                                <select class="form-control" name="jabatan" required>
                                <option value="<?= $jabatan['jabatan']; ?>"><?= $jabatan['jabatan']; ?></option>
                                <?php 
                                foreach ($listJabatan as $listjabatanya) { 
                                    if($listjabatanya['jabatan'] !== $jabatan['jabatan'])
                                        echo "<option value='".$listjabatanya['jabatan']."'>".$listjabatanya['jabatan']."</option>";
                                } ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" id="mBayarAwal" value="<?= $penggajian['metode_pembayaran']; ?>">
                        <input type="hidden" id="bankAwal" value="<?= $penggajian['bank_tujuan']; ?>">
                        <input type="hidden" id="norekAwal" value="<?= $penggajian['nomor_rekening']; ?>">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Metode Pembayaran</label>
                            <div class="col-xs-8">
                                <select class="form-control" name="mBayar" id="mBayar" required>
                                    <option value="<?= $penggajian['metode_pembayaran']; ?>"><?= $penggajian['metode_pembayaran']; ?></option>
                                    <?php
                                        $gajian = ['Cash', 'Transfer'];
                                        for($i=0; $i < count($gajian); $i++){
                                            if($gajian[$i] != $penggajian['metode_pembayaran'])
                                                echo "<option value=".$gajian[$i].">".$gajian[$i]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div id="fieldGaji">
                        </div>

                        

                        <hr>
                        <button type="submit" class="btn btn-success">SIMPAN</button>

                        </form>

                        </div>
                    </div>

    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../../js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../.././vendor/chart.js/Chart.min.js"></script>
    <script src="../../../js/demo/chart-area-demo.js"></script>
    <script src="../../../js/demo/chart-pie-demo.js"></script>
    <script src="../../../js/demo/datatables-demo.js"></script>

</body>

</html>


        <!-- Script Javascript Jquery Disini berfungsi saat pengguna memilih option metode pembayaran
        Pada awalnnya bilamana data metode pembayaran pegawai terisi "Transfer" field bank dan nomor rekening
        akan muncul dan menampilkan data sesuai yang ada dalam database,
        bilamana dirubah ke "Cash" Field bank dan nomor rekening akan hilang-->

        <!-- Bila data awak metode pembayaran pegawai berisi "Cash" field bank dan nomor rekening tidak akan muncul
        Dan apabila dirubah ke "Transger" field bank dan nomor rekening akan muncul dengan isian & Pilihan kosong dimana
        pegawai pertama kali mengisi data untuk motede pembayaran "Transfer"-->
        
        <script type="text/javascript">
            $(document).ready(function(){   
                
                var bankAwal = $("#bankAwal").val();
                var norekAwal = $("#norekAwal").val();
                var mBayarAwal = $("#mBayarAwal").val();
                if (mBayarAwal != "Cash") {
                    $('#fieldGaji').append('<div class="form-group"><label class="control-label col-xs-3" >Bank Tujuan</label><div class="col-xs-8"><select class="form-control" id="banknya" name="banknya"></select></div></div><div class="form-group"><label class="control-label col-xs-3" >Nomor Rekening</label><div class="col-xs-8"><input name="norek" value="'+norekAwal+'" class="form-control" type="text" placeholder="" required></div></div>');
                    let banknya = document.getElementById('banknya')
                    let bank = ['BCA', 'Mandiri', 'BRI', 'BNI'];
                    banknya.innerHTML += "<option value="+bankAwal+">"+bankAwal+"</option>"
                    for(i = 0; i < bank.length; i++){
                        
                        if(bankAwal != bank[i]) {
                            result = "<option value="+bank[i]+">"+bank[i]+"</option>"
                            banknya.innerHTML += result
                        }
                    }
                }

                $('#mBayar').on('change', function(){  
                    var bankAwal = $("#bankAwal").val();
                    var norekAwal = $("#norekAwal").val();
                    var nameValue = $("#mBayar").val();
                    if (nameValue == "Transfer" && bankAwal == "") {
                        $('#fieldGaji').append('<div class="form-group"><label class="control-label col-xs-3" >Bank Tujuan</label><div class="col-xs-8"><select class="form-control" name="banknya"><option value="">--Pilih Bank Tujuan--</option><option value="BCA">BCA</option><option value="Mandiri">Mandiri</option><option value="BRI">BRI</option><option value="BNI">BNI</option></select></div></div><div class="form-group"><label class="control-label col-xs-3" >Nomor Rekening</label><div class="col-xs-8"><input name="norek" class="form-control" type="text" placeholder="" required></div></div>');
                    } else if (nameValue == "Transfer") {
                        $('#fieldGaji').append('<div class="form-group"><label class="control-label col-xs-3" >Bank Tujuan</label><div class="col-xs-8"><select class="form-control" id="banknya" name="banknya"></select></div></div><div class="form-group"><label class="control-label col-xs-3" >Nomor Rekening</label><div class="col-xs-8"><input name="norek" value="'+norekAwal+'" class="form-control" type="text" placeholder="" required></div></div>');
                        let banknya = document.getElementById('banknya')
                        let bank = ['BCA', 'Mandiri', 'BRI', 'BNI'];
                        banknya.innerHTML += "<option value="+bankAwal+">"+bankAwal+"</option>"
                        for(i = 0; i < bank.length; i++){
                            
                            if(bankAwal != bank[i]) {
                                result = "<option value="+bank[i]+">"+bank[i]+"</option>"
                                banknya.innerHTML += result
                            }
                        }
                    } else {
                        $('#fieldGaji').empty();
                    }
                });
            });  
        </script>