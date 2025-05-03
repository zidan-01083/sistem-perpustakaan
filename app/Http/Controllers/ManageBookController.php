<?php
namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('books.edit', compact('book'));
    }

    // Mengupdate data buku dan gambar
    public function update(Request $request, $id)
    {
        // Validasi data buku dan gambar
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'deskripsi_buku' => 'required|string',
            'pengarang' => 'required|string|max:255',
            'judul_buku' => 'required|string|max:255',
            'genre_buku' => 'required|string|max:255',
            'ketersediaan_buku' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi gambar
        ]);

        $book = Books::findOrFail($id);

        // Update informasi buku
        $book->update([
            'nama_buku' => $request->nama_buku,
            'deskripsi_buku' => $request->deskripsi_buku,
            'pengarang' => $request->pengarang,
            'judul_buku' => $request->judul_buku,
            'genre_buku' => $request->genre_buku,
            'ketersediaan_buku' => $request->ketersediaan_buku,
        ]);

        // Proses upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada
            if ($book->image_path && Storage::exists('public/' . $book->image_path)) {
                Storage::delete('public/' . $book->image_path);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            // Simpan gambar di storage/app/public/uploads
            $image->storeAs('public/uploads', $imageName);

            // Update path gambar di database
            $book->update([
                'image_name' => $imageName,
                'image_path' => 'uploads/' . $imageName,  // Path relatif yang benar
                'mime_type' => $image->getMimeType(),
                'image_size' => $image->getSize(),
            ]);
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $book = Books::findOrFail($id);

        // Menghapus gambar terkait jika ada
        if ($book->image_path && Storage::exists('public/' . $book->image_path)) {
            Storage::delete('public/' . $book->image_path);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}

