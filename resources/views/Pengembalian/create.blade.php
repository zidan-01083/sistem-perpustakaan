<!-- filepath: c:\laragon\www\sistem-perpustakaan\resources\views\Pengembalian\create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengembalian Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])  <!-- Link Tailwind CSS -->
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">Form Pengembalian Buku</h1>

        <!-- Display validation errors -->
        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Pengembalian -->
        <form action="{{ route('pengembalian.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf

            <!-- Pilih Buku -->
            <div class="mb-4">
                <label for="book_id" class="block text-sm font-medium text-gray-700">Pilih Buku</label>
                <select name="book_id" id="book_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->judul_buku }} ({{ $book->genre_buku }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Peminjaman -->
            <div class="mb-4">
                <label for="peminjaman_id" class="block text-sm font-medium text-gray-700">Pilih Peminjaman</label>
                <select name="peminjaman_id" id="peminjaman_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    <option value="">-- Pilih Peminjaman --</option>
                    @foreach($peminjaman_bukus as $peminjaman)
                        <option value="{{ $peminjaman->id }}" data-book-id="{{ $peminjaman->book->id }}" {{ isset($selectedPeminjaman) && $selectedPeminjaman->id == $peminjaman->id ? 'selected' : '' }}>
                            {{ $peminjaman->user->name }} - {{ $peminjaman->book->judul_buku }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pengembalian -->
            <div class="mb-4">
                <label for="tanggal_dikembalikan" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_dikembalikan" id="tanggal_dikembalikan" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md">Kembalikan Buku</button>
        </form>

        <a href="{{ route('pengembalian.index') }}" class="text-blue-500 mt-4 inline-block">Back to Pengembalian List</a>
    </div>

    <!-- JavaScript untuk Pemilihan Otomatis -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bookSelect = document.getElementById('book_id');
            const peminjamanSelect = document.getElementById('peminjaman_id');

            bookSelect.addEventListener('change', function () {
                const selectedBookId = this.value;

                // Reset dropdown peminjaman
                Array.from(peminjamanSelect.options).forEach(option => {
                    if (option.value) {
                        option.style.display = option.getAttribute('data-book-id') === selectedBookId ? 'block' : 'none';
                    }
                });

                // Pilih opsi pertama yang cocok
                const firstVisibleOption = Array.from(peminjamanSelect.options).find(option => option.style.display === 'block');
                peminjamanSelect.value = firstVisibleOption ? firstVisibleOption.value : '';
            });
        });
    </script>

</body>
</html>