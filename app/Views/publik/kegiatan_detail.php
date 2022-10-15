<?= $this->extend('template_publik'); ?>
<?= $this->section('content'); ?>

<div class="page-section bg-light">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <div class="blog-single-wrap">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="<?= base_url() ?>/upload/galeri/<?= $kegiatan->foto ?>" alt="">
                        </div>
                    </div>
                    <h1 class="post-title text-center"><?= $kegiatan->judul ?></h1>
                    </br>
                    <div class="post-date" style="font-weight: bold;">Diposting pada <?= date('d F Y', strtotime($kegiatan->tgl_post)) ?></div>
                    </br>
                    <div class="post-content">
                        <p class="text-justify">
                            <?= $kegiatan->deskripsi ?>
                        </p>
                    </div>

                    <a href="/kegiatan_sekolah" class="btn btn-danger">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>

                </div>


            </div>

        </div>

    </div>
</div>

<?= $this->endSection(); ?>