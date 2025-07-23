🧾 Aplikasi Kasir Penjualan – Laravel 12
Aplikasi Kasir ini adalah sistem point of sale (POS) berbasis web yang dikembangkan menggunakan Laravel 12. Aplikasi ini dirancang untuk memudahkan pengelolaan transaksi penjualan pada toko atau usaha, dengan fitur lengkap mulai dari manajemen data pengguna (admin & karyawan), data pelanggan, barang, transaksi cetak nota, hingga laporan penjualan.

✨ Fitur Utama
👥 Manajemen Pengguna
Sistem login dan manajemen akun pengguna dengan dua peran:

Admin: akses penuh ke semua data dan laporan

Karyawan: akses terbatas untuk transaksi dan pelanggan

📦 Manajemen Barang
CRUD data barang: nama, kode, stok, harga beli & jual, dan kategori barang.

🧑‍💼 Manajemen Pelanggan
Menyimpan data pelanggan seperti nama, nomor telepon, dan histori transaksi.

🔐 Sistem Autentikasi
Menggunakan fitur Laravel Breeze / Laravel UI / Jetstream (opsional) untuk login, register, dan hak akses berbasis role.

💳 Transaksi & Cetak Nota
Proses penjualan otomatis menghitung total dan kembalian. Dilengkapi dengan fitur cetak nota transaksi dalam format PDF atau langsung ke printer.

📈 Laporan Penjualan
Menampilkan ringkasan dan detail laporan penjualan berdasarkan tanggal, barang, atau pengguna. Dapat diekspor ke PDF/Excel (opsional).

💻 Teknologi yang Digunakan
Framework: Laravel 12

Bahasa: PHP 8.2+

Database: MySQL / MariaDB

Frontend: Blade Template + Bootstrap / Tailwind CSS

PDF Export: DomPDF (untuk cetak nota dan laporan)

Authentication: Laravel Breeze / Laravel UI (tergantung setup)

🎯 Tujuan
Aplikasi ini bertujuan untuk mendigitalkan proses transaksi penjualan, mempercepat pelayanan pelanggan, dan memberikan data laporan yang akurat dan siap cetak. Sangat cocok untuk digunakan oleh toko kelontong, apotek, toko pakaian, dan usaha retail lainnya.

