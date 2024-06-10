<?php
error_reporting(0);
include './koneksi.php';

$produk = mysqli_query($conn, "SELECT * FROM produk WHERE produk_id = '" . $_GET['id'] . "' ");
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
        <div class="row py-5">
            <div class="col-lg-4 col-sm-6">
                <div class="lc-block ratio ratio-1x1">
                    <img style="object-fit:cover" class="img-fluid" src="img/<?php echo $p->foto ?>">
                </div><!-- /lc-block -->
            </div><!-- /col -->
            <div class="col-lg-4 offset-lg-1">
                <div class="lc-block my-5">
                    <div editable="rich">
                        <h2 class="rfs-25"><?php echo $p->nama_produk ?></h2>
                        <h2 class="">Rp. <?php echo number_format($p->harga) ?></h2>
                    </div>
                </div>
                <div class="lc-block my-5">
                    <div editable="rich">
                        <p><?php echo $p->detail ?></p>
                    </div>
                </div><!-- /lc-block -->
                <div class="lc-block">
                    <a class="btn btn-danger btn-lg" href="https://shopee.co.id/peansport" role="button"><i class="bi bi-cart4"> Beli Sekarang</i></a>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
    <!-- footer -->
    <?php include "footer.php";  ?>

    <script src="./js/script.js"></script>
</body>

</html>