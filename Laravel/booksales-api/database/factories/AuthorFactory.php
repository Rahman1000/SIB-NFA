<?php

namespace Database\Factories;

// AuthorFactory.php

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'nationality' => $this->faker->country(),
            'birth_year' => $this->faker->year(),
        ];
    }
}
