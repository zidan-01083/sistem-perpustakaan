<!-- filepath: c:\laragon\www\sistem-perpustakaan\resources\views\Landing\index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">
<!-- Navbar -->
<nav class="bg-gray-900 text-gray-300 shadow-lg py-6">
    <div class="container mx-auto px-6">
        <!-- Judul -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-100">Perpustakaan Digital UNTUK ADMIN</h1>
            <p class="text-sm text-cyan-400 italic">Menemukan Pengetahuan Tanpa Batas</p>
        </div>

        <!-- Search Bar -->
        <form action="#" method="GET" class="max-w-md mx-auto mb-8">
            <input 
                type="text" 
                placeholder="Cari..." 
                class="w-full rounded-full py-3 px-5 bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-cyan-500 shadow-md"
            />
        </form>

        <!-- Navbar Links -->
<!-- Navbar Links -->
<div class="flex justify-center items-center space-x-8 text-lg font-medium">
    <a href="{{ route('landing') }}" class="hover:text-cyan-500 transition-colors duration-300">Beranda</a>
    <a href="{{ route('peminjaman.index') }}" class="hover:text-cyan-500 transition-colors duration-300">Pinjam Buku</a>
    <a href="{{ route('pengembalian.index') }}" class="hover:text-cyan-500 transition-colors duration-300">Pengembalian Buku</a>

    @guest
        <a href="{{ route('login') }}" class="hover:text-cyan-500 transition-colors duration-300">Masuk</a>
        <a href="{{ route('register') }}" class="hover:text-cyan-500 transition-colors duration-300">Daftar</a>
    @else
        <div class="relative group">
            <button class="flex items-center space-x-2 hover:text-cyan-500 transition-colors duration-300 focus:outline-none">
                <span>{{ Auth::user()->name }}</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div class="absolute right-0 mt-2 w-40 bg-gray-800 rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">
                <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-200 hover:bg-cyan-500 hover:text-white">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-200 hover:bg-red-600 hover:text-white">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    @endguest
</div>
    </div>
</nav>

<!-- Hero Section -->
    <section class="hero-section flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=1600&q=80');">
        <div class="text-center bg-black bg-opacity-50 p-8 rounded-lg">
            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-200 mb-4">
                Selamat Datang di Perpustakaan Digital
            </h1>
            <p class="text-lg md:text-2xl text-gray-300 mb-6">
                Menemukan pengetahuan tanpa batas, kapan saja, di mana saja.
            </p>
            <a href="/books" class="inline-block bg-cyan-500 text-white px-8 py-3 text-lg font-semibold rounded-full hover:bg-cyan-400 transition-all duration-300">
                Jelajahi Sekarang
            </a>
        </div>
    </section>

    <!-- Explore Section -->
    <section id="explore" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800">Jelajahi Koleksi Kami</h2>
                <p class="text-lg text-gray-600 mt-4">
                    Temukan buku digital dan materi perpustakaan terbaru kami, mulai dari fiksi hingga literatur ilmiah.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="card bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="card-icon text-4xl text-cyan-500 mb-4">📚</div>
                    <h3 class="card-title text-2xl font-semibold text-gray-800 mb-2">Buku Fiksi</h3>
                    <p class="card-text text-gray-600">
                        Baca berbagai cerita fiksi yang menegangkan dan menghibur dari seluruh dunia.
                    </p>
                </div>
                <!-- Card 2 -->
                <div class="card bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="card-icon text-4xl text-cyan-500 mb-4">📖</div>
                    <h3 class="card-title text-2xl font-semibold text-gray-800 mb-2">Literatur Ilmiah</h3>
                    <p class="card-text text-gray-600">
                        Akses jurnal ilmiah dan penelitian terbaru untuk memperluas wawasan akademik Anda.
                    </p>
                </div>
                <!-- Card 3 -->
                <div class="card bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="card-icon text-4xl text-cyan-500 mb-4">👶</div>
                    <h3 class="card-title text-2xl font-semibold text-gray-800 mb-2">Buku Anak</h3>
                    <p class="card-text text-gray-600">
                        Temukan buku-buku menarik yang dirancang untuk merangsang imajinasi dan perkembangan anak.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-6">
        <div class="container mx-auto text-center">
            <p class="text-sm">
                &copy; 2025 Perpustakaan Digital. Semua Hak Dilindungi.
            </p>
        </div>
    </footer>

</body>
</html>