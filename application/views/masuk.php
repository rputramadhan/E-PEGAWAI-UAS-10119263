<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-PEGAWAI - Login</title>

    <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="<?= base_url() ?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
			

                <div class="card o-hidden border-0 shadow-lg my-5">
				<?php 
					if($this->session->flashdata('error') !='')
					{ ?>
						<a class="btn btn-danger btn-icon-split">
							<span class="text"> Username / Password Salah atau Tidak Terdaftar.</span>
						</a>
					<?php }
					?>

					<?php 
					if($this->session->flashdata('success_register') !='')
					{ ?>
						<a class="btn btn-success btn-icon-split">
							<span class="text">Berhasil masuk, login berhasil dilakukan.</span>
						</a>
					<?php }
				?>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-image: url('<?= base_url() ?>img/login.jpg')"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">E-PEGAWAI!</h1>
                                    </div>
									<form class="user" method="post" action="<?php echo base_url(); ?>index.php/login/proses">
										<div class="form-group">
                                            <input type="text" class="form-control form-control-user"
											name="username" id="username" placeholder="username">
                                        </div>
										<div class="form-group">
                                            <input type="password" class="form-control form-control-user"
											name="password" id="password" placeholder="password">
                                        </div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
										</button>
									</form>
									<hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url() ?>index.php/register">Mendaftarkan Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>js/sb-admin-2.min.js"></script>

</body>

</html>
