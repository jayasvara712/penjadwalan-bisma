<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')) : ?>

    <div id="error" style="visibility: hidden">
        <?= session()->getFlashdata('error') ?>
    </div>

<?php endif; ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Jam Pelajaran</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Jam Pelajaran</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('jampel/update/' . $jampel->id_jampel) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="">
                                    Jam Pelajaran
                                </label>
                                <input type="text" name="nama_jam" class="form-control" placeholder="Nama Jam" value="<?= $jampel->nama_jam ?>">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Waktu Mulai
                                </label>
                                <input type="time" name="waktu_masuk" class="form-control" placeholder="Jam Mulai" value="<?= $jampel->waktu_masuk ?>">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Waktu Selesai
                                </label>
                                <input type="time" name="waktu_selesai" class="form-control" placeholder="Waktu Selesai" value="<?= $jampel->waktu_selesai ?>">
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>