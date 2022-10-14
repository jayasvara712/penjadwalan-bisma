<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PENJADWALAN MATA PELAJARAN</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/Tampilan/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/Tampilan/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/Tampilan/vendor/fontawesome-free/css/all.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>/Tampilan/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?= $this->include('admin/menu.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <?= $this->renderSection('content'); ?>

    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Yudish Ananta 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/Tampilan/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(() => {

            // $('#dataTable').DataTable();

            // function filterData() {
            //     $('#dataTable').DataTable().search(
            //         $('.pilihan_ta').val()
            //     ).draw();
            // }

            // $('.pilihan_ta').on('change', function() {
            //     filterData();
            // });

            var pilihan1 = document.getElementById("ta");
            var pilihan2 = document.getElementById("mapel");
            var pilihan3 = document.getElementById("kelas");
            var pilihan4 = document.getElementById("hari");
            var pilihan5 = document.getElementById("jampel");
            var pilihan6 = document.getElementById("kelasx");
            var pilihan7 = document.getElementById("tax");
            var pilihan8 = document.getElementById("pilihan_ta");
            var pilihan9 = document.getElementById("edit_jadpel");

            if (pilihan9) {
                select_guru();
                $("#ta").change(select_guru);
                $("#mapel").change(select_guru);
                $("#kelas").change(select_guru);
                $("#hari").change(select_guru);
                $("#jampel").change(select_guru);
            } else if (pilihan1) {
                $("#ta").change(select_guru);
                $("#mapel").change(select_guru);
                $("#kelas").change(select_guru);
                $("#hari").change(select_guru);
                $("#jampel").change(select_guru);
            } else if (pilihan2) {
                $("#mapel").change(select_guru);
                $("#kelas").change(select_guru);
                $("#hari").change(select_guru);
                $("#jampel").change(select_guru);
                $("#ta").change(select_guru);
            } else if (pilihan3) {
                $("#kelas").change(select_guru);
                $("#hari").change(select_guru);
                $("#jampel").change(select_guru);
                $("#ta").change(select_guru);
                $("#mapel").change(select_guru);
            } else if (pilihan4) {
                $("#hari").change(select_guru);
                $("#jampel").change(select_guru);
                $("#ta").change(select_guru);
                $("#mapel").change(select_guru);
                $("#kelas").change(select_guru);
            } else if (pilihan5) {
                $("#jampel").change(select_guru);
                $("#ta").change(select_guru);
                $("#mapel").change(select_guru);
                $("#kelas").change(select_guru);
                $("#hari").change(select_guru);
            } else if (pilihan6) {
                select_jadwal();
                $("#kelasx").change(select_jadwal);
                $("#tax").change(select_jadwal);
            } else if (pilihan7) {
                select_jadwal();
                $("#tax").change(select_jadwal);
                $("#kelasx").change(select_jadwal);
            } else if (pilihan8) {
                $("#pilihan_ta").change(jadpel_ta);
            }
        });
        // $("#mapel").change(select_guru);

        function select_guru() {

            // variabel dari nilai combo box
            var ta = document.getElementById("ta");
            var mapel = document.getElementById("mapel");
            var kelas = document.getElementById("kelas");
            var hari = document.getElementById("hari");
            var jampel = document.getElementById("jampel");
            var taValue = ta.options[ta.selectedIndex].value;
            var mapelValue = mapel.options[mapel.selectedIndex].value;
            var kelasValue = kelas.options[kelas.selectedIndex].value;
            var hariValue = hari.options[hari.selectedIndex].value;
            var jampelValue = jampel.options[jampel.selectedIndex].value;
            var csrfName = '<?= csrf_token() ?>',
                csrfHash = '<?= csrf_hash() ?>';
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            var dataJson = {
                [csrfName]: csrfHash,
                id_ta: taValue,
                id_mapel: mapelValue,
                id_kelas: kelasValue,
                id_hari: hariValue,
                id_jampel: jampelValue,
            };
            console.log(dataJson);
            $.ajax({
                url: "<?php echo base_url(); ?>/jadpel/get_guru",
                method: "POST",
                data: dataJson,
                async: false,
                dataType: 'json',
                success: function(data) {
                    console.log(dataJson);
                    console.log(data);
                    var html = '';
                    var i;
                    var old_guru = document.getElementById("old_guru");
                    var old_guru_nama = document.getElementById("old_guru_nama");

                    // $('#mapel').change(function() {
                    //     let tester_data = document.getElementById("data_lama");
                    //     tester_data.setAttribute("hidden", "hidden");
                    //     html += '';
                    // });

                    if (old_guru) {
                        html += '<option id="data_lama" value=' + old_guru.value + '>' + old_guru_nama.value + '</option>';
                    }

                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_guru + '>' + data[i].nama_guru + '</option>';
                    }
                    $('#guru').html(html);

                },
                error: function(err, e) {
                    for (var x in err) {
                        console.log(x + " <=> error index of <=> " + err[x])
                    }
                }
            });
        }

        function select_jadwal() {

            // variabel dari nilai combo box
            var kelas = document.getElementById("kelasx");
            var ta = document.getElementById("tax");
            var judul = document.getElementById("juduljadpel");
            var kelasValue = kelas.options[kelas.selectedIndex].value;
            var taValue = ta.options[ta.selectedIndex].value;
            var csrfName = '<?= csrf_token() ?>',
                csrfHash = '<?= csrf_hash() ?>';
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            var dataJson = {
                [csrfName]: csrfHash,
                id_kelas: kelasValue,
                id_ta: taValue,
            };
            $.ajax({
                url: "<?php echo base_url(); ?>/jadpel/get_jadpel",
                method: "POST",
                data: dataJson,
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var x = '';
                    var i;
                    var harix = document.getElementsByClassName("harix");
                    const id_kelas = document.getElementById("kelasx").value;
                    const id_ta = document.getElementById("tax").value;

                    console.log(data);
                    for (i = 0; i < data.length; i++) {
                        x = 'Jadwal Pelajaran Tahun Ajaran ' + data[i].ta + ' Semester ' + data[i].semester;
                        $("#juduljadpel").html(x);
                    }

                    $('.uniqueKelas').val(id_kelas);
                    $('.uniqueTa').val(id_ta);

                    for (i = 0; i < harix.length; i++) {
                        harix[i].innerHTML = "";
                    }
                    for (i = 0; i < data.length; i++) {
                        switch (data[i].nama_hari.toLowerCase()) {
                            case "senin":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#senin" + data[i].nama_jam).html(html);
                                console.log(html);
                                break;
                            case "selasa":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#selasa" + data[i].nama_jam).html(html);;
                                console.log(html);
                                break;
                            case "rabu":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#rabu" + data[i].nama_jam).html(html);;
                                console.log(html);
                                break;
                            case "kamis":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#kamis" + data[i].nama_jam).html(html);;
                                console.log(html);
                                break;
                            case "jumat":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#jumat" + data[i].nama_jam).html(html);;
                                console.log(html);
                                break;
                            case "sabtu":
                                html = data[i].nama_mapel + '<br>' + data[i].nama_guru;
                                $("#sabtu" + data[i].nama_jam).html(html);;
                                console.log(html);
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

        function jadpel_ta() {

            // variabel dari nilai combo box
            var ta = document.getElementById("pilihan_ta");
            var taValue = ta.options[ta.selectedIndex].value;
            var csrfName = '<?= csrf_token() ?>',
                csrfHash = '<?= csrf_hash() ?>';
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            var dataJson = {
                [csrfName]: csrfHash,
                id_ta: taValue,
            };
            $.ajax({
                url: "<?php echo base_url(); ?>/jadpel/get_jadpel_ta",
                method: "POST",
                data: dataJson,
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var x = '';
                    var i;
                    const id_ta = document.getElementById("pilihan_ta").value;

                    console.log(data);

                    for (i = 0; i < data.length; i++) {
                        html += '<tr><td>' + data[i].ta + ' - ' + data[i].semester + '</td><td>' + data[i].nama_kelas + '</td><td>' + data[i].nama_hari + '</td><td>' + data[i].nama_jam + '</td><td>' + data[i].nama_mapel + '</td><td><a href = "/jadpel/edit/' + data[i].id_jadpel + '" class = "btn btn-warning"> <i class = "fas fa-edit"></i></a><a href = "#" class = "btn btn-danger btn-delete" data-id = "' + data[i].id_japdel + '" > <i class = "fas fa-trash"> </i></a ></td></tr > ';
                        $(".tester").html(html);
                    }

                },
                error: function(err, e) {
                    for (var x in err) {
                        console.log(x + " <=> error index of <=> " + err[x])
                    }
                }
            });
        }

        function deleteData(btnID, idData, urlDelete, title, CSRF_TOKEN) {
            $('#btndelete' + btnID).click(function(e) {
                //var deleteid = $("#_delte_jenis_id").val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Data " + title + " dan data yang berelasi akan terhapus sehingga tidak dapat dipulihkan kembali!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            //parameter ajax
                            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                            var data = {
                                [csrfName]: csrfHash,
                                id_ta: idData
                            };
                            console.log(data);

                            //ajax call (ex. '/admin/jenis/ + id')
                            $.ajax({
                                type: "DELETE",
                                url: urlDelete + idData,
                                data: data,
                                dataType: 'json',
                                success: function(response) {
                                    if (response.response_code == 200) {
                                        console.log(response.result);
                                        swal(response.result, {
                                                icon: "success",
                                            })
                                            .then((result) => {
                                                location.reload();
                                            });
                                    } else {
                                        console.log(response.response_code + " <==> Throw error <==> " + response.error_message)
                                    }
                                },
                                error: function(err, e) {
                                    for (var x in err) {
                                        console.log(x + " <=> error index of <=> " + err[x])
                                    }
                                }
                            });


                        }
                    });
            });
        }
    </script>
    <script src="<?= base_url(); ?>/Tampilan/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/Tampilan/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/Tampilan/js/sb-admin-2.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/assets/js/costum.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/Tampilan/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/Tampilan/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/Tampilan/js/demo/datatables-demo.js"></script>
    <script src="<?= base_url(); ?>/assets/js/sweetalert.min.js"></script>

</body>

</html>