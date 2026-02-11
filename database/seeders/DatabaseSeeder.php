<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
            'peran' => 'admin',
        ]);

        User::create([
            'name' => 'Bu Hani',
            'email' => 'hani@test.com',
            'password' => bcrypt('12345678'),
            'peran' => 'guru',
        ]);

        User::create([
            'name' => 'Daniel',
            'email' => 'daniel@test.com',
            'password' => bcrypt('12345678'),
            'peran' => 'siswa',
        ]);
    }
}
