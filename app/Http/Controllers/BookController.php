<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    public function index()
    {
        
        $books = Books::all();
        return view('books.index', compact('books')); // Kirim data ke view
    }

    public function sortbyalphabet()
    {
        $books = Books::orderBy('judul_buku', 'asc')->get(); 
        return view('books.index', compact('books'));
    }

    public function sortbyNewestRelease()
    {
        $books = Books::orderBy('created_at', 'desc')->get();  
        return view('books.index', compact('books'));
    }

    public function searchbookbyname(Request $request)
    {
        // Validasi input pencarian
        $request->validate([
            'search' => 'required|string|min:1',  
        ]);

        // Ambil query pencarian dari input
        $searchTerm = $request->input('search');

        // Cari buku berdasarkan nama
        $books = Books::where('judul_buku', 'like', '%' . $searchTerm . '%')->get();

        return view('books.index', compact('books'));  // Kirim hasil pencarian ke view
    }

    public function sortbyketersediaan()
    {
        $books = Books::orderBy('ketersediaan_buku', 'desc')->get();  
        return view('books.index', compact('books'));
    }

    
    public function sortbygenre()
    {
        $books = Books::orderBy('genre_buku', 'asc')->get();  
        return view('books.index', compact('books'));
    }
}
