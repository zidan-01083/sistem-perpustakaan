<!-- filepath: c:\laragon\www\sistem-perpustakaan\resources\views\layouts\app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Digital')</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white font-sans">

    <!-- Header -->
    <header class="bg-gray-900 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex flex-col items-center">
            <!-- Logo -->
            <a href="/" class="text-3xl font-bold text-cyan-400 hover:text-cyan-300 transition mb-4">
                Perpustakaan Digital
            </a>
            <!-- Navigation -->
            <nav>
                <ul class="flex space-x-12">
                    <li><a href="/" class="text-white hover:text-cyan-400 transition">Beranda</a></li>
                    <li><a href="#explore" class="text-white hover:text-cyan-400 transition">Koleksi</a></li>
                    <li><a href="/about" class="text-white hover:text-cyan-400 transition">Tentang</a></li>
                    <li><a href="/contact" class="text-white hover:text-cyan-400 transition">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 py-8 text-center text-gray-400">
        <div class="container mx-auto">
            <p class="text-lg font-semibold text-cyan-400">Perpustakaan Digital</p>
            <p class="text-sm mt-2">
                &copy; 2025 Perpustakaan Digital. Semua hak cipta dilindungi.
            </p>
            <p class="text-sm">
                Designed with ❤️ by Tim Perpustakaan Digital
            </p>
            <div class="mt-4 flex justify-center space-x-4">
                <a href="#" class="text-cyan-400 hover:text-cyan-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.733 0-1.325.592-1.325 1.325v21.351c0 .733.592 1.324 1.325 1.324h21.351c.733 0 1.324-.591 1.324-1.324v-21.351c0-.733-.591-1.325-1.324-1.325zm-13.675 20h-3v-10h3v10zm-1.5-11.5c-.966 0-1.75-.784-1.75-1.75s.784-1.75 1.75-1.75 1.75.784 1.75 1.75-.784 1.75-1.75 1.75zm13.5 11.5h-3v-5.5c0-1.378-.028-3.152-1.922-3.152-1.922 0-2.218 1.5-2.218 3.051v5.601h-3v-10h2.881v1.367h.041c.401-.759 1.379-1.559 2.841-1.559 3.037 0 3.6 2 3.6 4.601v5.591z"/></svg>
                </a>
                <a href="#" class="text-cyan-400 hover:text-cyan-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.723-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.719 0-4.924 2.205-4.924 4.924 0 .386.044.762.128 1.124-4.092-.205-7.719-2.165-10.148-5.144-.424.729-.666 1.577-.666 2.476 0 1.708.869 3.216 2.188 4.099-.807-.026-1.566-.247-2.228-.616v.062c0 2.385 1.693 4.374 3.946 4.827-.413.112-.849.171-1.296.171-.317 0-.626-.031-.928-.088.627 1.956 2.444 3.379 4.6 3.419-1.68 1.318-3.809 2.105-6.115 2.105-.398 0-.79-.023-1.175-.069 2.179 1.396 4.768 2.211 7.548 2.211 9.057 0 14.01-7.504 14.01-14.01 0-.213-.005-.426-.014-.637.961-.694 1.797-1.562 2.457-2.549z"/></svg>
                </a>
                <a href="#" class="text-cyan-400 hover:text-cyan-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.334 3.608 1.309.975.975 1.247 2.242 1.309 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.334 2.633-1.309 3.608-.975.975-2.242 1.247-3.608 1.309-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.334-3.608-1.309-.975-.975-1.247-2.242-1.309-3.608-.058-1.265-.07-1.645-.07-4.849s.012-3.584.07-4.849c.062-1.366.334-2.633 1.309-3.608.975-.975 2.242-1.247 3.608-1.309 1.265-.058 1.645-.07 4.849-.07zm0-2.163c-3.259 0-3.667.013-4.947.072-1.281.059-2.563.334-3.637 1.408-1.074 1.074-1.349 2.356-1.408 3.637-.059 1.28-.072 1.688-.072 4.947s.013 3.667.072 4.947c.059 1.281.334 2.563 1.408 3.637 1.074 1.074 2.356 1.349 3.637 1.408 1.28.059 1.688.072 4.947.072s3.667-.013 4.947-.072c1.281-.059 2.563-.334 3.637-1.408 1.074-1.074 1.349-2.356 1.408-3.637.059-1.28.072-1.688.072-4.947s-.013-3.667-.072-4.947c-.059-1.281-.334-2.563-1.408-3.637-1.074-1.074-2.356-1.349-3.637-1.408-1.28-.059-1.688-.072-4.947-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.324c-2.296 0-4.162-1.866-4.162-4.162s1.866-4.162 4.162-4.162 4.162 1.866 4.162 4.162-1.866 4.162-4.162 4.162zm6.406-11.845c-.796 0-1.441.645-1.441 1.441s.645 1.441 1.441 1.441 1.441-.645 1.441-1.441-.645-1.441-1.441-1.441z"/></svg>
                </a>
            </div>
        </div>
    </footer>

</body>
</html>