<?= $this->extend('template_admin'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pengaturan Akun</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Jam Pelajaran</h6>
    </div> -->
    <?php if (session()->getFlashdata('success')) : ?>

        <div id="success" style="visibility: hidden">
            <?= session()->getFlashdata('success') ?>
        </div>

    <?php endif; ?>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('setting/update/' . $user->id_user) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                            <div class="form-group">
                                <label for="">
                                    Username
                                </label>
                                <input type="text" name="username" id="" value="<?= $user->username ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Password Baru
                                </label>
                                <input type="password" name="password" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Konfirmasi Password Baru
                                </label>
                                <input type="password" name="confm_password" id="" v class="form-control">
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