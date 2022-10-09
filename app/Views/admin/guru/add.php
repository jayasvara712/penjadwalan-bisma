<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')) : ?>

    <div id="error" style="visibility: hidden">
        <?= session()->getFlashdata('error') ?>
    </div>

<?php endif; ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Guru</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Guru</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('guru/create') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="">
                                    Mata Pelajaran
                                </label>
                                <select name="id_mapel" class="form-control" placeholder="Mata Pelajaran">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($mapel as $key => $value) : ?>
                                        <option value="<?= $value->id_mapel ?>"><?= $value->nama_mapel ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Nama Guru
                                </label>
                                <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru">
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