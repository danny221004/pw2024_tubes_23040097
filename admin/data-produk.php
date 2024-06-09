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
	<table>
    <thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Gambar</th>
							<th>Status</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (kategori_id) ORDER BY produk_id DESC");
							if(mysqli_num_rows($produk) > 0){
							while($row = mysqli_fetch_array($produk)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['nama_kategori'] ?></td>
							<td><?php echo $row['nama_produk'] ?></td>
							<td>Rp. <?php echo number_format($row['harga']) ?></td>
							<td><a href="../img/<?php echo $row['foto'] ?>" target="_blank"> <img src="../img/<?php echo $row['foto'] ?>" width="50px"> </a></td>
							<td><?php echo ($row['stok'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
							<td>
							<a class="btn btn-warning" href="edit-produk.php?id=<?php echo $row['produk_id'] ?>" role="button">Edit</a>
							<a class="btn btn-danger" href="proses-hapus.php?idp=<?php echo $row['produk_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" role="button">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="7">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
	<!-- footer -->
	<script src="../js/menu.js"></script>

</body>
</html>