<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gerabah Kasongan - Kerajinan Tradisional Modern</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    :root {
      --primary-brown: #8B4513;
      --secondary-brown: #A0522D;
      --light-brown: #D2B48C;
      --cream: #FFF8DC;
      --warm-white: #FEFCF7;
      --dark-brown: #654321;
      --accent-gold: #DAA520;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--warm-white);
    }
    
    h1, h2, h3, h4 {
      font-family: 'Playfair Display', serif;
    }

    .gradient-bg {
      background: linear-gradient(135deg, var(--primary-brown) 0%, var(--secondary-brown) 100%);
    }

    .glass-effect {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15);
    }

    .btn-primary {
      background: linear-gradient(45deg, var(--accent-gold), #F4A460);
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(218, 165, 32, 0.3);
    }

    .section-divider {
      background: linear-gradient(90deg, transparent, var(--light-brown), transparent);
      height: 1px;
      width: 100px;
      margin: 0 auto;
    }

    .mobile-menu {
      transform: translateX(100%);
      transition: transform 0.3s ease;
    }

    .mobile-menu.active {
      transform: translateX(0);
    }

    .parallax-bg {
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    @media (max-width: 768px) {
      .parallax-bg {
        background-attachment: scroll;
      }
    }
  </style>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'primary-brown': '#8B4513',
            'secondary-brown': '#A0522D',
            'light-brown': '#D2B48C',
            'cream': '#FFF8DC',
            'warm-white': '#FEFCF7',
            'dark-brown': '#654321',
            'accent-gold': '#DAA520'
          }
        }
      }
    }
  </script>
</head>

