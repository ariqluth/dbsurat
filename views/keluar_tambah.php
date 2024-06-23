<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Surat Keluar</h3>
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
                            <label for="nama_pengirim" class="col-sm-3 control-label">Nama Pengirim</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_pengirim" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Pengirim" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="tgl_keluar" class="col-sm-3 control-label">Tanggal Keluar</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_keluar" class="form-control" id="inputEmail3" placeholder="Inputkan Tanggal Keluar" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nama_penerima" class="col-sm-3 control-label">Nama Penerima</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="nama_penerima" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Penerima" required>
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
                                <input type="text" name="perihal" class="form-control" id="inputPassword3" placeholder="Inputkan Instansi Perusahaan" required>
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
                    <a href="?page=keluar&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Surat Keluar
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
if ($_POST) {
   
    $no_surat = $_POST['no_surat'];
    $nama_pengirim = $_POST['nama_pengirim'];
    $tgl_keluar = $_POST['tgl_keluar'];
    $nama_penerima = $_POST['nama_penerima'];
    $instansi = $_POST['instansi'];
    $perihal = $_POST['perihal'];


    if (isset($_FILES['file_surat'])) {
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
                      
                        $sql = "INSERT INTO surat_keluar (no_surat, nama_pengirim, tgl_keluar, nama_penerima, instansi, perihal, file_surat) VALUES ('$no_surat', '$nama_pengirim', '$tgl_keluar', '$nama_penerima', '$instansi', '$perihal', '$file_new_name')";
                        $query = mysqli_query($koneksi, $sql) or die("SQL Simpan Surat Error");

                        if ($query) {
                            echo "<script>window.location.assign('?page=keluar&actions=tampil');</script>";
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
    } else {
        $file_error_message = 'File Surat Tidak Ditemukan';
    }
}
?>
