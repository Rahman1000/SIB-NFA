<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// AuthorSeeder.php

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 5 data Penulis
        Author::factory()->count(5)->create();

        // Tambahkan satu data spesifik sebagai contoh
        Author::create([
            'name' => 'J.K. Rowling',
            'nationality' => 'Inggris',
            'birth_year' => 1965,
        ]);
    }
}
