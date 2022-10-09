<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran Kelas <?= $kelas->nama_kelas ?></title>
    <style>
        table {
            border: 1px solid;
        }

        table th {
            background: #0c1c60 !important;
            color: #fff !important;
            border: 1px solid #ddd !important;
            line-height: 15px !important;
            text-align: center !important;
            vertical-align: middle !important;

        }

        table td {
            line-height: 15px !important;
            text-align: center !important;
            border: 1px solid;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Jadwal Pelajaran Kelas <?= $kelas->nama_kelas ?></h1>
    <h2>Tahun Ajaran <?= $ta->ta ?> Semester <?= $ta->semester ?></h2>
    <table class="table table-bordered" width="100%">
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
        <?php foreach ($jadpel as $key => $value) : ?>
            <tr id="xjadpel" class="text-center">
                <td id="xjam"><?= $value->waktu ?></td>
                <td id="senin" class="harix"><?= $value->senin ?></td>
                <td id="selasa" class="harix"><?= $value->selasa ?></td>
                <td id="rabu" class="harix"><?= $value->rabu ?></td>
                <td id="kamis" class="harix"><?= $value->kamis ?></td>
                <td id="jumat" class="harix"><?= $value->jumat ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>