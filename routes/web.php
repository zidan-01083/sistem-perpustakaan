<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CreateBookController;
use App\Http\Controllers\ManageBookController;


Route::get('/', [LandingController::class, 'index']);


Route::get('/books', [BookController::class, 'index'])->name('books.index');


Route::get('/books/create', [CreateBookController::class, 'create'])->name('books.create');


Route::post('/books', [CreateBookController::class, 'store'])->name('books.store');

Route::get('/booksmanage', [ManageBookController::class, 'index'])->name('books.index');


Route::get('/books/{id}/edit', [ManageBookController::class, 'edit'])->name('books.edit');


Route::put('/books/{id}', [ManageBookController::class, 'update'])->name('books.update');

Route::delete('/books/{id}', [ManageBookController::class, 'destroy'])->name('books.destroy');