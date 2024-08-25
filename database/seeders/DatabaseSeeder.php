<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Album;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'Wunsun Tarniho',
            'email' => 'wunsuntarniho@gmail.com',
            'password' => 'wunsun#1234',
        ]);

        Album::factory()->create([
            'name' => 'Uncategory',
            'description' => 'Ini contoh album',
            'user_id' => 1,
        ]);
    }
}
