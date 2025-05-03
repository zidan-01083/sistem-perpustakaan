<?php
namespace App\Http\Controllers;

use App\Models\PeminjamanBuku;
use App\Models\Books;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
{
    $peminjaman_bukus = PeminjamanBuku::with(['book', 'user'])->get();

    // Denda per hari keterlambatan
    $dendaPerHari = 500;

    // Hitung denda untuk setiap peminjaman
    foreach ($peminjaman_bukus as $peminjaman) {
        $tanggalPengembalian = Carbon::now(); // Tanggal saat ini
        $tanggalBatasPengembalian = Carbon::parse($peminjaman->tanggal_pengembalian);

        if ($tanggalPengembalian->greaterThan($tanggalBatasPengembalian)) {
            $keterlambatanHari = $tanggalPengembalian->diffInDays($tanggalBatasPengembalian);
            $peminjaman->denda = $keterlambatanHari * $dendaPerHari;
        } else {
            $peminjaman->denda = 0; // Tidak ada denda jika belum terlambat
        }
    }

    return view('Peminjaman.index', compact('peminjaman_bukus'));
}

    public function peminjaman()
    {
        // Ambil daftar buku yang tersedia dan pengguna
        $books = Books::where('ketersediaan_buku', 1)->get();  // Hanya buku yang tersedia
        $users = Users::all();  // Ambil semua pengguna
        
        return view('Peminjaman.create', compact('books', 'users'));  // Kirim data buku dan pengguna ke form
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data peminjaman
        $request->validate([
            'book_id' => 'required|exists:books,id',  // Pastikan id buku valid
            'user_id' => 'required|exists:users,id',  // Pastikan id pengguna valid
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman',
        ]);

        // Simpan peminjaman
        $peminjaman = PeminjamanBuku::create([
            'book_id' => $request->book_id,  // Pastikan data book_id diterima
            'user_id' => $request->user_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);

        // Update ketersediaan buku
        $book = Books::find($request->book_id);
        $book->ketersediaan_buku = 0;  // Ubah ketersediaan buku menjadi tidak tersedia
        $book->save();

        return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dipinjam');
    }

}

