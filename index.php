<?php

include "koneksi.php";
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
    <?php include "navbar.php"; ?>
	<!-- category -->
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
				<?php 
					$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY kategori_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
					<a href="produk.php?kategori=<?php echo $k['kategori_id'] ?>">
						<div class="col-5">
							<img src="./assets/icons/cart4.svg" width="50px" style="margin-bottom:5px;">
							<p><?php echo $k['nama_kategori'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>
<section class="dark">
<div class="container py-2">
		<div class="h1 text-center text-white" id="pageHeaderTitle">Produk Terbaru</div>
	<div class="row justify-content-between g-4 p-4">
  <?php 
					$produk = mysqli_query($conn, "SELECT * FROM produk WHERE stok = 1 ORDER BY produk_id DESC LIMIT 4");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>
  <div class="col">
    <div class="card h-100 border border-secondary">
      <img src="img/<?php echo $p['foto'] ?>" class="card-img-top" alt="Hollywood Sign on The Hill"/>
      <div class="card-body">
        <h5 class="card-title"><?php echo substr($p['nama_produk'], 0, 30) ?></h5>
        <p class="card-text">
        Rp. <?php echo number_format($p['harga']) ?>
        </p>
        <a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>">
        <button type="submit" class="btn btn-secondary">Secondary</button>
        </a>
      </div>
    </div>
  </div>
  <?php }}else{ ?>
            <p>Produk tidak ada</p>
          <?php } ?>
</div>
</div>
</div>

</section>


<section class="light">
	<div class="container py-2">
		<div class="h1 text-center text-dark" id="pageHeaderTitle">Tentang Kami</div>

		<article class="postcard light blue">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title blue"><a href="#">Sejarah</a></h1>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">
                PEANSPORT didirakan pada tahun 2023 tepatnya pada bulan Oktober
                Arti daru sebuah nama merknya adalah Pean diambil dari bahasa sunda yang artinya "Kaki"
                Dan Sport diambil dari bahasa inggris yang artinya olahraga.
                </div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
					<li class="tag__item play blue">
						<a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="postcard light red">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" style="height: 300px;" src="img/g1.jpg" alt="Image Title" />	
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title red"><a href="#">Peansport</a></h1>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">PEANSPORT adalah sebuah merk brand lokal yang berasal dari Provinsi Banten yang diciptakan oleh seorang anak muda yang kreatif
                    tujuannya dibuat untuk menjual berbagai kebutuhan perawatan sepatu olahraga yang murah dan berkualitas agar tetap menjaga kenyamanan costumer.
                </div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
					<li class="tag__item play red">
						<a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
					</li>
				</ul>
			</div>
		</article>
	</div>
</section>
 <?php include "footer.php"; ?>
</div>
</div>

    <script src="assets/js/script.js"></script>
  </body>
</html>