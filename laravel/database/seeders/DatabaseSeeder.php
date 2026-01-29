<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Band;
use App\Models\Album;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin fixo
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'user_type' => 'admin',
        ]);

        // Users normais fake
        User::factory(5)->create([
            'user_type' => 'user',
        ]);

        // ===== Banda fixa: Marina Sena =====
    $marina = Band::create([
        'name' => 'Marina Sena',
        'genre' => 'Pop / MPB',
        'formed_year' => 2021,
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/SENSACIONAL%21_2024_-_MARINA_SENA_%2854312729181%29.jpg/960px-SENSACIONAL%21_2024_-_MARINA_SENA_%2854312729181%29.jpg',
        'description' => 'Cantora e compositora brasileira conhecida pelo álbum De Primeira.',
    ]);

    // Álbuns fixos da Marina Sena
    Album::create([
        'band_id' => $marina->id,
        'name' => 'De Primeira',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/7a/De_Primeira_-_Marina_Sena.png/250px-De_Primeira_-_Marina_Sena.png',
        'release_date' => '2021-08-19',
    ]);

    Album::create([
        'band_id' => $marina->id,
        'name' => 'Vício Inerente',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/1/1a/V%C3%ADcio_Inerente_-_Marina_Sena.png',
        'release_date' => '2023-04-27',
    ]);

        // Bandas fake + albuns fake
        Band::factory(3)->create()->each(function ($band) {
            Album::factory(2)->create([
                'band_id' => $band->id,
            ]);
        });
    }
}
