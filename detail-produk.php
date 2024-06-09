<?php 
	error_reporting(0);
	include './koneksi.php';

	$produk = mysqli_query($conn, "SELECT * FROM produk WHERE produk_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PEANSPORT</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
<body>
<?php include "navbar.php";  ?>
<div class="container">
  <div class="row mt-5">
    <div class="col-sm-5"><img src="img/<?php echo $p->foto ?>" width="100%"></div>
    <div class="col-sm-3"><h3><?php echo $p->nama_produk ?></h3>
					<h4>Rp. <?php echo number_format($p->harga) ?></h4>
					<p>Deskripsi :<br>
						<?php echo $p->detail ?>
					</p></div>
  </div>
  </div>



	<!-- footer -->
	<?php include "footer.php";  ?>

<script src="./js/script.js"></script>
</body>
</html>