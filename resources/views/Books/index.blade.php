<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Link ke Tailwind -->
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">Katalog Buku</h1>

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
                            <td class="px-6 py-4 text-sm text-gray-900">
                                @if($book->image_path)
                                <img src="{{ Storage::url($book->image_path) }}" alt="Book Image" class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->judul_buku }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->pengarang }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->genre_buku }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->ketersediaan_buku ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
