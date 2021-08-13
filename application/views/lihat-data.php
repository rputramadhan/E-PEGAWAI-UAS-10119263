<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-PEGAWAI</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">E-PEGAWAI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>index.php/home">
                    <i class="fas fa-fw fa fa-chevron-circle-left"></i>
                    <span>Kembali</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            <br><br>
            <div class="container-fluid">

            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Legkap Pegawai "<?= $pegawai['nama_pegawai']; ?>"</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <tbody>
                                <?php 
                                    //Memanggil semua data yang berelasi sesuai kode dan table yang terisi pada data pegawai
                                    $jabatan = $controller->getJabatanByID($pegawai['kd_jabatan']);
                                    $kewarganegaraan = $controller->getKewarganegaraanByID($pegawai['kd_kewarganegaraan']);
                                    $penggajian = $controller->getPGajiByID($pegawai['kd_pembayaran_gaji']);
                                    $pekerjaan = $controller->getRPekerjaanByID($pegawai['kd_riwayat_pekerjaan']);
                                    $pendidikan = $controller->getRPendidikanByID($pegawai['kd_riwayat_pendidikan']);
                                    $gaji = $jabatan['gaji'];
                                    $komisi = $jabatan['komisi'];
                                    $gaji_seluruh = $gaji + $komisi;
                                ?>

                                <tr>
                                    <td colspan="2" style="text-align:left"><b><i>Data Jabatan</b></i></td>
                                </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td><?= $jabatan['jabatan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gaji</td>
                                        <td><?php echo "Rp " . number_format($jabatan['gaji'], 0, ",", "."); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Komisi</td>
                                        <td><?php echo "Rp " . number_format($jabatan['komisi'], 0, ",", "."); ?></td>
                                    </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b><i>Data Kewarganegaraan</b></i></td>
                                </tr>
                                    <tr>
                                        <td>NIK KTP</td>
                                        <td><?= $kewarganegaraan['nik_ktp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama KTP</td>
                                        <td><?= $kewarganegaraan['nama_ktp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?= $kewarganegaraan['alamat_ktp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td><?= $kewarganegaraan['kodepos_ktp']; ?></td>
                                    </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b><i>Data Pegawai</b></i></td>
                                </tr>
                                    <tr>
                                        <td>Nama Pegawai</td>
                                        <td><?= $pegawai['nama_pegawai']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?= $pegawai['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td><?= $pegawai['tanggal_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td><?= $pegawai['agama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td><?= $pegawai['jenis_kelamin']; ?></td>
                                    </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b><i>Data Penggajian</b></i></td>
                                </tr>
                                    <tr>
                                        <td>Metode Pembayaran</td>
                                        <td><?= $penggajian['metode_pembayaran']; ?></td>
                                    </tr>
                                <?php if($penggajian['metode_pembayaran'] == "Transfer") { ?>
                                    <tr>
                                        <td>Bank Tujuan</td>
                                        <td><?= $penggajian['bank_tujuan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Rekening</td>
                                        <td><?= $penggajian['nomor_rekening']; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b><i>Data Riwayat Pekerjaan (UTAMA)</b></i></td>
                                </tr>
                                    <tr>
                                        <td>Perusahaan Sebelumnya</td>
                                        <td><?= $pekerjaan['nama_perusahaan_satu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan Sebelumnya</td>
                                        <td><?= $pekerjaan['jabatan_perusahaan_satu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lama Kerja</td>
                                        <td><?= $pekerjaan['lamakerja_perusahaan_satu']; ?></td>
                                    </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b><i>Data Riwayat Pendidikan</b></i></td>
                                </tr>
                                    <tr>
                                        <td>Pendidikan Terakhir</td>
                                        <td><?= $pendidikan['pendidikan_terakhir']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Sekolah Dasar</td>
                                        <td><?= $pendidikan['nama_sd']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Sekolah Menengah Pertama</td>
                                        <td><?= $pendidikan['nama_smp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Sekolah Menengah Kejuruan</td>
                                        <td><?= $pendidikan['nama_smak']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

    
            <!-- Bootstrap core JavaScript-->
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../.././vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../js/demo/chart-area-demo.js"></script>
    <script src="../../../js/demo/chart-pie-demo.js"></script>
    <script src="../../../js/demo/datatables-demo.js"></script>

</body>

</html>