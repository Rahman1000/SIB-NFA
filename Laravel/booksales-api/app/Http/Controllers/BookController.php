<?php

// namespace App\Http\Controllers;

// use App\Models\Book;
// use Illuminate\Http\Request;

// class BookController extends Controller
// {
//     public function index()
//     {
//         // Ambil semua buku, dan muat data author yang terkait
//         $books = Book::with('author')->get(); 

//         return view('books.index', compact('books'));
//     }
// }

// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Menampilkan daftar semua buku (READ - Semua)
     */
    public function index()
    {
        // Mengambil semua buku dengan relasi author (Eager Loading)
        $books = Book::with('author')->get();

        // Mengembalikan response JSON dengan status 200 OK
        return response()->json([
            'status' => 'success',
            'data' => $books
        ], 200);
    }

    /**
     * Menampilkan detail satu buku (READ - Satu)
     */
    public function show($id)
    {
        // Mencari buku berdasarkan ID, dengan relasi author.
        // Jika tidak ditemukan, Laravel secara otomatis melempar 404
        $book = Book::with('author')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $book
        ], 200);
    }
    
    /**
     * Menyimpan buku baru ke database (CREATE)
     */
    public function store(Request $request)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'title' => 'required|string|max:200',
            'author_id' => 'required|exists:authors,id', // Pastikan author_id ada di tabel authors
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // 2. Buat Record Baru
        $book = Book::create($validatedData);

        // 3. Kembalikan Response JSON dengan status 201 CREATED
        return response()->json([
            'status' => 'success',
            'message' => 'Buku berhasil ditambahkan',
            'data' => $book
        ], 201);
    }
}