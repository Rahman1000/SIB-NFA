<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController; // Import Controller
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
|
*/

// Rute default (opsional, untuk navigasi)
Route::get('/', function () {
    return "
        <h1>Selamat Datang di Sistem MVC Sederhana Laravel</h1>
        <ul>
            <li><a href='/genres'>Lihat Data Genre</a></li>
            <li><a href='/authors'>Lihat Data Author</a></li>
            <li><a href='/books'>Lihat Data Buku</a></li>
        </ul>
    ";
});

// Rute untuk menampilkan data Genre
// Memanggil method showGenres dari DataController
Route::get('/genres', [DataController::class, 'showGenres']);

// Rute untuk menampilkan data Author
// Memanggil method showAuthors dari DataController
Route::get('/authors', [DataController::class, 'showAuthors']);


// Rute untuk menampilkan data buku
Route::get('/books', [BookController::class, 'index'])->name('books.index');