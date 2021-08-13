<div class="container-fluid">

                    <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="row mt-12 row-cols-12 row-cols-sm-12 row-cols-md-12 g-12">
                        <div class="col">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                Data Jabatan <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Jabatan</th>
                                            <th style="text-align:center">Gaji</th>
                                            <th style="text-align:center">Komisi</th>
                                            <th style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($listJabatan as $jabatan) { ?>
                                        <tr>
                                            <td><?= $jabatan['jabatan']; ?></td>
                                            <td style="text-align:center"><?php echo "Rp " . number_format($jabatan['gaji'], 0, ",", "."); ?></td>
                                            <td style="text-align:center"><?php echo "Rp " . number_format($jabatan['komisi'], 0, ",", "."); ?></td>
                                            <td style="text-align:center">
                                                <a href="<?= base_url(); ?>index.php/jabatan/edit/<?= $jabatan['kd_jabatan']; ?>" class="btn btn-small btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        
                                        
                                    </tbody>
                                </table>
                                <div class="pull-right"><a class="btn btn-small btn-success" data-toggle="modal" data-target="#modal_tambahpegawai">Tambah Data Jabatan</a></div>
                            </div>
                        </div>
                    </div>

                </div>


        <!-- Modal Tambah Jabatan -->
        <div class="modal fade" id="modal_tambahpegawai" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                        </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/jabatan/tambah/'?>">
                <div class="modal-body">
 
                    <h4 class="control-label col-xs-3" >Data Pegawai</h4>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Jabatan</label>
                        <div class="col-xs-8">
                            <input name="jabatan" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Gaji</label>
                        <div class="col-xs-8">
                            <input name="gaji" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Komisi</label>
                        <div class="col-xs-8">
                            <input name="komisi" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
    
            </form>
            </div>
            </div>
        </div>