<?php
namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class ManageBookController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        $books = Books::all();
        return view('books.manage', compact('books'));
    }

    // Menampilkan form untuk mengedit buku
    public function edit($id)
    {
        $book = Books::findOrFail($id);
        return view('books.edit', compact('book')); // Halaman untuk edit buku
    }

    // Mengupdate data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'deskripsi_buku' => 'required|string',
            'pengarang' => 'required|string|max:255',
            'judul_buku' => 'required|string|max:255',
            'genre_buku' => 'required|string|max:255',
            'ketersediaan_buku' => 'required|boolean',
        ]);

        $book = Books::findOrFail($id);
        $book->update($request->all()); // Update buku

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $book = Books::findOrFail($id);
        $book->delete(); // Hapus buku

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
