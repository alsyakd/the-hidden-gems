<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create categories
        $categories = [
            ['name' => 'Tempat Tersembunyi', 'description' => 'Lokasi-lokasi menakjubkan yang belum banyak diketahui'],
            ['name' => 'Buku Langka', 'description' => 'Karya sastra yang kurang dikenal namun bernilai tinggi'],
            ['name' => 'Produk Unggulan', 'description' => 'Produk lokal berkualitas yang patut diperhatikan'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create sample posts
        $posts = [
            [
                'title' => 'Gunung Api Purba yang Terlupakan',
                'content' => 'Di balik hiruk pikuk kota metropolitan, tersembunyi sebuah gunung api purba yang menyimpan sejarah panjang...',
                'category_id' => 1,
                'author_name' => 'Joko Widodo',
                'author_role' => 'author',
                'published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Kafe Tersembunyi dengan Kopi Terbaik',
                'content' => 'Tersembunyi di gang kecil, kafe ini menyajikan kopi dengan cita rasa yang tak terlupakan...',
                'category_id' => 1,
                'author_name' => 'Susi Pudjiastuti',
                'author_role' => 'author',
                'published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Novel Klasik yang Jarang Dikenal',
                'content' => 'Meskipun tidak sepopuler karya-karya sastra lainnya, novel ini menyimpan pesona dan kedalaman makna...',
                'category_id' => 2,
                'author_name' => 'Pramoedya Ananta Toer',
                'author_role' => 'author',
                'published' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($posts as $post) {
            $post['slug'] = Str::slug($post['title']);
            $post['excerpt'] = Str::limit(strip_tags($post['content']), 150);
            Post::create($post);
        }
    }
}
