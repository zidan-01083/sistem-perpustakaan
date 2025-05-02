<?php
namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;

class CreateBookController extends Controller
{
    // Menampilkan form untuk menambahkan buku
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
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

        // Simpan informasi buku
        $book = Books::create([
            'nama_buku' => $request->nama_buku,
            'deskripsi_buku' => $request->deskripsi_buku,
            'pengarang' => $request->pengarang,
            'judul_buku' => $request->judul_buku,
            'genre_buku' => $request->genre_buku,
            'ketersediaan_buku' => $request->ketersediaan_buku,
        ]);

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
        
            // Save the file to storage/app/public/uploads
            $image->storeAs('public/uploads', $imageName);
        
            // Save the relative path to the database
            $book->update([
                'image_name' => $imageName,
                'image_path' => 'uploads/' . $imageName, // Correct relative path
                'mime_type' => $image->getMimeType(),
                'image_size' => $image->getSize(),
            ]);
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }
}
