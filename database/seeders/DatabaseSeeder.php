<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'role' => 'customer',
            'username' => 'customer',
            'password' => 'customer',
            'email' => 'test@example.com',
            'address' => 'address customer',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test admin',
            'username' => 'admin',
            'password' => 'admin',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'address' => 'address admin',
        ]);
    }
}
