<?= $this->extend('template_publik'); ?>
<?= $this->section('content'); ?>

<!-- <div class="container">
    <div class="page-banner home-banner">
        <div class="row align-items-center flex-wrap-reverse h-100">
            <div class="col-md-6 py-5 wow fadeInLeft">
                <h1 class="mb-4">SMA NEGERI 2 TABANAN</h1>
                <p class="text-lg text-grey mb-5">Selamat datang di sistem informasi penjadwalan sekolah</p>
            </div>
            <div class="col-md-6 py-5 wow zoomIn">
                <div class="img-fluid text-center">
                    <img src="<?= base_url() ?>/assets/img/sekolah.jpg" alt="">
                </div>
            </div>
        </div>
        <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
    </div>
</div> -->

<div class="page-section bg-blue" id="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 py-3 wow fadeInUp">
                <h2 class="title-section header-putih">SMA NEGERI 2 TABANAN</h2>
                <p>Selamat Datang Di Sistem Informasi Penjadwalan Mata Pelajaran</p>
            </div>
        </div>
    </div> <!-- .container -->
</div>

<div class="page-section bg-light" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 py-3 wow fadeInUp">
                <span class="subhead">Tentang Kami</span>
                <h2 class="title-section">SMA NEGERI 2 TABANAN</h2>
                <div class="divider"></div>

                <p style="text-align: justify;">Perkembangan dan tantangan masa depan seperti: perkembangan ilmu pengetahuan dan teknologi; globalisasi yang sangat cepat; era informasi; dan berubahnya kesadaran masyarakat dan orang tua siswa terhadap pendidikan memicu sekolah untuk merespon tantangan sekaligus peluang itu. SMA Negeri 2 Tabanan memiliki citra moral yang menggambarkan profil sekolah yang diinginkan di masa datang yang diwujudkan dalam Visi, Misi, dan Tujuan Sekolah</p>
            </div>
            <div class="col-lg-6 py-3 wow fadeInRight">
                <div class="img-fluid py-3 text-center">
                    <img src="<?= base_url() ?>/assets/img/kepala_sekolah.png" alt="">
                </div>
                <p style="text-align: center;"><b>Drs I Dewa Gede Wijaya M.Pd</b></br>Kepala Sekolah</p>
            </div>
        </div>
    </div> <!-- .container -->
</div>

<div class="page-section">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <h2 class="title-section">Berita Terkini</h2>
            <div class="divider mx-auto"></div>
        </div>

        <div class="row mt-5">

            <?php foreach ($kegiatan as $key => $value) : ?>
                <div class="col-lg-4 py-3 wow fadeInUp">
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

            <div class=" col-12 mt-4 text-center wow fadeInUp">
                <a href="/kegiatan_sekolah" class="btn btn-primary">View More</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>