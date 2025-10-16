<?php

// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Ambil semua buku, dan muat data author yang terkait
        $books = Book::with('author')->get(); 

        return view('books.index', compact('books'));
    }
}
