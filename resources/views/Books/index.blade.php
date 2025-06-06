<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku</title>
    <!-- Link to Tailwind CSS and JavaScript -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">Katalog Buku</h1>

        <div class="mb-4">
            <form action="{{ route('books.search') }}" method="GET">
                <input type="text" name="search" placeholder="Cari Buku..." class="px-4 py-2 border border-gray-300 rounded-md w-1/3" required>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md">Search</button>
            </form>
        </div>

        <div class="mb-4">
            <label for="sort" class="block text-sm font-medium text-gray-700">Sort By:</label>
            <select id="sort" name="sort" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
                <option value="">Pilih Opsi Pengurutan</option>
                <option value="alphabet">Sort by Alphabet (A-Z)</option>
                <option value="newest">Sort by Newest Release</option>
                <option value="ketersediaan">Sort by Availability</option>
                <option value="genre">Sort by Genre</option>
            </select>
        </div>

        <!-- Tabel Katalog Buku -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Gambar</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Pengarang</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Genre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ketersediaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="border-t hover:bg-gray-50">
                            <!-- Gambar -->
                            <td class="px-6 py-4 text-sm text-gray-900">
                                @if($book->image_path)
                                <img src="{{ asset('storage/public/' . $book->image_path) }}" alt="Book Image" class="w-24 h-24 object-cover rounded">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>
                            <!-- Judul Buku -->
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->judul_buku }}</td>
                            <!-- Pengarang -->
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->pengarang }}</td>
                            <!-- Genre -->
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->genre_buku }}</td>
                            <!-- Ketersediaan -->
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $book->ketersediaan_buku ? 'Tersedia' : 'Tidak Tersedia' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>