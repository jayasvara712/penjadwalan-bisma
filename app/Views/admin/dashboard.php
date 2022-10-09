<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<?php if (session()->getFlashdata('success')) : ?>

    <div id="success" style="visibility: hidden">
        <?= session()->getFlashdata('success') ?>
    </div>

<?php endif; ?>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tahun Ajaran
                        </div>
                        <div class="huge"><?= $ta ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-500"></i>
                    </div>
                </div>
            </div>
            <div>
                <a href="tahunajaran">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            GURU</div>
                        <div class="huge"><?= $guru ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-500"></i>
                    </div>
                </div>
            </div>
            <div>
                <a href="guru">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            KELAS</div>
                        <div class="huge"><?= $kelas ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-university fa-2x text-gray-500"></i>
                    </div>
                </div>
            </div>
            <div>
                <a href="kelas">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">MATA PELAJARAN
                        </div>
                        <div class="huge"><?= $mapel ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-500"></i>
                    </div>
                </div>
            </div>
            <div>
                <a href="mapel">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kegiatan
                        </div>
                        <div class="huge"><?= $kegiatan ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-500"></i>
                    </div>
                </div>
            </div>
            <div>
                <a href="kegiatan">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>

<!-- End of Main Content -->
<?= $this->endSection(); ?>