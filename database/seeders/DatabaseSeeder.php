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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Dleen',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Nabaa',
            'email' => 'nabaa@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => 'maintainer',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Ali',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => 'staff',
        ]);
    }
}
