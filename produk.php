<?php
include './koneksi.php';

// Inisialisasi $queryproduk menjadi variabel kosong
$queryproduk = '';

// Dapatkan produk berdasarkan kata kunci jika disediakan
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
    $queryproduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'");
}
// Dapatkan produk berdasarkan kategori jika disediakan
else if (isset($_GET['kategori'])) {
    $kategori = mysqli_real_escape_string($conn, $_GET['kategori']);
    $GetKategoriQuery = mysqli_query($conn, "SELECT kategori_id FROM kategori WHERE nama_kategori='$kategori'");
    $kategoriid = mysqli_fetch_array($GetKategoriQuery);
    $queryproduk = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id= '$kategori'");
}
// Jika tidak ada kata kunci atau kategori yang disediakan, dapatkan semua produk
else {
    $queryproduk = mysqli_query($conn, "SELECT * FROM produk");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEANSPORT | Utama</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head>
<body>
<?php include "navbar.php"; ?>
  <div class="container mt-5">
  <h3 class="mb-5 ">Produk</h3>
	<div class="row g-4 p-4 border border-secondary">
	<?php 
					if(mysqli_num_rows($queryproduk) > 0){
						while($p = mysqli_fetch_array($queryproduk)){
				?>
  <div class="col-md-3 ">
    <div class="card h-100 border border-secondary">
      <img src="img/<?php echo $p['foto'] ?>" class="card-img-top" alt="Hollywood Sign on The Hill"/>
      <div class="card-body">
        <h5 class="card-title"><?php echo ($p['nama_produk']) ?></h5>
        <p class="card-text">
        Rp. <?php echo number_format($p['harga']) ?>
        </p>

      </div>
    </div>
  </div>
  <?php }}else{ ?>
            <p>Produk tidak ada</p>
          <?php } ?>
</div>
</div>
<?php include "footer.php"; ?>
<script src="assets/js/script.js"></script>

</body>
</html>
