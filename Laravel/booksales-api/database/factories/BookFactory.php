<?php

namespace Database\Factories;

// BookFactory.php

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author; // Pastikan Model Author di-import

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        // Pastikan ada Author di database
        $author = Author::inRandomOrder()->first() ?? Author::factory()->create();

        return [
            'author_id' => $author->id,
            'title' => $this->faker->sentence(4),
            'price' => $this->faker->randomFloat(2, 10000, 500000), // Angka desimal (8, 2)
            'stock' => $this->faker->numberBetween(1, 50),
        ];
    }
}
