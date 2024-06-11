<?php

include '../koneksi.php';

if (isset($_GET['idk'])) {
	$delete = mysqli_query($conn, "DELETE FROM kategori WHERE kategori_id = '" . $_GET['idk'] . "' ");
	echo '<script>window.location="data-kategori.php"</script>';
}

if (isset($_GET['idp'])) {
	$produk = mysqli_query($conn, "SELECT foto FROM produk WHERE produk_id = '" . $_GET['idp'] . "' ");
	$p = mysqli_fetch_object($produk);

	unlink('./produk/' . $p->product_image);

	$delete = mysqli_query($conn, "DELETE FROM produk WHERE produk_id = '" . $_GET['idp'] . "' ");
	echo '<script>window.location="data-produk.php"</script>';
}


if (isset($_GET['ida'])) {
	$delete = mysqli_query($conn, "DELETE FROM user WHERE id = '" . $_GET['ida'] . "' ");
	echo '<script>window.location="data-admin.php"</script>';
}
