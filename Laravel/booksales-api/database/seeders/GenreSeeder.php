<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 5 data Genre
        Genre::create([
            'name' => 'Adventure',
            'description' => 'Books that involve exciting journeys and exploration.'
        ]);
        Genre::create([
            'name' => 'Mystery',
            'description' => 'Books that involve solving a crime or uncovering secrets.'
        ]);
        Genre::create([
            'name' => 'Science',
            'description' => 'Books that provide scientific knowledge and facts.'
        ]);
        Genre::create([
            'name' => 'Romance',
            'description' => 'Books that focus on romantic relationships.'
        ]);
        Genre::create([
            'name' => 'Fantasy',
            'description' => 'Books that involve magical or supernatural elements.'
        ]);
    }
}
