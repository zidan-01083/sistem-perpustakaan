<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengembalian Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])  <!-- Link Tailwind CSS -->
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">Daftar Pengembalian Buku</h1>

        <!-- Tabel Daftar Pengembalian -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama Peminjam</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Tanggal Dikembalikan</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Denda Keterlambatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengembalian_bukus as $pengembalian)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $pengembalian->user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $pengembalian->book->judul_buku }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $pengembalian->tanggal_dikembalikan->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $pengembalian->denda_keterlambatan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('pengembalian.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md mt-4 inline-block">Add New Pengembalian</a>
    </div>

</body>
</html>
