<?php
require 'function.php';
$mahasiswa = query("SELECT*FROM absen");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">NPM</th>
                <th scope="col">NAMA LENGKAP</th>
                <th scope="col">KELAS</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td scope="row">
                        <?= $i; ?>
                    </td>
                    <td><?= $mhs["npm"]; ?></td>
                    <td>
                        <?= $mhs["nama_lengkap"]; ?>
                    </td>
                    <td>
                        <?= $mhs["kelas"]; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $mhs["id"]; ?>">ubah</a> ||
                        <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('yakin mau di hspus')">delete</a> ||
                    </td>

                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
    </table>
    <a href="tambah.php">tambah</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>