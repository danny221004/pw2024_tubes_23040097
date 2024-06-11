<?php
include './koneksi.php';

// Dapatkan produk berdasarkan kata kunci jika disediakan
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
    $queryproduk = "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'";
} else {
    // Jika tidak ada kata kunci yang diberikan, ambil semua produk
    $queryproduk = "SELECT * FROM produk";
}

// Eksekusi query produk
$result = mysqli_query($conn, $queryproduk);

// Tampilkan hasil pencarian dalam bentuk card
if (mysqli_num_rows($result) > 0) {
?>
    <div class="row">
        <?php
        while ($p = mysqli_fetch_array($result)) {
        ?>
            <div class="col-md-3 mt-3">
                <div class="card">
                    <img src="img/<?php echo $p['foto'] ?>" class="card-img-top" alt="Produk" />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo ($p['nama_produk']) ?></h5>
                        <p class="card-text">Rp. <?php echo number_format($p['harga']) ?></p>
                        <a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>" class="btn btn-outline-dark">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div> <!-- Close row -->
<?php
} else {
    // Jika tidak ada produk yang ditemukan
    echo "<p class='text-center'>Produk tidak ditemukan</p>";
}
?>