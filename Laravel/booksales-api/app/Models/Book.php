<?php

// app/Models/Book.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'price', 'stock'];

    // Definisikan relasi: Satu buku dimiliki oleh satu author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
