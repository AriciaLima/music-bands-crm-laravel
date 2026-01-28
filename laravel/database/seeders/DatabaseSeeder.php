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
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/6a/Marina_Sena_2022.jpg',
        'description' => 'Cantora e compositora brasileira conhecida pelo álbum De Primeira.',
    ]);

    // Álbuns fixos da Marina Sena
    Album::create([
        'band_id' => $marina->id,
        'name' => 'De Primeira',
        'release_date' => '2021-08-19',
    ]);

    Album::create([
        'band_id' => $marina->id,
        'name' => 'Vício Inerente',
        'release_date' => '2023-04-27',
    ]);

        // Bandas fake + albuns fake
        Band::factory(5)->create()->each(function ($band) {
            Album::factory(3)->create([
                'band_id' => $band->id,
            ]);
        });
    }
}
