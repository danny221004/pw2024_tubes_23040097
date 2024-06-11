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