<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="panel-title d-inline-flex" style="display: flex;
    flex-direction: row; justify-content: space-between;">
                        <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Surat Masuk</h3>
                        <button class="btn-sm col-sm-2"  onclick="window.location.href='../views/print_surat_masuk.php'" class="btn btn-primary btn-sm">
                        <span class="fa fa-print"></span> Print Data Surat Masuk
                        </button>
                    </div>
                </div>

                <div class="panel-body">
                  
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
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
                                <th>File</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM surat_masuk";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk 
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
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
                                    <td>
                                        <?php if (!empty($data['file_surat'])) : ?>
                                            <a href="uploads/<?= $data['file_surat'] ?>" target="_blank">lihat berkas</a>
                                        <?php else : ?>
                                            tidak ada berkas
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="?page=surat&actions=detail&no_surat=<?= $data['no_surat'] ?>" class="btn btn-info btn-xs">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="?page=surat&actions=edit&no_surat=<?= $data['no_surat'] ?>" class="btn btn-warning btn-xs">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="?page=surat&actions=delete&no_surat=<?= $data['no_surat'] ?>" class="btn btn-danger btn-xs">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <a href="?page=surat&actions=tambah" class="btn btn-warning btn-sm">
                                        Tambahkan Surat Masuk

                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>