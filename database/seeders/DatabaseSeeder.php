<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'username' => 'Admin',
            'password' => Hash::make('@mantap1'),
            'role' => 'admin',
        ]);
        \App\Models\Gallery::insert([
            [
                'gambar' => NULL,
                'slug'   => 'image1', 
            ],
            [
                'gambar' => NULL,
                'slug'   => 'image2', 
            ],
            [
                'gambar' => NULL,
                'slug'   => 'image3', 
            ],
            [
                'gambar' => NULL,
                'slug'   => 'image4', 
            ],
            [
                'gambar' => NULL,
                'slug'   => 'image5', 
            ],
            [
                'gambar' => NULL,
                'slug'   => 'image6', 
            ],
        ]);
    }
}
