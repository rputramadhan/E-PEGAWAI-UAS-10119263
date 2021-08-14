<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-PEGAWAI</title>

    <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">E-PEGAWAI</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>index.php/jabatan">
                    <i class="fas fa-fw fa fa-chevron-circle-left"></i>
                    <span>Kembali</span>
                </a>
            </li>

        </ul>


        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
            <br><br>
            <div class="container-fluid">

            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Jabatan "<?= $jabatan['jabatan']; ?>"</h6>
                        </div>
                        <div class="card-body">
                            
                        <form action="" method="POST">
                        <input type="hidden" name="kd_jabatan" value="<?php echo $jabatan['kd_jabatan']; ?>">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Jabatan</label>
                            <div class="col-xs-8">
                                <input name="jabatan" class="form-control" type="text" placeholder="" value="<?= $jabatan['jabatan']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Gaji</label>
                            <div class="col-xs-8">
                                <input name="gaji" class="form-control" type="text" placeholder="" value="<?= $jabatan['gaji']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Komisi</label>
                            <div class="col-xs-8">
                                <input name="komisi" class="form-control" type="text" placeholder="" value="<?= $jabatan['komisi']; ?>" required>
                            </div>
                        </div>      

                        <hr>
                        <button type="submit" class="btn btn-success">SIMPAN</button>

                        </form>

                        </div>
                    </div>

    <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url() ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>js/demo/chart-pie-demo.js"></script>
    <script src="<?= base_url() ?>js/demo/datatables-demo.js"></script>

</body>

</html>
