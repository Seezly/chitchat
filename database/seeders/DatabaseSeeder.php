<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'ing.sgutierrez',
            'name' => 'Sergio Gutierrez',
            'email' => 'sergiogutierrez0611@gmail.com',
            'password' => Hash::make("123456789"),
        ]);

        User::factory()->create([
            'username' => 'sermagu06',
            'name' => 'Manuel Lopez',
            'email' => 'manuel@test.com',
            'password' => Hash::make("123456789"),
        ]);

        User::factory()->create([
            'username' => 'seezly',
            'name' => 'Sergio Lopez',
            'email' => 'sergio@test.com',
            'password' => Hash::make("123456789"),
        ]);

        User::factory()->create([
            'username' => 'seezlyer',
            'name' => 'Manuel Gutierrez',
            'email' => 'test@test.com',
            'password' => Hash::make("123456789"),
        ]);

        User::factory()->create([
            'username' => 'rickie',
            'name' => 'Richard Gutierrez',
            'email' => 'richard@test.com',
            'password' => Hash::make("123456789"),
        ]);
    }
}
