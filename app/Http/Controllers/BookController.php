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
}
