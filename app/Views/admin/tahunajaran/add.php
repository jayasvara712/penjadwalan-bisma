<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')) : ?>

    <div id="error" style="visibility: hidden;">
        <?= session()->getFlashdata('error') ?>
    </div>

<?php endif; ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tahun Ajaran</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Tahun Ajaran</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('tahunajaran/create') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="">
                                    Tahun Ajaran
                                </label>
                                <input type="text" name="ta" class="form-control" placeholder="Tahun Ajaran">
                            </div>

                            <div class="form-group">
                                <label for="">
                                    Semester
                                </label>
                                <select name="semester" id="" class="form-control">
                                    <option value="">Pilih Semester</option>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
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