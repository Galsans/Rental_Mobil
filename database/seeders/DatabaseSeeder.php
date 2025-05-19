<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            "name" => 'Galih Putra Rakasiwi',
            "email" => 'admin@gmail.com',
            "no_wa" => '0881024345979',
            'img' => '/user/aujW071vzrCoQfyjOArw7PVY70FJKFbIwyXmXzJ7.jpg',
            "password" => Hash::make('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'pegawai',
            'email' => 'pegawai@gmail.com',
            "no_wa" => '0881982345979',
            'password' => Hash::make('password'),
            'role' => 'pegawai',
        ]);
        User::create([
            'name' => 'pegawai2',
            'email' => 'pegawai2@gmail.com',
            "no_wa" => '0881982377979',
            'password' => Hash::make('password'),
            'role' => 'pegawai',
        ]);
        User::create([
            'name' => 'darma',
            'email' => 'user1@gmail.com',
            "no_wa" => '0881024348181',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
        User::create([
            'name' => 'Galih',
            'email' => 'user2@gmail.com',
            "no_wa" => '0881024345979',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $this->call(CategorySeeder::class);
        $this->call(KendaraanSeeder::class);
    }
}