<body class="bg-warm-white text-gray-800 scroll-smooth">

  <!-- Header -->
  <header class="gradient-bg text-white px-6 py-4 fixed top-0 w-full z-50 shadow-2xl">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-3">
        <i class="fas fa-vase text-accent-gold text-2xl"></i>
        <h1 class="text-2xl font-bold tracking-wide">Gerabah Kasongan</h1>
      </div>
      
      <!-- Desktop Navigation -->
      <nav class="space-x-8 hidden md:flex">
        <a href="#home" class="hover:text-accent-gold transition-colors duration-300 font-medium">Beranda</a>
        <a href="#tentang" class="hover:text-accent-gold transition-colors duration-300 font-medium">Tentang</a>
        <a href="#produk" class="hover:text-accent-gold transition-colors duration-300 font-medium">Produk</a>
        <a href="#galeri" class="hover:text-accent-gold transition-colors duration-300 font-medium">Galeri</a>
        <a href="#kontak" class="hover:text-accent-gold transition-colors duration-300 font-medium">Kontak</a>
      </nav>

      <!-- Mobile Menu Button -->
      <button class="md:hidden text-2xl" onclick="toggleMobileMenu()">
        <i class="fas fa-bars"></i>
      </button>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobileMenu" class="mobile-menu fixed top-0 right-0 h-full w-64 gradient-bg shadow-2xl md:hidden">
      <div class="p-6">
        <button class="text-2xl mb-8 float-right" onclick="toggleMobileMenu()">
          <i class="fas fa-times"></i>
        </button>
        <nav class="space-y-6 mt-12">
          <a href="#home" class="block hover:text-accent-gold transition-colors duration-300 font-medium" onclick="toggleMobileMenu()">Beranda</a>
          <a href="#tentang" class="block hover:text-accent-gold transition-colors duration-300 font-medium" onclick="toggleMobileMenu()">Tentang</a>
          <a href="#produk" class="block hover:text-accent-gold transition-colors duration-300 font-medium" onclick="toggleMobileMenu()">Produk</a>
          <a href="#galeri" class="block hover:text-accent-gold transition-colors duration-300 font-medium" onclick="toggleMobileMenu()">Galeri</a>
          <a href="#kontak" class="block hover:text-accent-gold transition-colors duration-300 font-medium" onclick="toggleMobileMenu()">Kontak</a>
        </nav>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="parallax-bg bg-[url('https://images.unsplash.com/photo-1603262110263-08c2f113a5e2')] h-screen flex items-center justify-center text-white relative" id="home">
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/40"></div>
    <div class="relative z-10 text-center px-6 max-w-4xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
      <h2 class="text-6xl md:text-7xl font-bold mb-6 leading-tight">
        Keindahan <span class="text-accent-gold">Gerabah</span><br>
        Tradisional
      </h2>
      <div class="section-divider mb-6"></div>
      <p class="text-xl md:text-2xl mb-8 font-light leading-relaxed">
        Sentuhan budaya dari Kasongan yang tak lekang oleh zaman
      </p>
      <div class="space-x-4">
        <a href="#produk" class="btn-primary text-dark-brown font-semibold px-8 py-4 rounded-full shadow-lg inline-block">
          <i class="fas fa-eye mr-2"></i>Lihat Produk
        </a>
        <a href="#tentang" class="glass-effect text-white font-semibold px-8 py-4 rounded-full shadow-lg inline-block hover:bg-white/20 transition-all duration-300">
          <i class="fas fa-info-circle mr-2"></i>Pelajari Lebih
        </a>
      </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
      <i class="fas fa-chevron-down text-white text-2xl"></i>
    </div>
  </section>

  <!-- Tentang Section -->
  <section id="tentang" class="py-24 px-6 bg-gradient-to-br from-cream to-warm-white">
    <div class="max-w-6xl mx-auto">
      <div class="text-center mb-16" data-aos="fade-up">
        <h3 class="text-5xl font-bold mb-6 text-dark-brown">Tentang Kami</h3>
        <div class="section-divider mb-8"></div>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
          Gerabah Kasongan adalah warisan budaya khas Bantul, Yogyakarta yang telah diwariskan turun-temurun
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-16 items-center">
        <div data-aos="fade-right" data-aos-duration="800">
          <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96" alt="Proses Pembuatan" class="rounded-2xl shadow-2xl w-full h-96 object-cover">
        </div>
        
        <div data-aos="fade-left" data-aos-duration="800">
          <h4 class="text-3xl font-semibold mb-6 text-dark-brown">Warisan Budaya yang Hidup</h4>
          <p class="text-lg leading-relaxed mb-6 text-gray-700">
            Dibuat oleh tangan-tangan ahli, setiap produk kami adalah simbol keindahan dan makna dalam tradisi Jawa yang kental. Kami menjaga kualitas, estetika, dan warisan budaya dalam setiap karya.
          </p>
          
          <div class="space-y-4">
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 bg-accent-gold rounded-full flex items-center justify-center">
                <i class="fas fa-hands text-white"></i>
              </div>
              <div>
                <h5 class="font-semibold text-dark-brown">Handmade Premium</h5>
                <p class="text-gray-600">Dibuat dengan tangan oleh pengrajin berpengalaman</p>
              </div>
            </div>
            
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 bg-secondary-brown rounded-full flex items-center justify-center">
                <i class="fas fa-leaf text-white"></i>
              </div>
              <div>
                <h5 class="font-semibold text-dark-brown">Ramah Lingkungan</h5>
                <p class="text-gray-600">Menggunakan bahan alami tanah liat berkualitas</p>
              </div>
            </div>
            
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 bg-primary-brown rounded-full flex items-center justify-center">
                <i class="fas fa-award text-white"></i>
              </div>
              <div>
                <h5 class="font-semibold text-dark-brown">Kualitas Terjamin</h5>
                <p class="text-gray-600">Standar kualitas tinggi dengan finishing sempurna</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Produk Section -->
  <section id="produk" class="py-24 px-6 bg-warm-white">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16" data-aos="fade-up">
        <h3 class="text-5xl font-bold mb-6 text-dark-brown">Produk Unggulan</h3>
        <div class="section-divider mb-8"></div>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Koleksi eksklusif gerabah tradisional dengan sentuhan modern
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Product 1 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="zoom-in" data-aos-delay="100">
          <div class="relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1613544985155-5c924e367170" alt="Pot Antik" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-110">
            <div class="absolute top-4 right-4 bg-accent-gold text-white px-3 py-1 rounded-full text-sm font-semibold">
              Premium
            </div>
          </div>
          <div class="p-6">
            <h4 class="text-2xl font-semibold mb-3 text-dark-brown">Pot Antik</h4>
            <p class="text-gray-600 mb-4 leading-relaxed">Ukiran tangan tradisional yang elegan dan klasik dengan detail yang memukau</p>
            <div class="flex items-center justify-between">
              <span class="text-2xl font-bold text-primary-brown">Rp 150.000</span>
              <button class="bg-primary-brown text-white px-4 py-2 rounded-lg hover:bg-secondary-brown transition-colors duration-300">
                <i class="fas fa-cart-plus mr-2"></i>Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- Product 2 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="zoom-in" data-aos-delay="200">
          <div class="relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1621500086689-5389e6d78df0" alt="Vas Tanah Liat" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-110">
            <div class="absolute top-4 right-4 bg-secondary-brown text-white px-3 py-1 rounded-full text-sm font-semibold">
              Populer
            </div>
          </div>
          <div class="p-6">
            <h4 class="text-2xl font-semibold mb-3 text-dark-brown">Vas Tanah Liat</h4>
            <p class="text-gray-600 mb-4 leading-relaxed">Perpaduan estetika alami dan fungsi modern untuk dekorasi rumah</p>
            <div class="flex items-center justify-between">
              <span class="text-2xl font-bold text-primary-brown">Rp 200.000</span>
              <button class="bg-primary-brown text-white px-4 py-2 rounded-lg hover:bg-secondary-brown transition-colors duration-300">
                <i class="fas fa-cart-plus mr-2"></i>Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="zoom-in" data-aos-delay="300">
          <div class="relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1621451263025-4a7484181463" alt="Patung Tradisional" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-110">
            <div class="absolute top-4 right-4 bg-dark-brown text-white px-3 py-1 rounded-full text-sm font-semibold">
              Eksklusif
            </div>
          </div>
          <div class="p-6">
            <h4 class="text-2xl font-semibold mb-3 text-dark-brown">Patung Tradisional</h4>
            <p class="text-gray-600 mb-4 leading-relaxed">Representasi budaya Jawa yang penuh nilai simbolik dan artistik</p>
            <div class="flex items-center justify-between">
              <span class="text-2xl font-bold text-primary-brown">Rp 350.000</span>
              <button class="bg-primary-brown text-white px-4 py-2 rounded-lg hover:bg-secondary-brown transition-colors duration-300">
                <i class="fas fa-cart-plus mr-2"></i>Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- Product 4 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="zoom-in" data-aos-delay="400">
          <div class="relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96" alt="Set Peralatan Makan" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-110">
            <div class="absolute top-4 right-4 bg-accent-gold text-white px-3 py-1 rounded-full text-sm font-semibold">
              Terbaru
            </div>
          </div>
          <div class="p-6">
            <h4 class="text-2xl font-semibold mb-3 text-dark-brown">Set Peralatan Makan</h4>
            <p class="text-gray-600 mb-4 leading-relaxed">Koleksi peralatan makan tradisional untuk pengalaman kuliner autentik</p>
            <div class="flex items-center justify-between">
              <span class="text-2xl font-bold text-primary-brown">Rp 275.000</span>
              <button class="bg-primary-brown text-white px-4 py-2 rounded-lg hover:bg-secondary-brown transition-colors duration-300">
                <i class="fas fa-cart-plus mr-2"></i>Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- Product 5 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="zoom-in" data-aos-delay="500">
          <div class="relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1610552062486-944f0b93c5cb" alt="Lampu Hias" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-110">
            <div class="absolute top-4 right-4 bg-primary-brown text-white px-3 py-1 rounded-full text-sm font-semibold">
              Limited
            </div>
          </div>
          <div class="p-6">
            <h4 class="text-2xl font-semibold mb-3 text-dark-brown">Lampu Hias Gerabah</h4>
            <p class="text-gray-600 mb-4 leading-relaxed">Pencahayaan artistik dengan sentuhan tradisional yang hangat</p>
            <div class="flex items-center justify-between">
              <span class="text-2xl font-bold text-primary-brown">Rp 180.000</span>
              <button class="bg-primary-brown text-white px-4 py-2 rounded-lg hover:bg-secondary-brown transition-colors duration-300">
                <i class="fas fa-cart-plus mr-2"></i>Pesan
              </button>
            </div>
          </div>
        </div>

        <!-- Product 6 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="zoom-in" data-aos-delay="600">
          <div class="relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1564758866817-1b94b03043fd" alt="Miniatur Rumah" class="w-full h-64 object-cover transition-transform duration-300 hover:scale-110">
            <div class="absolute top-4 right-4 bg-secondary-brown text-white px-3 py-1 rounded-full text-sm font-semibold">
              Souvenir
            </div>
          </div>
          <div class="p-6">
            <h4 class="text-2xl font-semibold mb-3 text-dark-brown">Miniatur Rumah Jawa</h4>
            <p class="text-gray-600 mb-4 leading-relaxed">Replika rumah tradisional Jawa yang detail dan menawan</p>
            <div class="flex items-center justify-between">
              <span class="text-2xl font-bold text-primary-brown">Rp 125.000</span>
              <button class="bg-primary-brown text-white px-4 py-2 rounded-lg hover:bg-secondary-brown transition-colors duration-300">
                <i class="fas fa-cart-plus mr-2"></i>Pesan
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- View All Products Button -->
      <div class="text-center mt-12" data-aos="fade-up">
        <a href="#" class="btn-primary text-dark-brown font-semibold px-8 py-4 rounded-full shadow-lg inline-block">
          <i class="fas fa-th-large mr-2"></i>Lihat Semua Produk
        </a>
      </div>
    </div>
  </section>

  <!-- Process Section -->
  <section class="py-24 px-6 bg-gradient-to-br from-cream to-light-brown/20">
    <div class="max-w-6xl mx-auto">
      <div class="text-center mb-16" data-aos="fade-up">
        <h3 class="text-5xl font-bold mb-6 text-dark-brown">Proses Pembuatan</h3>
        <div class="section-divider mb-8"></div>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Setiap karya melalui proses yang teliti dan penuh dedikasi
        </p>
      </div>

      <div class="grid md:grid-cols-4 gap-8">
        <div class="text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="w-20 h-20 bg-primary-brown rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-mountain text-white text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-4 text-dark-brown">Pemilihan Tanah Liat</h4>
          <p class="text-gray-600">Tanah liat berkualitas tinggi dipilih dengan teliti untuk hasil terbaik</p>
        </div>

        <div class="text-center" data-aos="fade-up" data-aos-delay="200">
          <div class="w-20 h-20 bg-secondary-brown rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-hands text-white text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-4 text-dark-brown">Pembentukan</h4>
          <p class="text-gray-600">Dibentuk dengan tangan ahli menggunakan teknik tradisional turun-temurun</p>
        </div>

        <div class="text-center" data-aos="fade-up" data-aos-delay="300">
          <div class="w-20 h-20 bg-accent-gold rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-fire text-white text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-4 text-dark-brown">Pembakaran</h4>
          <p class="text-gray-600">Proses pembakaran dengan suhu tinggi untuk kekuatan dan daya tahan optimal</p>
        </div>

        <div class="text-center" data-aos="fade-up" data-aos-delay="400">
          <div class="w-20 h-20 bg-dark-brown rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-palette text-white text-2xl"></i>
          </div>
          <h4 class="text-xl font-semibold mb-4 text-dark-brown">Finishing</h4>
          <p class="text-gray-600">Sentuhan akhir dengan detail ukiran dan pewarnaan yang sempurna</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Galeri Section -->
  <section id="galeri" class="py-24 bg-warm-white px-6">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16" data-aos="fade-up">
        <h3 class="text-5xl font-bold mb-6 text-dark-brown">Galeri Kerajinan</h3>
        <div class="section-divider mb-8"></div>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Koleksi foto karya-karya terbaik kami
        </p>
      </div>

      <!-- Gallery Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
        <div class="relative group overflow-hidden rounded-2xl shadow-lg">
          <img src="https://images.unsplash.com/photo-1631203295902-3f5f4192a409" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="absolute bottom-4 left-4 text-white">
              <h5 class="text-lg font-semibold">Koleksi Vas Artistik</h5>
              <p class="text-sm">Desain modern dengan sentuhan tradisional</p>
            </div>
          </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl shadow-lg">
          <img src="https://images.unsplash.com/photo-1603551382219-89f3d6f6e7d1" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="absolute bottom-4 left-4 text-white">
              <h5 class="text-lg font-semibold">Pot Tanaman Hias</h5>
              <p class="text-sm">Sempurna untuk dekorasi taman</p>
            </div>
          </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl shadow-lg">
          <img src="https://images.unsplash.com/photo-1610552062486-944f0b93c5cb" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="absolute bottom-4 left-4 text-white">
              <h5 class="text-lg font-semibold">Kerajinan Unik</h5>
              <p class="text-sm">Karya seni dengan nilai budaya tinggi</p>
            </div>
          </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl shadow-lg">
          <img src="https://images.unsplash.com/photo-1564758866817-1b94b03043fd" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="absolute bottom-4 left-4 text-white">
              <h5 class="text-lg font-semibold">Miniatur Tradisional</h5>
              <p class="text-sm">Detail yang memukau dalam ukuran mini</p>
            </div
          </div>
        </div>
      </div>

      <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <div class="absolute bottom-4 left-4 text-white">
            <h5 class="text-lg font-semibold">Proses Pembuatan</h5>
            <p class="text-sm">Tangan ahli dalam setiap sentuhan</p>
          </div>
        </div>
      </div>

      <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="https://images.unsplash.com/photo-1621451263025-4a7484181463" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <div class="absolute bottom-4 left-4 text-white">
            <h5 class="text-lg font-semibold">Patung Seni</h5>
            <p class="text-sm">Karya seni dengan makna mendalam</p>
          </div>
        </div>
      </div>
    </div>

    <!-- View More Button -->
    <div class="text-center mt-12" data-aos="fade-up">
      <a href="#" class="btn-primary text-dark-brown font-semibold px-8 py-4 rounded-full shadow-lg inline-block">
        <i class="fas fa-images mr-2"></i>Lihat Galeri Lengkap
      </a>
    </div>
  </div>
