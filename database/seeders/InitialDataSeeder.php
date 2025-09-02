<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $authorUser = User::create([
            'name' => 'Penulis Satu',
            'email' => 'author@example.com',
            'password' => Hash::make('password'),
            'role' => 'author',
        ]);

        $author = Author::create([
            'user_id' => $authorUser->id,
            'address' => 'Jl. Mawar No. 1',
            'bio' => 'Penulis demo',
        ]);

        $cat = Category::create([
            'name' => 'Umum',
            'slug' => 'umum',
            'description' => 'Kategori umum',
        ]);

        Post::create([
            'category_id' => $cat->id,
            'author_id' => $author->id,
            'title' => 'Halo Dunia',
            'slug' => 'halo-dunia',
            'content' => 'Ini konten pertama.',
            'excerpt' => 'Ini konten pertama.',
            'published' => true,
            'published_at' => now(),
        ]);
    }
}
