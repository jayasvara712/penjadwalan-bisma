<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Jadwal Pelajaran</h1>

<?php if (session()->getFlashdata('success')) : ?>

    <div id="success" style="visibility: hidden">
        <?= session()->getFlashdata('success') ?>
    </div>

<?php endif; ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jadwal Pelajaran</h6>
    </div>

    <div class="card-header">

        <form method="GET" action="" class="form-group">
            <div class="row">
                <div class="col-lg-9">
                    <div class="input-group">
                        <select name="id_ta" id="pilihan_ta" class="form-control">
                            <option value="" <?php if ($_GET['id_ta'] == "") {
                                                    echo 'Selected';
                                                } ?>>Pilih Tahun Ajaran</option>
                            <?php foreach ($ta as $key => $value) : ?>
                                <option value="<?= $value->id_ta ?>" <?php if ($_GET['id_ta'] == $value->id_ta) {
                                                                            echo 'Selected';
                                                                        } ?>><?= $value->ta . ' - ' . $value->semester ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="Submit">Cari Data</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a href="<?= site_url("jadpel/new") ?>" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Data</a>
                </div>
            </div>
        </form>


    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Mata Pelajaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jadpel as $value) : ?>
                        <tr>
                            <td><?= $value->ta ?> - <?= $value->semester ?></td>
                            <td><?= $value->nama_kelas ?></td>
                            <td><?= $value->nama_hari ?></td>
                            <td><?= $value->nama_jam ?></td>
                            <td><?= $value->nama_mapel ?></td>
                            <td>
                                <a href="<?= site_url("jadpel/edit/") . $value->id_jadpel ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-delete" data-id="<?= $value->id_jadpel ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <!-- <tbody class="tester">
                    <tr>
                        <td class="semsterx"></td>
                        <td class="kelasx"></td>
                        <td class="harix"></td>
                        <td class="jamx"></td>
                        <td class="mapelx"></td>
                        <td>
                            <a href="<?= site_url("jadpel/edit/") ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-delete" data-id=""><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody> -->
            </table>
        </div>
    </div>
</div>

<!-- Modal Delete Product-->
<form action="<?= site_url('jadpel/hapus/') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah Anda yakin akan menghapus data ini ?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="uniqueID">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>