</section>

<!-- Testimonial Section -->
<section class="py-24 px-6 bg-gradient-to-br from-light-brown/10 to-cream">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-16" data-aos="fade-up">
      <h3 class="text-5xl font-bold mb-6 text-dark-brown">Testimoni Pelanggan</h3>
      <div class="section-divider mb-8"></div>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Kepuasan pelanggan adalah prioritas utama kami
      </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="100">
        <div class="flex items-center mb-6">
          <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786" alt="Customer" class="w-16 h-16 rounded-full object-cover mr-4">
          <div>
            <h5 class="font-semibold text-dark-brown">Sari Dewi</h5>
            <p class="text-gray-600 text-sm">Jakarta</p>
          </div>
        </div>
        <div class="flex mb-4">
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
        </div>
        <p class="text-gray-700 italic">"Kualitas gerabahnya luar biasa! Detail ukirannya sangat halus dan finishing-nya sempurna. Sangat puas dengan pembelian saya."</p>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="200">
        <div class="flex items-center mb-6">
          <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Customer" class="w-16 h-16 rounded-full object-cover mr-4">
          <div>
            <h5 class="font-semibold text-dark-brown">Budi Santoso</h5>
            <p class="text-gray-600 text-sm">Yogyakarta</p>
          </div>
        </div>
        <div class="flex mb-4">
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
        </div>
        <p class="text-gray-700 italic">"Pelayanan yang ramah dan produk berkualitas tinggi. Gerabah Kasongan memang yang terbaik untuk kerajinan tradisional."</p>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-lg card-hover" data-aos="fade-up" data-aos-delay="300">
        <div class="flex items-center mb-6">
          <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80" alt="Customer" class="w-16 h-16 rounded-full object-cover mr-4">
          <div>
            <h5 class="font-semibold text-dark-brown">Maya Putri</h5>
            <p class="text-gray-600 text-sm">Bandung</p>
          </div>
        </div>
        <div class="flex mb-4">
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
          <i class="fas fa-star text-accent-gold"></i>
        </div>
        <p class="text-gray-700 italic">"Pengiriman cepat dan packaging sangat aman. Produknya sesuai dengan foto dan deskripsi. Highly recommended!"</p>
      </div>
    </div>
  </div>
