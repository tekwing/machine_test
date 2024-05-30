<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'user_id' => "admin",
            'role' => "admin",
            'name' => "test",
            'email' => "admin@gmail.com",
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'user_id' => "user",
            'name' => "test",
            'email' => "user@gmail.com",
            'password' => Hash::make('1234'),
        ]);
    }
}
