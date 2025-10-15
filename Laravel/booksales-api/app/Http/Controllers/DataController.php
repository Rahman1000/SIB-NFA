<?php

// app/Http/Controllers/DataController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;   // Import Model Genre
use App\Models\Author;  // Import Model Author

class DataController extends Controller
{
    // Method untuk menampilkan data Genre
    public function showGenres()
    {
        // 1. Ambil data dari Model
        $genres = Genre::allGenres();

        // 2. Kirim data ke View
        return view('genres.index', compact('genres'));
    }

    // Method untuk menampilkan data Author
    public function showAuthors()
    {
        // 1. Ambil data dari Model
        $authors = Author::allAuthors();

        // 2. Kirim data ke View
        return view('authors.index', compact('authors'));
    }
}
