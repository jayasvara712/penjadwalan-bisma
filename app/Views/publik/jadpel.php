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
        <div class="card-body">
            <h4 class="text-center">
                Jadwal Mata Pelajaran Tahun Ajaran <?= $ta->ta ?>
            </h4>

            <select name="id_kelas" id="kelasx" class="form-control">
                <?php foreach ($kelas as $key => $value) : ?>
                    <option value="<?= $value->id_kelas ?>"><?= $value->nama_kelas ?></option>
                <?php endforeach ?>
            </select>
            <br>

            <!-- table -->
            <table class="table table-striped table-bordered" border="1" width="100%">
                <tr>
                    <th class="text-center">
                        Jam
                    </th>
                    <th class="text-center">
                        Senin
                    </th>
                    <th class="text-center">
                        Selasa
                    </th>
                    <th class="text-center">
                        Rabu
                    </th>
                    <th class="text-center">
                        Kamis
                    </th>
                    <th class="text-center">
                        Jumat
                    </th>
                </tr>
                <?php foreach ($jampel as $key => $value) : ?>
                    <tr id="xjadpel<?= $value->nama_jam ?>" class="text-center">
                        <td id="xjam"><?= $value->nama_jam ?></td>
                        <td id="senin<?= $value->nama_jam ?>" class="harix"></td>
                        <td id="selasa<?= $value->nama_jam ?>" class="harix"></td>
                        <td id="rabu<?= $value->nama_jam ?>" class="harix"></td>
                        <td id="kamis<?= $value->nama_jam ?>" class="harix"></td>
                        <td id="jumat<?= $value->nama_jam ?>" class="harix"></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>