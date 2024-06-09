<?php 
	session_start();
	include '../koneksi.php';
	if($_SESSION['username'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$produk = mysqli_query($conn, "SELECT * FROM produk WHERE produk_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($produk) == 0){
		echo '<script>window.location="data-produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Peansport</title>
	<link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css" />

</head>
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
			<h3>Edit Data Produk</h3>
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
				<select name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY kategori_id DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
						<option value="<?php echo $r['kategori_id'] ?>" <?php echo ($r['kategori_id'] == $p->kategori_id)? 'selected':''; ?>><?php echo $r['nama_kategori'] ?></option>
						<?php } ?>
					</select>
        </div>
		<div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" id="price" name="harga" value="<?php echo $p->harga ?>" required>
        </div>
		<div class="form-group">
            <label for="nama">Nama Produk:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $p->nama_produk ?>" required>
        </div>
		<div class="form-group">
            <label for="image">Gambar:</label>
			<img src="../img/<?php echo $p->foto ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $p->foto ?>">
					<input type="file" name="foto">
        </div>
		<div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="detail"  value="<?php echo $p->detail ?>" required></textarea>
        </div>
		<div class="form-group">
            <label for="stock">Status :</label>
            <select id="stock" name="stok" required>
                <option value="1" <?php echo ($p->stok == 1)? 'selected':''; ?>>Aktif</option>
                <option value="0" <?php echo ($p->stok == 0)? 'selected':''; ?>>Tidak Aktif</option>
                <!-- Tambahkan opsi stok lainnya sesuai kebutuhan -->
            </select>
        </div>
					<div class="form-group">
            <button type="submit" name="submit">Simpan</button>
        </div>
    </form>
				<?php 
					if(isset($_POST['submit'])){

						// data inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];
						$deskripsi 	= $_POST['detail'];
						$status 	= $_POST['stok'];
						$foto 	 	= $_POST['foto'];

						// data gambar yang baru
						$filename = $_FILES['foto']['name'];
						$tmp_name = $_FILES['foto']['tmp_name'];

						

						// jika admin ganti gambar
						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'img'.time().'.'.$type2;

							// menampung data format file yang diizinkan
							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
							if(!in_array($type2, $tipe_diizinkan)){
								// jika format file tidak ada di dalam tipe diizinkan
								echo '<script>alert("Format file tidak diizinkan")</scrtip>';

							}else{
								unlink('../img/'.$foto);
								move_uploaded_file($tmp_name, '../img/'.$newname);
								$namagambar = $newname;
							}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;
							
						}

						// query update data produk
						$update = mysqli_query($conn, "UPDATE produk SET 
												kategori_id = '".$kategori."',
												nama_produk = '".$nama."',
												harga = '".$harga."',
												detail = '".$deskripsi."',
												foto = '".$namagambar."',
												stok = '".$status."'
												WHERE produk_id = '".$p->produk_id."'	");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="data-produk.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}
						
					}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2024 - Peansport.</small>
		</div>
	</footer>
	<script>
        CKEDITOR.replace( 'detail' );
    </script>
</body>
</html>