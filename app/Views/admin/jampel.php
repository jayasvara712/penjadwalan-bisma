<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Jam Pelajaran</h1>

<?php if (session()->getFlashdata('success')) : ?>

    <div id="success" style="visibility: hidden">
        <?= session()->getFlashdata('success') ?>
    </div>

<?php endif; ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jam Pelajaran</h6>
    </div>
    <div class="card-header">
        <p class="btn-group">
            <a href="<?= site_url("jampel/new") ?>" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i> Tambah Data</a>
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Jam</th>
                        <th>Waktu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jampel as $key => $value) : ?>
                        <tr>
                            <td><?= $value->nama_jam ?></td>
                            <td>
                                <?= $value->waktu_masuk ?> - <?= $value->waktu_selesai ?>
                            </td>
                            <td>
                                <a href="<?= site_url('jampel/edit/' . $value->id_jampel) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-delete" data-id="<?= $value->id_jampel; ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Delete Product-->
<form action="<?= site_url('jampel/hapus/') ?>" method="post">
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