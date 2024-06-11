<?php
session_start();
include '../koneksi.php';
if ($_SESSION['username'] != true) {
	echo '<script>window.location="login.php"</script>';
}

$kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE kategori_id = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($kategori) == 0) {
	echo '<script>window.location="data-kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);
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
	<?php include "sidebar.php"; ?>

	<!-- content -->
	<div class="content">
		<div class="form">
			<h2>Edit Data Kategori</h2>
			<form action="" method="post">
				<div class="form-group">
					<label for="name">Nama Kategori:</label>
					<input type="text" id="name" name="nama" value="<?php echo $k->nama_kategori ?>" required>
				</div>
				<div class="form-group">
					<button type="submit" name="submit">Kirim</button>
				</div>
			</form>
		</div>
		<?php
		if (isset($_POST['submit'])) {

			$nama = ucwords($_POST['nama']);

			$update = mysqli_query($conn, "UPDATE kategori SET 
												nama_kategori = '" . $nama . "'
												WHERE kategori_id = '" . $k->kategori_id . "' ");

			if ($update) {
				echo '<script>alert("Edit data berhasil")</script>';
				echo '<script>window.location="data-kategori.php"</script>';
			} else {
				echo 'gagal ' . mysqli_error($conn);
			}
		}
		?>
	</div>


	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2020 - Bukawarung.</small>
		</div>
	</footer>
</body>

</html>