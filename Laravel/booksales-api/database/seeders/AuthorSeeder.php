<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// AuthorSeeder.php

use App\Models\Author;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'name' => 'Isaac Asimov',
            'photo' => 'Isaac_Asimov.jpg',
            'bio' => 'Lahir pada tahun 1920. Penulis fiksi ilmiah dan esai Amerika yang sangat produktif.'
        ]);

        Author::create([
            'name' => 'Agatha Christie',
            'photo' => 'Agatha_Christie.jpg',
            'bio' => 'Lahir pada tahun 1890. Penulis novel misteri Inggris yang terkenal dengan karakter Hercule Poirot dan Miss Marple.'
        ]);
    }
}
