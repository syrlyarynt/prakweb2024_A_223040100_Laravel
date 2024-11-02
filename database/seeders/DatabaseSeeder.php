<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category; // Add this import
use App\Models\Post; // Add this import
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional: Seed single users or posts for testing
        /*
        User::create([
            'name' => 'Syerli Aryanti Nurafifa',
            'username' => 'syerliarynt',
            'email' => 'syerlyarynt@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Post::create([
            'title' => 'Judul Artikel 1',
            'author_id' => 1,
            'category_id' => 1,
            'slug' => 'judul-artikel-1',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...'
        ]);
        */

        // Using factories with recycle
        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    } 
}
