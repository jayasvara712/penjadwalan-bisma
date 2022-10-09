<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')) : ?>

    <div id="error" style="visibility: hidden">
        <?= session()->getFlashdata('error') ?>
    </div>

<?php endif; ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Jadwal Pelajaran</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal Pelajaran</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <form action="create" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="">
                                    Tahun Ajaran
                                </label>
                                <select name="id_ta" class="form-control" placeholder="Tahun Ajaran" id="ta">
                                    <option value="">Pilih Tahun Ajaran</option>
                                    <?php foreach ($ta as $key => $value) : ?>
                                        <option value=" <?= $value->id_ta ?>"><?= $value->ta ?> - <?= $value->semester ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Kelas
                                </label>
                                <select name="id_kelas" class="form-control" placeholder="Kelas" id="kelas">
                                    <option value="">Pilih Kelas</option>
                                    <?php foreach ($kelas as $kelas => $value) : ?>
                                        <option value='<?= $value->id_kelas ?>'><?= $value->nama_kelas ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Hari
                                </label>
                                <select name="id_hari" class="form-control" placeholder="Hari" id="hari">
                                    <option value="">Pilih Hari</option>
                                    <?php foreach ($hari as $key => $value) : ?>
                                        <option value="<?= $value->id_hari ?>"><?= $value->nama_hari ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Jam Pelajaran
                                </label>
                                <select name="id_jampel" class="form-control" placeholder="Jam Pelajaran" id="jampel">
                                    <option value="">Pilih Jam Pelajaran</option>
                                    <?php foreach ($jampel as $key => $value) : ?>
                                        <option value="<?= $value->id_jampel ?>"><?= $value->nama_jam ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Mata Pelajaran
                                </label>
                                <select name="id_mapel" class="form-control" placeholder="Mata Pelajaran" id="mapel">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($mapel as $key => $value) : ?>
                                        <option value="<?= $value->id_mapel ?>"><?= $value->nama_mapel ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Guru
                                </label>
                                <select name="id_guru" class="guru form-control" placeholder="Guru" id="guru">

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