</section>

<!-- Kontak Section -->
<section id="kontak" class="py-24 px-6 bg-warm-white">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-16" data-aos="fade-up">
      <h3 class="text-5xl font-bold mb-6 text-dark-brown">Hubungi Kami</h3>
      <div class="section-divider mb-8"></div>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Kami siap melayani pesanan dan pertanyaan Anda dengan sepenuh hati
      </p>
    </div>

    <div class="grid md:grid-cols-2 gap-12">
      <!-- Contact Info -->
      <div data-aos="fade-right" data-aos-duration="800">
        <h4 class="text-3xl font-semibold mb-8 text-dark-brown">Informasi Kontak</h4>
        
        <div class="space-y-6">
          <div class="flex items-start space-x-4">
            <div class="w-12 h-12 bg-primary-brown rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-map-marker-alt text-white"></i>
            </div>
            <div>
              <h5 class="font-semibold text-dark-brown mb-2">Alamat</h5>
              <p class="text-gray-600">Jl. Kasongan, Bangunjiwo, Kasihan, Bantul, Yogyakarta 55184</p>
            </div>
          </div>

          <div class="flex items-start space-x-4">
            <div class="w-12 h-12 bg-secondary-brown rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-phone text-white"></i>
            </div>
            <div>
              <h5 class="font-semibold text-dark-brown mb-2">Telepon</h5>
              <p class="text-gray-600">+62 812-3456-7890</p>
              <p class="text-gray-600">+62 274-123-456</p>
            </div>
          </div>

          <div class="flex items-start space-x-4">
            <div class="w-12 h-12 bg-accent-gold rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-envelope text-white"></i>
            </div>
            <div>
              <h5 class="font-semibold text-dark-brown mb-2">Email</h5>
              <p class="text-gray-600">info@gerabahkasongan.com</p>
              <p class="text-gray-600">order@gerabahkasongan.com</p>
            </div>
          </div>

          <div class="flex items-start space-x-4">
            <div class="w-12 h-12 bg-dark-brown rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-clock text-white"></i>
            </div>
            <div>
              <h5 class="font-semibold text-dark-brown mb-2">Jam Operasional</h5>
              <p class="text-gray-600">Senin - Sabtu: 08.00 - 17.00 WIB</p>
              <p class="text-gray-600">Minggu: 09.00 - 15.00 WIB</p>
            </div>
          </div>
        </div>

        <!-- Social Media -->
        <div class="mt-8">
          <h5 class="font-semibold text-dark-brown mb-4">Ikuti Kami</h5>
          <div class="flex space-x-4">
            <a href="#" class="w-12 h-12 bg-primary-brown rounded-full flex items-center justify-center text-white hover:bg-secondary-brown transition-colors duration-300">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-primary-brown rounded-full flex items-center justify-center text-white hover:bg-secondary-brown transition-colors duration-300">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-primary-brown rounded-full flex items-center justify-center text-white hover:bg-secondary-brown transition-colors duration-300">
              <i class="fab fa-whatsapp"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-primary-brown rounded-full flex items-center justify-center text-white hover:bg-secondary-brown transition-colors duration-300">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div data-aos="fade-left" data-aos-duration="800">
        <div class="bg-white p-8 rounded-2xl shadow-lg">
          <h4 class="text-2xl font-semibold mb-6 text-dark-brown">Kirim Pesan</h4>
          <form class="space-y-6">
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-brown focus:border-transparent transition-all duration-300" placeholder="Masukkan nama Anda">
              </div>
              <div>
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-brown focus:border-transparent transition-all duration-300" placeholder="Masukkan email Anda">
              </div>
            </div>
            
            <div>
              <label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
              <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-brown focus:border-transparent transition-all duration-300" placeholder="Masukkan nomor telepon">
            </div>

            <div>
              <label class="block text-gray-700 font-medium mb-2">Subjek</label>
              <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-brown focus:border-transparent transition-all duration-300">
                <option>Pilih subjek</option>
                <option>Pertanyaan Produk</option>
                <option>Pemesanan</option>
                <option>Kustomisasi</option>
                <option>Lainnya</option>
              </select>
            </div>

            <div>
              <label class="block text-gray-700 font-medium mb-2">Pesan</label>
              <textarea rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-brown focus:border-transparent transition-all duration-300" placeholder="Tulis pesan Anda di sini..."></textarea>
            </div>

            <button type="submit" class="w-full btn-primary text-dark-brown font-semibold py-4 rounded-lg shadow-lg">
              <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Map -->
    <div class="mt-16" data-aos="fade-up">
      <div class="bg-white p-4 rounded-2xl shadow-lg">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.6234567890123!2d110.2876543!3d-7.8234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af8f123456789%3A0x1234567890abcdef!2sKasongan%2C%20Bangunjiwo%2C%20Kasihan%2C%20Bantul%2C%20Yogyakarta!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid" 
            class="w-full h-96 rounded-xl border-0" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Section -->
  <section class="py-20 px-6 bg-gradient-to-r from-primary-brown to-secondary-brown">
    <div class="max-w-4xl mx-auto text-center text-white" data-aos="fade-up">
      <h3 class="text-4xl font-bold mb-6">Dapatkan Update Terbaru</h3>
      <p class="text-xl mb-8 opacity-90">Berlangganan newsletter kami untuk mendapatkan informasi produk terbaru dan penawaran khusus</p>
      
      <div class="flex flex-col md:flex-row gap-4 max-w-md mx-auto">
        <input 
          type="email" 
          placeholder="Masukkan email Anda" 
          class="flex-1 px-6 py-4 rounded-full text-gray-800 focus:outline-none focus:ring-4 focus:ring-white/30"
        >
        <button class="bg-accent-gold text-dark-brown font-semibold px-8 py-4 rounded-full hover:bg-yellow-500 transition-colors duration-300">
          <i class="fas fa-envelope mr-2"></i>Berlangganan
        </button>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark-brown text-white py-16 px-6">
    <div class="max-w-6xl mx-auto">
      <div class="grid md:grid-cols-4 gap-8 mb-12">
        <!-- Company Info -->
        <div>
          <div class="flex items-center space-x-3 mb-6">
            <i class="fas fa-vase text-accent-gold text-2xl"></i>
            <h4 class="text-2xl font-bold">Gerabah Kasongan</h4>
          </div>
          <p class="text-gray-300 mb-6 leading-relaxed">
            Warisan budaya Jawa yang dikemas dengan sentuhan modern untuk memenuhi kebutuhan dekorasi dan seni masa kini.
          </p>
          <div class="flex space-x-4">
            <a href="#" class="w-10 h-10 bg-primary-brown rounded-full flex items-center justify-center hover:bg-accent-gold transition-colors duration-300">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-primary-brown rounded-full flex items-center justify-center hover:bg-accent-gold transition-colors duration-300">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-primary-brown rounded-full flex items-center justify-center hover:bg-accent-gold transition-colors duration-300">
              <i class="fab fa-whatsapp"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-primary-brown rounded-full flex items-center justify-center hover:bg-accent-gold transition-colors duration-300">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>

        <!-- Quick Links -->
        <div>
          <h5 class="text-xl font-semibold mb-6">Tautan Cepat</h5>
          <ul class="space-y-3">
            <li><a href="#home" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Beranda</a></li>
            <li><a href="#tentang" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Tentang Kami</a></li>
            <li><a href="#produk" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Produk</a></li>
            <li><a href="#galeri" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Galeri</a></li>
            <li><a href="#kontak" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Kontak</a></li>
          </ul>
        </div>

        <!-- Products -->
        <div>
          <h5 class="text-xl font-semibold mb-6">Kategori Produk</h5>
          <ul class="space-y-3">
            <li><a href="#" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Pot & Vas</a></li>
            <li><a href="#" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Patung Tradisional</a></li>
            <li><a href="#" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Peralatan Makan</a></li>
            <li><a href="#" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Lampu Hias</a></li>
            <li><a href="#" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Souvenir</a></li>
          </ul>
        </div>

        <!-- Contact Info -->
        <div>
          <h5 class="text-xl font-semibold mb-6">Kontak</h5>
          <div class="space-y-4">
            <div class="flex items-start space-x-3">
              <i class="fas fa-map-marker-alt text-accent-gold mt-1"></i>
              <p class="text-gray-300 text-sm">Jl. Kasongan, Bangunjiwo, Kasihan, Bantul, Yogyakarta</p>
            </div>
            <div class="flex items-center space-x-3">
              <i class="fas fa-phone text-accent-gold"></i>
              <p class="text-gray-300 text-sm">+62 812-3456-7890</p>
            </div>
            <div class="flex items-center space-x-3">
              <i class="fas fa-envelope text-accent-gold"></i>
              <p class="text-gray-300 text-sm">info@gerabahkasongan.com</p>
            </div>
            <div class="flex items-center space-x-3">
              <i class="fas fa-clock text-accent-gold"></i>
              <p class="text-gray-300 text-sm">Senin - Sabtu: 08.00 - 17.00</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer Bottom -->
      <div class="border-t border-gray-600 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-300 text-sm mb-4 md:mb-0">
            &copy; 2025 Gerabah Kasongan. Semua Hak Cipta Dilindungi.
          </p>
          <div class="flex space-x-6 text-sm">
            <a href="#" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Kebijakan Privasi</a>
            <a href="#" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">Syarat & Ketentuan</a>
            <a href="#" class="text-gray-300 hover:text-accent-gold transition-colors duration-300">FAQ</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-primary-brown text-white rounded-full shadow-lg hover:bg-secondary-brown transition-all duration-300 opacity-0 invisible">
    <i class="fas fa-chevron-up"></i>
  </button>

  <!-- WhatsApp Float Button -->
  <a href="https://wa.me/6281234567890" target="_blank" class="fixed bottom-8 left-8 w-14 h-14 bg-green-500 text-white rounded-full shadow-lg hover:bg-green-600 transition-all duration-300 flex items-center justify-center animate-pulse">
    <i class="fab fa-whatsapp text-2xl"></i>
  </a>

  <!-- Loading Screen -->
  <div id="loadingScreen" class="fixed inset-0 bg-warm-white z-50 flex items-center justify-center">
    <div class="text-center">
      <div class="w-16 h-16 border-4 border-primary-brown border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
      <p class="text-primary-brown font-semibold">Memuat...</p>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <script>
    // Initialize AOS
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      offset: 100
    });

    // Mobile Menu Toggle
    function toggleMobileMenu() {
      const mobileMenu = document.getElementById('mobileMenu');
      mobileMenu.classList.toggle('active');
    }

    // Back to Top Button
    const backToTopButton = document.getElementById('backToTop');
    
    window.addEventListener('scroll', () => {
      if (window.pageYOffset > 300) {
        backToTopButton.classList.remove('opacity-0', 'invisible');
        backToTopButton.classList.add('opacity-100', 'visible');
      } else {
        backToTopButton.classList.add('opacity-0', 'invisible');
        backToTopButton.classList.remove('opacity-100', 'visible');
      }
    });

    backToTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    // Smooth Scrolling for Navigation Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          const headerOffset = 80;
          const elementPosition = target.offsetTop;
          const offsetPosition = elementPosition - headerOffset;

          window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
          });
        }
      });
    });

    // Loading Screen
    window.addEventListener('load', () => {
      const loadingScreen = document.getElementById('loadingScreen');
      setTimeout(() => {
        loadingScreen.style.opacity = '0';
        setTimeout(() => {
          loadingScreen.style.display = 'none';
        }, 500);
      }, 1000);
    });

    // Header Background on Scroll
    window.addEventListener('scroll', () => {
      const header = document.querySelector('header');
      if (window.scrollY > 100) {
        header.classList.add('backdrop-blur-md', 'bg-primary-brown/95');
      } else {
        header.classList.remove('backdrop-blur-md', 'bg-primary-brown/95');
      }
    });

    // Form Submission
    document.querySelector('form').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Show success message (you can customize this)
      alert('Terima kasih! Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.');
      
      // Reset form
      this.reset();
    });

    // Newsletter Subscription
    document.querySelector('section:nth-last-child(3) button').addEventListener('click', function(e) {
      e.preventDefault();
      const email = this.previousElementSibling.value;
      
      if (email) {
        alert('Terima kasih! Anda telah berlangganan newsletter kami.');
        this.previousElementSibling.value = '';
      } else {
        alert('Mohon masukkan email yang valid.');
      }
    });

    // Add to Cart Animation
    document.querySelectorAll('.fa-cart-plus').forEach(button => {
      button.parentElement.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Add animation class
        this.classList.add('animate-pulse');
        
        // Show success message
        const productName = this.closest('.card-hover').querySelector('h4').textContent;
        alert(${productName} telah ditambahkan ke keranjang!);
        
        // Remove animation class after animation completes
        setTimeout(() => {
          this.classList.remove('animate-pulse');
        }, 1000);
      });
    });

    // Parallax Effect for Hero Section
    window.addEventListener('scroll', () => {
      const scrolled = window.pageYOffset;
      const parallax = document.querySelector('#home');
      const speed = scrolled * 0.5;
      
      if (parallax) {
        parallax.style.transform = translateY(${speed}px);
      }
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
      const mobileMenu = document.getElementById('mobileMenu');
      const menuButton = document.querySelector('button[onclick="toggleMobileMenu()"]');
      
      if (!mobileMenu.contains(e.target) && !menuButton.contains(e.target)) {
        mobileMenu.classList.remove('active');
      }
    });

    // Add active class to navigation links based on scroll position
    
      // Image lazy loading
      const images = document.querySelectorAll('img');
      const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.classList.add('fade-in');
            observer.unobserve(img);
          }
        });
      });
  
      images.forEach(img => {
        imageObserver.observe(img);
      });
  
      // Counter animation for statistics (if you want to add stats section)
      function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        
        const timer = setInterval(() => {
          start += increment;
          element.textContent = Math.floor(start);
          
          if (start >= target) {
            element.textContent = target;
            clearInterval(timer);
          }
        }, 16);
      }
  
      // Typing effect for hero subtitle
      function typeWriter(element, text, speed = 100) {
        let i = 0;
        element.innerHTML = '';
        
        function type() {
          if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
          }
        }
        
        type();
      }
  
      // Initialize typing effect when page loads
      document.addEventListener('DOMContentLoaded', () => {
        const subtitle = document.querySelector('#home p');
        if (subtitle) {
          const originalText = subtitle.textContent;
          setTimeout(() => {
            typeWriter(subtitle, originalText, 50);
          }, 1500);
        }
      });
  
      // Product filter functionality (if you want to add categories)
      function filterProducts(category) {
        const products = document.querySelectorAll('#produk .card-hover');
        
        products.forEach(product => {
          if (category === 'all' || product.dataset.category === category) {
            product.style.display = 'block';
            product.classList.add('animate-fade-in');
          } else {
            product.style.display = 'none';
          }
        });
      }
  
      // Search functionality
      function searchProducts(query) {
        const products = document.querySelectorAll('#produk .card-hover');
        const searchQuery = query.toLowerCase();
        
        products.forEach(product => {
          const title = product.querySelector('h4').textContent.toLowerCase();
          const description = product.querySelector('p').textContent.toLowerCase();
          
          if (title.includes(searchQuery) || description.includes(searchQuery)) {
            product.style.display = 'block';
          } else {
            product.style.display = 'none';
          }
        });
      }
  
      // Price formatter
      function formatPrice(price) {
        return new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 0
        }).format(price);
      }
  
      // Add to favorites functionality
      let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
  
      function toggleFavorite(productId) {
        const index = favorites.indexOf(productId);
        
        if (index > -1) {
          favorites.splice(index, 1);
        } else {
          favorites.push(productId);
        }
        
        localStorage.setItem('favorites', JSON.stringify(favorites));
        updateFavoriteButtons();
      }
  
      function updateFavoriteButtons() {
        const favoriteButtons = document.querySelectorAll('.favorite-btn');
        
        favoriteButtons.forEach(button => {
          const productId = button.dataset.productId;
          const icon = button.querySelector('i');
          
          if (favorites.includes(productId)) {
            icon.classList.remove('far');
            icon.classList.add('fas', 'text-red-500');
          } else {
            icon.classList.remove('fas', 'text-red-500');
            icon.classList.add('far');
          }
        });
      }
  
      // Shopping cart functionality
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
  
      function addToCart(productId, name, price, image) {
        const existingItem = cart.find(item => item.id === productId);
        
        if (existingItem) {
          existingItem.quantity += 1;
        } else {
          cart.push({
            id: productId,
            name: name,
            price: price,
            image: image,
            quantity: 1
          });
        }
        
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        showCartNotification(name);
      }
  
      function updateCartCount() {
        const cartCount = document.querySelector('.cart-count');
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        
        if (cartCount) {
          cartCount.textContent = totalItems;
          cartCount.style.display = totalItems > 0 ? 'block' : 'none';
        }
      }
  
      function showCartNotification(productName) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'fixed top-20 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
        notification.innerHTML = `
          <div class="flex items-center space-x-2">
            <i class="fas fa-check-circle"></i>
            <span>${productName} ditambahkan ke keranjang</span>
          </div>
        `;
        
        document.body.appendChild(notification);
        
        // Show notification
        setTimeout(() => {
          notification.classList.remove('translate-x-full');
        }, 100);
        
        // Hide notification after 3 seconds
        setTimeout(() => {
          notification.classList.add('translate-x-full');
          setTimeout(() => {
            document.body.removeChild(notification);
          }, 300);
        }, 3000);
      }
  
      // Initialize cart count on page load
      document.addEventListener('DOMContentLoaded', () => {
        updateCartCount();
        updateFavoriteButtons();
      });
  
      // Intersection Observer for animations
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };
  
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-in-up');
          }
        });
      }, observerOptions);
  
      // Observe all sections for animation
      document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
      });
  
      // Custom cursor effect (optional)
      const cursor = document.createElement('div');
      cursor.className = 'fixed w-4 h-4 bg-accent-gold rounded-full pointer-events-none z-50 mix-blend-difference transition-transform duration-150';
      cursor.style.display = 'none';
      document.body.appendChild(cursor);
  
      document.addEventListener('mousemove', (e) => {
        cursor.style.left = e.clientX - 8 + 'px';
        cursor.style.top = e.clientY - 8 + 'px';
        cursor.style.display = 'block';
      });
  
      document.addEventListener('mouseleave', () => {
        cursor.style.display = 'none';
      });
  
      // Add hover effects to interactive elements
      document.querySelectorAll('a, button').forEach(element => {
        element.addEventListener('mouseenter', () => {
          cursor.style.transform = 'scale(2)';
        });
        
        element.addEventListener('mouseleave', () => {
          cursor.style.transform = 'scale(1)';
        });
      });
  
      // Performance optimization: Debounce scroll events
      function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
          const later = () => {
            clearTimeout(timeout);
            func(...args);
          };
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
        };
      }
  
      // Apply debounce to scroll events
      const debouncedScrollHandler = debounce(() => {
        // Your scroll handling code here
      }, 10);
  
      window.addEventListener('scroll', debouncedScrollHandler);
  
      // Error handling for images
      document.querySelectorAll('img').forEach(img => {
        img.addEventListener('error', function() {
          this.src = 'https://via.placeholder.com/400x300/D2B48C/8B4513?text=Gerabah+Kasongan';
          this.alt = 'Placeholder Image';
        });
      });
  
      // Print functionality
      function printPage() {
        window.print();
      }
  
      // Share functionality
      async function shareContent(title, text, url) {
        if (navigator.share) {
          try {
            await navigator.share({
              title: title,
              text: text,
              url: url
            });
          } catch (err) {
            console.log('Error sharing:', err);
          }
        } else {
          // Fallback for browsers that don't support Web Share API
          const shareUrl = https://wa.me/?text=${encodeURIComponent(text + ' ' + url)};
          window.open(shareUrl, '_blank');
        }
      }
  
      // Initialize everything when DOM is loaded
      document.addEventListener('DOMContentLoaded', function() {
        // Add any initialization code here
        console.log('Gerabah Kasongan website loaded successfully!');
        
        // Add fade-in class to body for smooth page load
        document.body.classList.add('fade-in');
      });
  
      // Service Worker registration for PWA (optional)
      if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
          navigator.serviceWorker.register('/sw.js')
            .then(registration => {
              console.log('SW registered: ', registration);
            })
            .catch(registrationError => {
              console.log('SW registration failed: ', registrationError);
            });
        });
      }
    
    </script>
  
    <!-- Additional CSS for animations -->
    <style>
      .fade-in {
        opacity: 0;
        animation: fadeIn 0.5s ease-in forwards;
      }
  
      .animate-fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease-out forwards;
      }
  
      @keyframes fadeIn {
        to {
          opacity: 1;
        }
      }
  
      @keyframes fadeInUp {
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
  
      /* Custom scrollbar */
      ::-webkit-scrollbar {
        width: 8px;
      }
  
      ::-webkit-scrollbar-track {
        background: var(--cream);
      }
  
      ::-webkit-scrollbar-thumb {
        background: var(--primary-brown);
        border-radius: 4px;
      }
  
      ::-webkit-scrollbar-thumb:hover {
        background: var(--secondary-brown);
      }
  
      /* Selection color */
      ::selection {
        background: var(--accent-gold);
        color: var(--dark-brown);
      }
  
      /* Focus styles for accessibility */
      *:focus {
        outline: 2px solid var(--accent-gold);
        outline-offset: 2px;
      }
  
      /* Print styles */
      @media print {
        .fixed,
        header,
        footer,
        button {
          display: none !important;
        }
        
        body {
          background: white !important;
          color: black !important;
        }
      }
    </style>
  
  </body>
  </html>