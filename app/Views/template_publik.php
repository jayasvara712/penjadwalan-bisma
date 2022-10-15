<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>SISTEM INFORMASI JADWAL MATA PELAJARAN</title>

    <link rel="stylesheet" href="<?= base_url() ?>/frontend/assets/css/maicons.css">

    <link rel="stylesheet" href="<?= base_url() ?>/frontend/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url() ?>/frontend/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="<?= base_url() ?>/frontend/assets/css/theme.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/custom.css">
    <link href="<?= base_url(); ?>/Tampilan/vendor/fontawesome-free/css/all.css" rel="stylesheet">

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <?php include("publik/menu.php"); ?>
    </header>

    <?= $this->renderSection('content'); ?>

    <footer class="page-footer bg-image" style="background-image: url(../assets/img/world_pattern.svg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 py-3">
                    <h3>SMA NEGERI 2 TABANAN</h3>
                    <img class="" src="<?= base_url() ?>/assets/img/logo-white.png" width="320px">
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3 py-3">
                    <h5>Hubungi Kami</h5>
                    <p>Jalan Mawar Grokgak Gede Tabanan Bali</p>
                    <a href="#" class="footer-link">(0361) 811445</a>
                    <a href="#" class="footer-link">info@sman2tabanan.sch.id</a>
                </div>
            </div>

            <p class="text-center" id="copyright">Copyright &copy; Yudish Ananta 2022</p>
        </div>
    </footer>

    <script src="<?= base_url() ?>/frontend/assets/js/jquery-3.5.1.min.js"></script>

    <script src="<?= base_url() ?>/frontend/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>/frontend/assets/js/google-maps.js"></script>

    <script src="<?= base_url() ?>/frontend/assets/vendor/wow/wow.min.js"></script>

    <script src="<?= base_url() ?>/frontend/assets/js/theme.js"></script>

    <!-- custom -->
    <script src="<?= base_url() ?>/assets/js/publik.js"></script>

    <script>
        function select_jadwal() {

            // variabel dari nilai combo box
            var kelas = document.getElementById("kelasx");
            var kelasValue = kelas.options[kelas.selectedIndex].value;
            var csrfName = '<?= csrf_token() ?>',
                csrfHash = '<?= csrf_hash() ?>';
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            var dataJson = {
                [csrfName]: csrfHash,
                id_kelas: kelasValue,
            };
            $.ajax({
                url: "/home/get_jadpel",
                method: "POST",
                data: dataJson,
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var harix = document.getElementsByClassName("harix");
                    for (i = 0; i < harix.length; i++) {
                        harix[i].innerHTML = "";
                    }
                    for (i = 0; i < data.length; i++) {
                        switch (data[i].nama_hari.toLowerCase()) {
                            case "senin":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#senin" + data[i].nama_jam).html(html);
                                break;
                            case "selasa":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#selasa" + data[i].nama_jam).html(html);
                                break;
                            case "rabu":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#rabu" + data[i].nama_jam).html(html);
                                break;
                            case "kamis":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#kamis" + data[i].nama_jam).html(html);
                                break;
                            case "jumat":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#jumat" + data[i].nama_jam).html(html);
                                break;
                            case "sabtu":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#sabtu" + data[i].nama_jam).html(html);
                                break;
                        }

                    }

                },
                error: function(err, e) {
                    for (var x in err) {
                        console.log(x + " <=> error index of <=> " + err[x])
                    }
                }
            });
        }
    </script>

</body>

</html>