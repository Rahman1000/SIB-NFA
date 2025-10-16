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
        // Membuat 15 data Buku, pastikan Author sudah ada
        Book::factory()->count(15)->create();

        // Tambahkan 5 data buku spesifik (atau lebih, karena sudah 15 dari factory)
        // Kita hanya perlu memastikan total 5 data BUKAN hanya 5 data total.
    }
}
