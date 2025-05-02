<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Link Tailwind CSS -->
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">Manage Books</h1>

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

        <!-- Tabel Daftar Buku -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Pengarang</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Genre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ketersediaan</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->judul_buku }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->pengarang }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->genre_buku }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $book->ketersediaan_buku ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 flex space-x-2">
                                <!-- Button untuk Edit -->
                                <a href="{{ route('books.edit', $book->id) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a> |
                                
                                <!-- Button untuk Delete -->
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Link ke form tambah buku -->
        <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md mt-4 inline-block">Add New Book</a>
    </div>

</body>
</html>
