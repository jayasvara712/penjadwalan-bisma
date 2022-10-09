<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cetak Jadwal Pelajaran</h6>
    </div>

    <div class="card-body">

        <div class="page-section">
            <div class="container">
                <div class="card-body">
                    <h4 class="text-center" id="juduljadpel">

                    </h4>
                    <div class="row">
                        <div class="col-lg-5">
                            <select name="id_kelas" id="kelasx" class="form-control">
                                <?php foreach ($kelas as $key => $value) : ?>
                                    <option value="<?= $value->id_kelas ?>"><?= $value->nama_kelas ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <select name="id_ta" id="tax" class="form-control">
                                <?php foreach ($ta as $key => $value) : ?>
                                    <option value="<?= $value->id_ta ?>"><?= $value->ta . '-' . $value->semester ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <form action="cetak/print" class="d-inline" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="id_kelas" class="uniqueKelas">
                                <input type="hidden" name="id_ta" class="uniqueTa">
                                <button class="btn btn-primary"><i class="fas fa-print"></i></button>
                            </form>
                        </div>
                    </div>

                    <br>

                    <!-- table -->
                    <table class="table table-bordered" border="1" width="100%">
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
                            <tr>
                                <td><?= $value->waktu_masuk ?> - <?= $value->waktu_selesai ?></td>
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

    </div>
</div>

<?= $this->endSection(); ?>