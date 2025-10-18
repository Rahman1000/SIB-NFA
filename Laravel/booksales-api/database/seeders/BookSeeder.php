<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// BookSeeder.php

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'The Great Adventure',
            'description' => 'An epic journey through uncharted lands.',
            'price' => 19900,
            'stock' => 50,
            'cover_photo' => 'great_adventure.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'title' => 'Mystery of the Old Mansion',
            'description' => 'A thrilling mystery set in a haunted mansion.',
            'price' => 15900,
            'stock' => 30,
            'cover_photo' => 'old_mansion.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => 'Science Facts for Kids',
            'description' => 'A fun and educational book about science for children.',
            'price' => 9900,
            'stock' => 100,
            'cover_photo' => 'science_facts.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ]);

    }
}
