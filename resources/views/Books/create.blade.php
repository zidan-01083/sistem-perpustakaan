<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Link Tailwind CSS -->
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">Add New Book</h1>

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

        <!-- Form for adding new book -->
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
            @csrf  <!-- CSRF token for security -->

            <div class="mb-4">
                <label for="nama_buku" class="block text-sm font-medium text-gray-700">Nama Buku</label>
                <input type="text" name="nama_buku" id="nama_buku" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi_buku" class="block text-sm font-medium text-gray-700">Deskripsi Buku</label>
                <textarea name="deskripsi_buku" id="deskripsi_buku" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required></textarea>
            </div>

            <div class="mb-4">
                <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="judul_buku" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <input type="text" name="judul_buku" id="judul_buku" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="genre_buku" class="block text-sm font-medium text-gray-700">Genre Buku</label>
                <input type="text" name="genre_buku" id="genre_buku" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="ketersediaan_buku" class="block text-sm font-medium text-gray-700">Ketersediaan Buku</label>
                <select name="ketersediaan_buku" id="ketersediaan_buku" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    <option value="1">Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                </select>
            </div>

            <!-- Form for uploading image -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md">Save Book</button>
        </form>

        <a href="{{ route('books.index') }}" class="text-blue-500 mt-4 inline-block">Back to Books List</a>
    </div>

</body>
</html>
