<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah User</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="username" class="form-control" id="id" placeholder="Inputkan Username" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="paswd" class="col-sm-3 control-label">Paswd</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="paswd" class="form-control" id="id" placeholder="Inputkan Password" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="email" class="form-control" id="id" placeholder="Inputkan Email" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="nama" class="form-control" id="id" placeholder="Inputkan Nama" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-9">
                                <input type="int" name="level" class="form-control" id="level" placeholder="Inputkan level" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="ket" class="col-sm-3 control-label">Ket</label>
                            <div class="col-sm-9">
                                <input type="varchar" name="ket" class="form-control" id="ket" placeholder="Inputkan keterangan" required>
                            </div>
                        </div>


                        <!--Status-->

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan </button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=user&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data User
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
  $username=$_POST['username'];
	$paswd=$_POST['paswd'];
	$email=$_POST['email'];
    $nama=$_POST['nama'];
    $level=$_POST['level'];
    $ket=$_POST['ket'];
    //buat sql
    $sql="INSERT INTO user VALUES ('$username','$paswd','$email','$nama','$level','$ket')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan User Error");
    if ($query){
        echo "<script>window.location.assign('?page=user&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
