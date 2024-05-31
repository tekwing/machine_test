<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Shop;
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

        Shop::create([
            'name' => "shop 1",
            'longitude' => '76.8836149',
            'latitude' => '8.5555187',
        ]);

        Shop::create([
            'name' => "shop 2",
            'longitude' => '78.8836149',
            'latitude' => '8.5555187',
        ]);

        Shop::create([
            'name' => "shop 3",
            'longitude' => '77.8836149',
            'latitude' => '8.5555187',
        ]);

        Shop::create([
            'name' => "shop 4",
            'longitude' => '77.8836200',
            'latitude' => '8.5555187',
        ]);

        Shop::create([
            'name' => "shop 5",
            'longitude' => '77.8837000',
            'latitude' => '8.5555187',
        ]);
    }
}
