<?php
namespace App\Http\Controllers;

use App\Models\PengembalianBuku;
use App\Models\PeminjamanBuku;
use App\Models\Books;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    // Fungsi untuk menampilkan list pengembalian buku
    public function index()
    {
        // Ambil semua data pengembalian buku
        $pengembalian_bukus = PengembalianBuku::all();

        // Menampilkan view dengan data pengembalian buku
        return view('pengembalian.index', compact('pengembalian_bukus'));
    }
    public function create(Request $request)
    {
        // Ambil semua buku yang sedang dipinjam (ketersediaan_buku = 0)
        $books = Books::where('ketersediaan_buku', 0)->get();
    
        // Jika ada parameter `peminjaman_id`, otomatis pilih data peminjaman terkait
        $peminjaman_id = $request->input('peminjaman_id');
        $selectedPeminjaman = null;
    
        if ($peminjaman_id) {
            $selectedPeminjaman = PeminjamanBuku::with(['user', 'book'])->find($peminjaman_id);
        }
    
        // Ambil semua data peminjaman buku
        $peminjaman_bukus = PeminjamanBuku::with(['user', 'book'])->get();
    
        return view('Pengembalian.create', compact('books', 'peminjaman_bukus', 'selectedPeminjaman'));
    }

    // Fungsi untuk mengatur denda otomatis berdasarkan keterlambatan

    public function setDenda(PengembalianBuku $pengembalianBuku)
{
    // Denda per hari keterlambatan
    $dendaPerHari = 500;

    // Ambil data peminjaman terkait
    $peminjaman = PeminjamanBuku::find($pengembalianBuku->peminjaman_id);

    // Pastikan data peminjaman ditemukan
    if (!$peminjaman) {
        return redirect()->route('pengembalian.index')->with('error', 'Data peminjaman tidak ditemukan.');
    }

    // Hitung selisih waktu antara tanggal pengembalian dan tanggal batas pengembalian
    $tanggalPengembalian = Carbon::parse($pengembalianBuku->tanggal_dikembalikan);
    $tanggalBatasPengembalian = Carbon::parse($peminjaman->tanggal_pengembalian);

    // Jika tanggal pengembalian sudah lewat batas waktu, hitung denda
    $denda = 0;
    if ($tanggalPengembalian->isAfter($tanggalBatasPengembalian)) {
        $keterlambatanHari = $tanggalPengembalian->diffInDays($tanggalBatasPengembalian);
        $denda = $keterlambatanHari * $dendaPerHari; // Denda berdasarkan jumlah hari keterlambatan
    }

    // Simpan nilai numerik denda ke database
    $pengembalianBuku->denda_keterlambatan = $denda;
    $pengembalianBuku->save();

    return redirect()->route('pengembalian.index')->with('success', 'Denda berhasil diperbarui.');
}

    // Fungsi untuk membuat pengembalian buku baru

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'peminjaman_id' => 'required|exists:peminjaman_bukus,id',
            'tanggal_dikembalikan' => 'required|date',
        ]);

        // Ambil data peminjaman terkait
        $peminjaman = PeminjamanBuku::find($request->peminjaman_id);

        // Simpan data pengembalian
        $pengembalian = PengembalianBuku::create([
            'book_id' => $peminjaman->book_id, // Ambil dari data peminjaman
            'user_id' => $peminjaman->user_id, // Ambil dari data peminjaman
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
            'denda_keterlambatan' => 0, // Denda awal di-set 0
        ]);

        // Panggil fungsi untuk mengatur denda otomatis
        $this->setDenda($pengembalian);

        // Update status ketersediaan buku menjadi tersedia (1)
        $book = Books::find($peminjaman->book_id);
        if ($book) {
            $book->ketersediaan_buku = 1; // Set buku menjadi tersedia
            $book->save();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian buku berhasil!');
    }
}

