<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEANSPORT | Utama</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php include "navbar.php"; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" name="keyword" id="keyword" placeholder="Cari Produk..." aria-label="Search" />
                    <button class="btn btn-primary" type="button" id="searchButton"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5" id="productContainer">
        <div class="row g-4 p-4">
            <!-- Hasil Pencarian akan ditampilkan di sini -->
            <?php include "proses_pencarian.php"; ?>
        </div>
    </div>
<?php include "footer.php"; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Fungsi untuk melakukan pencarian
            function searchProducts(keyword) {
                $.ajax({
                    url: 'proses_pencarian.php',
                    type: 'GET',
                    data: {keyword: keyword},
                    success:function(response){
                        $('#productContainer').html(response);
                    }
                });
            }

            // Event saat tombol pencarian ditekan
            $('#searchButton').click(function(){
                var keyword = $('#keyword').val();
                searchProducts(keyword);
            });

            // Event saat input pencarian berubah
            $('#keyword').on('input', function(){
                var keyword = $(this).val();
                searchProducts(keyword);
            });

            // Menangani perubahan input pencarian
            $('#keyword').on('input', function() {
                var keyword = $(this).val();
                if (!keyword) {
                    // Jika input kosong, tampilkan semua produk
                    searchProducts('');
                }
            });
        });
    </script>
</body>
</html>
