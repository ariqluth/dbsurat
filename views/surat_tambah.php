<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Surat Masuk</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="no_surat" class="col-sm-3 control-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="no_surat" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Surat" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_penerima" class="col-sm-3 control-label">Nama Penerima</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="nama_penerima" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Penerima" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk" class="col-sm-3 control-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_masuk" class="form-control" id="inputEmail3" placeholder="Inputkan Tanggal Masuk" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_pengirim" class="col-sm-3 control-label">Nama Pengirim</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="nama_pengirim" class="form-control" id="inputPassword3" placeholder="Inputkan Nama Pengirim" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="instansi" class="col-sm-3 control-label">Instansi</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="instansi" class="form-control" id="inputPassword3" placeholder="Inputkan Instansi Perusahaan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="perihal" class="col-sm-3 control-label">Perihal</label>
                            <div class="col-sm-9">
                                <input type="text" name="perihal" class="form-control" id="inputPassword3" placeholder="Inputkan Isi Surat" required>
                            </div>
                        </div>


                        <!--Status-->

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="status" class="form-control">
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak ada ">Tidak Ada</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file_surat" class="col-sm-3 control-label">Upload File Surat (PDF)</label>
                            <div class="col-sm-9">
                                <input type="file" name="file_surat" class="form-control" id="file_surat" accept="application/pdf" required>
                                <?php if (isset($file_error_message)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $file_error_message; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan </button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=surat&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Surat Masuk
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if ($_POST) {
    $no_surat = $_POST['no_surat'];
    $nama_penerima = $_POST['nama_penerima'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $nama_pengirim = $_POST['nama_pengirim'];
    $instansi = $_POST['instansi'];
    $perihal = $_POST['perihal'];
    $status = $_POST['status'];

    $file_surat = $_FILES['file_surat'];
    $file_name = $file_surat['name'];
    $file_tmp = $file_surat['tmp_name'];
    $file_size = $file_surat['size'];
    $file_error = $file_surat['error'];

    $allowed_ext = ['pdf'];
    $file_ext = strtolower(end(explode('.', $file_name)));

    if (in_array($file_ext, $allowed_ext)) {
        if ($file_error === 0) {
            if ($file_size <= 5097152) { 
                $file_new_name = uniqid('', true) . '.' . $file_ext;
                $file_destination = 'uploads/' . $file_new_name;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    $sql = "INSERT INTO surat_masuk (no_surat, nama_penerima, tgl_masuk, nama_pengirim, instansi, perihal, status, file_surat) VALUES ('$no_surat', '$nama_penerima', '$tgl_masuk', '$nama_pengirim', '$instansi', '$perihal', '$status', '$file_new_name')";
                    $query = mysqli_query($koneksi, $sql) or die("SQL Simpan Surat Error");

                    if ($query) {
                        echo "<script>window.location.assign('?page=surat&actions=tampil');</script>";
                    } else {
                        $file_error_message = 'Simpan Data Gagal';
                    }
                } else {
                    $file_error_message = 'Upload File Gagal';
                }
            } else {
                $file_error_message = 'Ukuran File Terlalu Besar';
            }
        } else {
            $file_error_message = 'Terjadi Kesalahan Saat Upload';
        }
    } else {
        $file_error_message = 'Ekstensi File Tidak Diperbolehkan';
    }
}
?>
