<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Data statis Genre
    public static function allGenres()
    {
        return [
            ['id' => 1, 'name' => 'Fiksi Ilmiah', 'description' => 'Genre yang melibatkan spekulasi tentang masa depan atau teknologi.'],
            ['id' => 2, 'name' => 'Fantasi', 'description' => 'Genre yang melibatkan sihir, makhluk mitos, dan dunia imajiner.'],
            ['id' => 3, 'name' => 'Misteri', 'description' => 'Genre yang berfokus pada pemecahan teka-teki, kejahatan, atau kasus yang tidak terpecahkan.'],
            ['id' => 4, 'name' => 'Thriller', 'description' => 'Genre yang dirancang untuk memprovokasi kegembiraan dan ketegangan.'],
            ['id' => 5, 'name' => 'Romance', 'description' => 'Genre yang berfokus pada hubungan emosional dan intim.']
        ];
    }
}