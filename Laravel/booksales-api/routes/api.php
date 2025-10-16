<?php

// routes/api.php

use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; // Import Controller
use App\Http\Controllers\GenreController;
use Illuminate\Container\Attributes\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute API untuk aplikasi Anda.
|
*/

// Route dasar untuk mengambil semua buku
// Endpoint yang diakses adalah: /api/books
Route::get('/books', [BookController::class, 'index']);

// Tambahkan route untuk mengambil satu buku (opsional, tetapi standar API)
Route::get('/books/{id}', [BookController::class, 'show']);

// Contoh route POST untuk membuat buku baru
Route::post('/books', [BookController::class, 'store']);

Route::get('/genres', [GenreController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'index']);
