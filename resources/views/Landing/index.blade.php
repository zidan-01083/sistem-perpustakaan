@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<section class="hero-section flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('https://source.unsplash.com/1600x900/?library,technology');">
    <div class="hero-content">
        <h1 class="text-6xl font-extrabold">
            Selamat Datang di Perpustakaan Digital
        </h1>
        <p class="text-2xl md:text-3xl text-gray-300 opacity-90">
            Menemukan pengetahuan tanpa batas, kapan saja, di mana saja.
        </p>
        <a href="#explore" class="inline-block bg-transparent border-2 border-cyan-400 px-8 py-3 text-lg font-semibold rounded-full hover:bg-cyan-400 hover:text-gray-900 transition-all duration-300">
            Jelajahi Sekarang
        </a>
    </div>
</section>

<section id="explore" class="py-20">
    <div class="text-center">
        <h2>Jelajahi Koleksi Kami</h2>
        <p>
            Temukan buku digital dan materi perpustakaan terbaru kami, mulai dari fiksi hingga literatur ilmiah.
        </p>
        <div class="grid">
            <div class="card">
                <div class="card-icon">📚</div>
                <h3 class="card-title">Buku Fiksi</h3>
                <p class="card-text">
                    Baca berbagai cerita fiksi yang menegangkan dan menghibur dari seluruh dunia.
                </p>
            </div>
            <div class="card">
                <div class="card-icon">📖</div>
                <h3 class="card-title">Literatur Ilmiah</h3>
                <p class="card-text">
                    Akses jurnal ilmiah dan penelitian terbaru untuk memperluas wawasan akademik Anda.
                </p>
            </div>
            <div class="card">
                <div class="card-icon">👶</div>
                <h3 class="card-title">Buku Anak</h3>
                <p class="card-text">
                    Temukan buku-buku menarik yang dirancang untuk merangsang imajinasi dan perkembangan anak.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection