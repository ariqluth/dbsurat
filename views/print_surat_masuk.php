<?php

include '../config/koneksi.php';
// Fetch data from the database
$sql = "SELECT no_surat, nama_penerima, tgl_masuk, nama_pengirim, instansi, perihal, status FROM surat_masuk";
$query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Data Surat Masuk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Data Surat Masuk</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>No Surat</th>
                <th>Nama Penerima</th>
                <th>Tanggal Masuk</th>
                <th>Nama Pengirim</th>
                <th>Instansi</th>
                <th>Perihal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 0;
            while ($data = mysqli_fetch_array($query)) {
                $nomor++;
                ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $data['no_surat'] ?></td>
                    <td><?= $data['nama_penerima'] ?></td>
                    <td><?= $data['tgl_masuk'] ?></td>
                    <td><?= $data['nama_pengirim'] ?></td>
                    <td><?= $data['instansi'] ?></td>
                    <td><?= $data['perihal'] ?></td>
                    <td><?= $data['status'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
