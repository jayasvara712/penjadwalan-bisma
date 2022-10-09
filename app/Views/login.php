<?= $this->extend('template_login'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>

    <div id="success" style="visibility: hidden">
        <?= session()->getFlashdata('success') ?>
    </div>

<?php elseif (session()->getFlashdata('error')) : ?>

    <div id="error" style="visibility: hidden">
        <?= session()->getFlashdata('error') ?>
    </div>

<?php endif; ?>

<div class="container">

    <div class="row justify-content-center">


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body">

                <div class="row">
                    <form action="loginProcess" method="post">
                        <center>
                            <img src="../../assets/img/logo.png" width="40%" height="40%" />
                        </center>
                        <?= csrf_field() ?>
                        <!-- Email input -->
                        <h5 class="mb-3" style="color:black; text-align:center">SISTEM INFORMASI PENJADWALAN </br> SMA NEGERI 2 TABANAN</h5>
                        <div class="mb-4">
                            <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username...">
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                            Login
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>