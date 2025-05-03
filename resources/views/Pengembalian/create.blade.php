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
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->judul_buku }} ({{ $book->genre_buku }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Pengguna -->
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Pilih Pengguna</label>
                <select name="user_id" id="user_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Peminjaman -->
            <div class="mb-4">
                <label for="peminjaman_id" class="block text-sm font-medium text-gray-700">Pilih Peminjaman</label>
                <select name="peminjaman_id" id="peminjaman_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    @foreach($peminjaman_bukus as $peminjaman)
                        <option value="{{ $peminjaman->id }}">{{ $peminjaman->book->judul_buku }} - {{ $peminjaman->user->name }}</option>
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

</body>
</html>
