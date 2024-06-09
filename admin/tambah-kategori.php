<?php 
	session_start();
	include '../koneksi.php';
	if($_SESSION['username'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Peansport</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css" />
	<link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
<body>
	<!-- header -->
	<div class="sidebar">
    <a href="dashboard.php">Beranda</a>
    <a href="#">Profil</a>
    <div class="dropdown">
        <a href="#">Produk</a>
        <div class="dropdown-content">
            <a href="data-produk.php">Data Produk</a>
            <a href="tambah-produk.php">Tambah Produk</a>
        </div>
    </div>
	<div class="dropdown">
        <a href="#">Kategori</a>
        <div class="dropdown-content">
            <a href="data-kategori.php">Data Kategori</a>
            <a href="tambah-kategori.php">Tambah Kategori</a>
        </div>
    </div>
    <a href="#">Kontak</a>
    <a href="#">Logout</a>
</div>
	<!-- content -->
	<div class="content">
	<div class="form">
    <h2>Tambah Data Kategori</h2>
    <form action="#" method="post">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="nama" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit">Kirim</button>
        </div>
    </form>
</div>
				<?php 
					if(isset($_POST['submit'])){

						$nama = ucwords($_POST['nama']);

						$insert = mysqli_query($conn, "INSERT INTO kategori VALUES (
											null,
											'".$nama."') ");
						if($insert){
							echo '<script>alert("Tambah data berhasil")</script>';
							echo '<script>window.location="data-kategori.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
			</div>
	<!-- footer -->

	<script src="../js/menu.js"></script>

</body>
</html>