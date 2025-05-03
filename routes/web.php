<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CreateBookController;
use App\Http\Controllers\ManageBookController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('Landing.index');
});


Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/sortbyalphabet', [BookController::class, 'sortbyalphabet'])->name('books.sortbyalphabet');
Route::get('/books/sortbynewestrelease', [BookController::class, 'sortbyNewestRelease'])->name('books.sortbynewestrelease');
Route::get('/books/search', [BookController::class, 'searchbookbyname'])->name('books.search');
Route::get('/books/sortbyketersediaan', [BookController::class, 'sortbyketersediaan'])->name('books.sortbyketersediaan');
Route::get('/books/sortbygenre', [BookController::class, 'sortbygenre'])->name('books.sortbygenre');


Route::get('/books/create', [CreateBookController::class, 'create'])->name('books.create');


Route::post('/books', [CreateBookController::class, 'store'])->name('books.store');

Route::get('/booksmanage', [ManageBookController::class, 'index'])->name('books.index');


Route::get('/books/{id}/edit', [ManageBookController::class, 'edit'])->name('books.edit');


Route::put('/books/{id}', [ManageBookController::class, 'update'])->name('books.update');

Route::delete('/books/{id}', [ManageBookController::class, 'destroy'])->name('books.destroy');



Route::get('/peminjaman/index', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [PeminjamanController::class, 'peminjaman'])->name('peminjaman.create');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

