<?php
session_start();
include '../koneksi.php';
if ($_SESSION['username'] != true) {
	echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Peansport | Produk</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css" />
	<link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">

<body>
	<?php include "sidebar.php"; ?>
	<!-- content -->
	<div class="content">
		<div class="form">
			<h3>Tambah Data Produk</h3>
			<form action="#" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="category">Kategori:</label>
					<select id="category" name="kategori" required>
						<option value="">Masukan Kategori</option>
						<?php
						$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY kategori_id DESC");
						while ($r = mysqli_fetch_array($kategori)) {
						?>
							<option value="<?php echo $r['kategori_id'] ?>"><?php echo $r['nama_kategori'] ?></option>
						<?php } ?>
						<!-- Tambahkan opsi kategori lainnya sesuai kebutuhan -->
					</select>
				</div>
				<div class="form-group">
					<label for="product_name">Nama Produk:</label>
					<input type="text" id="product_name" name="nama" required>
				</div>
				<div class="form-group">
					<label for="price">Harga:</label>
					<input type="number" id="price" name="harga" required>
				</div>
				<div class="form-group">
					<label for="image">Gambar:</label>
					<input type="file" id="image" name="foto" accept="image/*" required>
				</div>
				<div class="form-group">
					<label for="description">Deskripsi:</label>
					<textarea id="description" name="detail" rows="4" required></textarea>
				</div>
				<div class="form-group">
					<label for="stock">Stok:</label>
					<select id="stock" name="stok" required>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
						<!-- Tambahkan opsi stok lainnya sesuai kebutuhan -->
					</select>
				</div>
				<div class="form-group">
					<button type="submit" name="submit">Simpan</button>
				</div>
			</form>
			<?php
			if (isset($_POST['submit'])) {

				// print_r($_FILES['gambar']);
				// menampung inputan dari form
				$kategori 	= $_POST['kategori'];
				$nama 		= $_POST['nama'];
				$harga 		= $_POST['harga'];
				$detail 	= $_POST['detail'];
				$status 	= $_POST['stok'];

				// menampung data file yang diupload
				$filename = $_FILES['foto']['name'];
				$tmp_name = $_FILES['foto']['tmp_name'];

				$type1 = explode('.', $filename);
				$type2 = $type1[1];

				$newname = 'img' . time() . '.' . $type2;

				// menampung data format file yang diizinkan
				$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

				// validasi format file
				if (!in_array($type2, $tipe_diizinkan)) {
					// jika format file tidak ada di dalam tipe diizinkan
					echo '<script>alert("Format file tidak diizinkan")</scrtip>';
				} else {
					// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
					// proses upload file sekaligus insert ke database
					move_uploaded_file($tmp_name, '../img/' . $newname);

					$insert = mysqli_query($conn, "INSERT INTO produk (kategori_id, nama_produk, harga, detail, foto, stok) VALUES (
										'" . $kategori . "',
										'" . $nama . "',
										'" . $harga . "',
										'" . $detail . "',
										'" . $newname . "',
										'" . $status . "'
											) ");

					if ($insert) {
						echo '<script>alert("Tambah data berhasil")</script>';
						echo '<script>window.location="data-produk.php"</script>';
					} else {
						echo 'gagal ' . mysqli_error($conn);
					}
				}
			}
			?>
		</div>
		<!-- footer -->
		<script>
			CKEDITOR.replace('detail');
		</script>
</body>

</html>