<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">Form Peminjaman Buku</h1>

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

        <!-- Form Peminjaman -->
        <form action="{{ route('peminjaman.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
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

            <!-- Tanggal Peminjaman -->
            <div class="mb-4">
                <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <!-- Tanggal Pengembalian -->
            <div class="mb-4">
                <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md">Pinjam Buku</button>
        </form>

        <a href="{{ route('peminjaman.index') }}" class="text-blue-500 mt-4 inline-block">Back to Peminjaman List</a>
    </div>

</body>
</html>
