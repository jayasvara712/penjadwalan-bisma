<?= $this->extend('template_publik'); ?>
<?= $this->section('content'); ?>

<!-- <div class="container">
    <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-10">
                <h2 class="text-center">Selamat Datang Di Sistem Informasi Jadwal Mata Pelajaran </h2>
                <p class="text-justify">Anda dapat mengakses informasi mengenai jadwal mata pelajaran di SMA Negeri 2 Tabanan nmelalui sistem ini. Selain itu juga anda dapat mengakses informasi terkait kegiatan yang telah dilaksanakan di SMA Negeri 2 Tabanan.</p>
            </div>
        </div>
    </div>
</div> -->

<div class="page-section bg-light">

    <div class="container">

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <form action="#" class="form-search-blog">
                    <input type="text" class="form-control" placeholder="Enter keyword.." id="search_kegaitan">
                    <div class="input-group">
                    </div>
                </form>
            </div>
            <div class="col-lg-1"></div>
        </div>

        <div class="row my-5" id="myKegiatan">

            <?php foreach ($kegiatan as $value) : ?>
                <div class="col-lg-4 py-3">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-thumb">
                                <img src="<?= base_url() ?>/upload/galeri/<?= $value->foto ?>" alt="">
                            </div>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="/kegiatan_sekolah/<?= $value->id_kegiatan ?>"><?= $value->judul ?></a></h5>
                            <div class="post-date">Posted on <a href="/kegiatan_sekolah/<?= $value->id_kegiatan ?>"><?= date('d F Y', strtotime($value->tgl_post)) ?></a></div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

        <!-- <nav aria-label="Page Navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav> -->

    </div>
</div>

<?= $this->endSection(); ?>