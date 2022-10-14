<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')) : ?>

    <div id="error" style="visibility: hidden">
        <?= session()->getFlashdata('error') ?>
    </div>

<?php endif; ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kegiatan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('kegiatan/create') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="">
                                    Judul
                                </label>
                                <input type="text" name="judul" class="form-control" placeholder="Judul">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Deskripsi
                                </label>
                                <textarea name="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="col-4">
                                        <img src="/upload/galeri/no-image.png" alt="" srcset="" class="image-thumbnail img-preview" width="150px">
                                    </div>
                                    <div class="col-12">
                                        <input type="file" id="gambar" name="foto" class="form-control" onchange="imagePreview()">
                                        <div class="invalid-feedback">
                                        </div>
                                        <label for="gambar" class="custom-file-label gambar-label">Tambah File</label>
                                        <p>File Format PNG/JPG/JPEG</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Tanggal Kegiatan
                                </label>
                                <input type="text" name="tgl_post" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
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