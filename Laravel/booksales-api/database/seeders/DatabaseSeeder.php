<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// DatabaseSeeder.php

use Illuminate\Database\Seeder;
use Database\Seeders\AuthorSeeder;
use Database\Seeders\BookSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
        ]);
    }
}
