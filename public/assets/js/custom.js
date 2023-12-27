
    // Mendapatkan elemen-elemen yang diperlukan
    var productSelect = document.getElementById('product_id');
    var quantityInput = document.getElementById('kuantitas');
    var subtotalInput = document.getElementById('subtotal');

    // Menambahkan event listener ke input product dan quantity
    productSelect.addEventListener('change', updateSubtotal);
    quantityInput.addEventListener('input', updateSubtotal);

    // Fungsi untuk menghitung subtotal
    function updateSubtotal() {
        // Mendapatkan harga produk dari opsi yang dipilih
        var selectedProductId = productSelect.value;
        var selectedProduct = document.querySelector('option[value="' + selectedProductId + '"]');
        var productPrice = selectedProduct.getAttribute('data-harga');

        // Mendapatkan jumlah kuantitas
        var quantity = parseInt(quantityInput.value) || 0;

        // Menghitung subtotal
        var subtotal = productPrice * quantity;

        // Menampilkan subtotal pada input subtotal
        subtotalInput.value = subtotal;
    }
