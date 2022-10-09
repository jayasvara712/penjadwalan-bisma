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
        <h6 class="m-0 font-weight-bold text-primary">Edit Kegiatan</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('kegiatan/update/' . $kegiatan->id_kegiatan) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="foto_lama" value="<?= $kegiatan->foto ?>">
                            <div class="form-group">
                                <label for="">
                                    Judul
                                </label>
                                <input type="text" name="judul" class="form-control" placeholder="Judul" value="<?= $kegiatan->judul ?>">
                                <div class="form-group">
                                    <label for="">
                                        Deskripsi
                                    </label>
                                    <textarea name="deskripsi" class="form-control" cols="30" rows="10"><?= $kegiatan->deskripsi ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">
                                        Foto
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="col-4">
                                            <img src="<?= base_url() ?>/upload/galeri/<?= $kegiatan->foto ?>" alt="" srcset="" class="image-thumbnail img-preview" width="300px">
                                        </div>
                                        <div class="col-12">
                                            <input type="file" id="gambar" name="foto" class="form-control" onchange="imagePreview()">
                                            <label for="gambar" class="custom-file-label gambar-label"><?= $kegiatan->foto ?></label>
                                            <p>File Format PNG/JPG/JPEG | Max Size 5mb</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">
                                        Tanggal
                                    </label>
                                    <input class="form-control" type="text" name="tgl_post" id="" value="<?= $kegiatan->tgl_post ?>" readonly>
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