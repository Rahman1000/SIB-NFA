<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // Data statis Author
    public static function allAuthors()
    {
        return [
            ['id' => 101, 'name' => 'Isaac Asimov', 'nationality' => 'Amerika', 'birth_year' => 1920],
            ['id' => 102, 'name' => 'J.R.R. Tolkien', 'nationality' => 'Inggris', 'birth_year' => 1892],
            ['id' => 103, 'name' => 'Agatha Christie', 'nationality' => 'Inggris', 'birth_year' => 1890],
            ['id' => 104, 'name' => 'Stephen King', 'nationality' => 'Amerika', 'birth_year' => 1947],
            ['id' => 105, 'name' => 'Jane Austen', 'nationality' => 'Inggris', 'birth_year' => 1775]
        ];
    }
}