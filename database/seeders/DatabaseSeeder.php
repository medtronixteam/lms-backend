<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::updateOrCreate([
            'email' => 'admin@developer.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('Pass@786'),
            'role' => 'admin',
            'gender'=>'male',
        ]);
    }
}
