<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])  <!-- Link Tailwind CSS -->
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">Daftar Peminjaman Buku</h1>

        <!-- Tabel Daftar Peminjaman -->
        <!-- filepath: c:\laragon\www\sistem-perpustakaan\resources\views\Peminjaman\index.blade.php -->
<table class="min-w-full table-auto">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama Peminjam</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Judul Buku</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Tanggal Peminjaman</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Tanggal Pengembalian</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Denda</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peminjaman_bukus as $peminjaman)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-900">{{ $peminjaman->user->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $peminjaman->book->judul_buku }}</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $peminjaman->tanggal_peminjaman }}</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $peminjaman->tanggal_pengembalian }}</td>
                <td class="px-6 py-4 text-sm text-gray-900">
                    @if($peminjaman->pengembalian)  <!-- Cek apakah pengembalian ada -->
                        {{ 'Rp. ' . number_format($peminjaman->pengembalian->denda_keterlambatan, 0, ',', '.') }}
                    @else
                        {{ 'Rp. 0' }}  <!-- Jika pengembalian tidak ada, tampilkan denda 0 -->
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

        <a href="{{ route('peminjaman.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md mt-4 inline-block">Add New Peminjaman</a>
    </div>

</body>
</html>
