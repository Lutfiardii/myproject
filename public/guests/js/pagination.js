
    const productsPerPage = 6; // Jumlah produk per halaman
    let currentPage = 1;

    // Fungsi untuk menampilkan produk pada halaman tertentu
    function showProducts(page) {
      const products = document.querySelectorAll('.shop-item');
      const startIndex = (page - 1) * productsPerPage;
      const endIndex = startIndex + productsPerPage;

      products.forEach((product, index) => {
        if (index >= startIndex && index < endIndex) {
          product.style.display = 'block';
        } else {
          product.style.display = 'none';
        }
      });
    }

	// Fungsi untuk mengganti halaman
    function changePage(pageNumber) {
      currentPage = pageNumber;
      showProducts(currentPage);

      // Menandai tombol halaman yang aktif
      const paginationButtons = document.querySelectorAll('#pagination button');
      paginationButtons.forEach((button, index) => {
        if (index === currentPage) {
          button.classList.add('active');
        } else {
          button.classList.remove('active');
        }
      });
    }

    // Fungsi untuk mengganti halaman
    function changePage(pageNumber) {
      document.querySelector('.active').classList.remove('active');
      document.querySelector(`#pagination li:nth-child(${pageNumber + 1}) button`).classList.add('active');
      currentPage = pageNumber;
      showProducts(currentPage);
    }

    // Fungsi untuk halaman sebelumnya
    function prevPage() {
      if (currentPage > 1) {
        changePage(currentPage - 1);
      }
    }

    // Fungsi untuk halaman berikutnya
    function nextPage() {
      const totalProducts = document.querySelectorAll('.shop-item').length;
      const totalPages = Math.ceil(totalProducts / productsPerPage);
      
      if (currentPage < totalPages) {
        changePage(currentPage + 1);
      }
    }

	// Generate tombol halaman
    function generatePaginationButtons() {
      const paginationList = document.getElementById('pagination');
      const maxPages = 5; // Ubah sesuai dengan jumlah maksimal halaman yang ingin ditampilkan

      // Hapus tombol halaman yang ada sebelumnya
      while (paginationList.firstChild) {
        paginationList.removeChild(paginationList.firstChild);
      }

      // Tambahkan tombol halaman sesuai dengan jumlah maksimal halaman
      for (let i = 1; i <= maxPages; i++) {
        const button = document.createElement('button');
        button.textContent = i;
        button.onclick = () => changePage(i);
        paginationList.insertBefore(button, paginationList.lastElementChild);
      }

      // Menandai tombol halaman pertama sebagai aktif saat halaman dimuat
      paginationList.querySelector('button').classList.add('active');
    }

    // Default page
    showProducts(currentPage);

	// Fungsi untuk menampilkan produk pada halaman tertentu
	function showProducts(page) {
	const products = document.querySelectorAll('.shop-item');
	const startIndex = (page - 1) * productsPerPage;
	const endIndex = startIndex + productsPerPage;
	const totalProducts = products.length;

	products.forEach((product, index) => {
		if (index >= startIndex && index < endIndex) {
		product.style.display = 'block';
		} else {
		product.style.display = 'none';
		}
	});

	// Memperbarui teks yang menampilkan jumlah hasil yang ditampilkan
	const startResult = Math.min(totalProducts, startIndex + 1);
	const endResult = Math.min(totalProducts, endIndex);
	document.getElementById('startResult').textContent = startResult;
	document.getElementById('endResult').textContent = endResult;
	document.getElementById('totalResults').textContent = totalProducts;
	}