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

    public function create()
    {
        // Ambil semua buku yang tersedia, pengguna dan peminjaman yang ada
        $books = Books::where('ketersediaan_buku', 0)->get();  // Buku yang dipinjam dan belum dikembalikan
        $users = Users::whereHas('peminjamanBuku')->get();
        $peminjaman_bukus = PeminjamanBuku::all();  // Semua data peminjaman buku
        
        return view('Pengembalian.create', compact('books', 'users', 'peminjaman_bukus'));
    }

    // Fungsi untuk mengatur denda otomatis berdasarkan keterlambatan
    public function setDenda(PengembalianBuku $pengembalianBuku)
    {
        // Denda per hari keterlambatan, misalnya 500 per hari
        $dendaPerHari = 500;

        // Ambil data peminjaman terkait
        $peminjaman = PeminjamanBuku::find($pengembalianBuku->peminjaman_id);

        // Hitung selisih waktu antara tanggal pengembalian dan tanggal peminjaman
        $tanggalPengembalian = Carbon::parse($pengembalianBuku->tanggal_dikembalikan);
        $tanggalBatasPengembalian = Carbon::parse($peminjaman->tanggal_pengembalian);

        // Jika tanggal pengembalian sudah lewat batas waktu, hitung denda
        if ($tanggalPengembalian->gt($tanggalBatasPengembalian)) {
            $keterlambatanHari = $tanggalPengembalian->diffInDays($tanggalBatasPengembalian);
            $denda = $keterlambatanHari * $dendaPerHari;  // Denda berdasarkan jumlah hari keterlambatan
        } else {
            $denda = 0;  // Tidak ada denda jika pengembalian tepat waktu
        }

        // Update denda keterlambatan pada data pengembalian
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
            'user_id' => 'required|exists:users,id',
            'peminjaman_id' => 'required|exists:peminjaman_bukus,id',
            'tanggal_dikembalikan' => 'required|date',
        ]);

        // Simpan data pengembalian
        $pengembalian = PengembalianBuku::create([
            'book_id' => $request->book_id,
            'user_id' => $request->user_id,
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
            'denda_keterlambatan' => 0,  // Denda awal di-set 0
        ]);

        // Panggil fungsi untuk mengatur denda otomatis
        $this->setDenda($pengembalian);

        // Redirect dengan pesan sukses
        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian buku berhasil!');
    }
}

