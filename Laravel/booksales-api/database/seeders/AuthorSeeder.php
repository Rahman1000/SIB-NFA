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

        Author::create([
            'name' => 'Tere Liye',
            'photo' => 'Tere_Liye.jpg',
            'bio' => 'Tere Liye adalah nama pena (nama samaran) dari Darwis, seorang penulis novel best seller berkebangsaan Indonesia. Ia dikenal sebagai salah satu penulis paling produktif dengan karya yang sangat digemari lintas generasi karena tema-tema yang sederhana, namun mengandung pesan moral, filosofi, dan emosi yang mendalam.'
        ]);
    }
}
