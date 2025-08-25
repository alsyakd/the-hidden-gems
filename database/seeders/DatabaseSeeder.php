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
            [
                'name' => 'Tempat Tersembunyi',
                'description' => 'Lokasi-lokasi menakjubkan yang belum banyak diketahui',
                'slug' => Str::slug('Tempat Tersembunyi')
            ],
            [
                'name' => 'Buku Langka',
                'description' => 'Karya sastra yang kurang dikenal namun bernilai tinggi',
                'slug' => Str::slug('Buku Langka')
            ],
            [
                'name' => 'Produk Unggulan',
                'description' => 'Produk lokal berkualitas yang patut diperhatikan',
                'slug' => Str::slug('Produk Unggulan')
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create sample posts
        $posts = [
            [
                'title' => 'Gunung Api Purba yang Terlupakan',
                'content' => 'Di balik hiruk pikuk kota metropolitan, tersembunyi sebuah gunung api purba yang menyimpan sejarah panjang. Gunung ini telah lama tertidur dan hanya dikenal oleh penduduk lokal. Keindahan alamnya masih sangat alami dengan vegetasi yang lebat dan air terjun yang jernih. Banyak cerita mistis yang menyelimuti gunung ini, membuatnya semakin menarik untuk dijelajahi.',
                'category_id' => 1,
                'author_name' => 'Joko Widodo',
                'author_role' => 'author',
                'published' => true,
                'published_at' => now(),
                'slug' => Str::slug('Gunung Api Purba yang Terlupakan'),
                'excerpt' => 'Temukan keindahan gunung api purba yang tersembunyi dari keramaian kota'
            ],
            [
                'title' => 'Kafe Tersembunyi dengan Kopi Terbaik',
                'content' => 'Tersembunyi di gang kecil, kafe ini menyajikan kopi dengan cita rasa yang tak terlupakan. Pemiliknya adalah seorang ahli kopi yang telah menekuni profesinya selama lebih dari 20 tahun. Setiap biji kopi dipilih dengan teliti dan diolah dengan teknik khusus. Suasana kafe sangat cozy dengan dekorasi vintage yang membuat pengunjung betah berlama-lama.',
                'category_id' => 1,
                'author_name' => 'Susi Pudjiastuti',
                'author_role' => 'author',
                'published' => true,
                'published_at' => now(),
                'slug' => Str::slug('Kafe Tersembunyi dengan Kopi Terbaik'),
                'excerpt' => 'Nikmati kopi terbaik di kafe tersembunyi yang hanya diketahui oleh segelintir orang'
            ],
            [
                'title' => 'Novel Klasik yang Jarang Dikenal',
                'content' => 'Meskipun tidak sepopuler karya-karya sastra lainnya, novel ini menyimpan pesona dan kedalaman makna yang luar biasa. Ditulis oleh penulis lokal pada era 1960-an, novel ini menggambarkan kehidupan masyarakat dengan sangat detail dan emosional. Karakter-karakter dalam novel sangat kompleks dan relatable, membuat pembaca terbawa dalam cerita.',
                'category_id' => 2,
                'author_name' => 'Pramoedya Ananta Toer',
                'author_role' => 'author',
                'published' => true,
                'published_at' => now(),
                'slug' => Str::slug('Novel Klasik yang Jarang Dikenal'),
                'excerpt' => 'Jelajahi karya sastra klasik yang penuh makna namun kurang dikenal'
            ],
            [
                'title' => 'Kerajinan Tangan dari Desa Terpencil',
                'content' => 'Produk kerajinan tangan ini dibuat oleh pengrajin lokal dari desa terpencil. Menggunakan teknik tradisional yang telah turun-temurun, setiap produk dibuat dengan penuh ketelitian dan cinta. Bahan-bahan yang digunakan adalah bahan alami yang ramah lingkungan. Kualitasnya tidak kalah dengan produk-produk impor, bahkan lebih unik dan memiliki cerita di baliknya.',
                'category_id' => 3,
                'author_name' => 'Dian Sastro',
                'author_role' => 'author',
                'published' => true,
                'published_at' => now(),
                'slug' => Str::slug('Kerajinan Tangan dari Desa Terpencil'),
                'excerpt' => 'Temukan keindahan kerajinan tangan tradisional yang dibuat dengan penuh passion'
            ],
            [
                'title' => 'Pantai Rahasia dengan Pasir Pink',
                'content' => 'Tersembunyi di balik tebing-tebing tinggi, pantai ini memiliki pasir berwarna pink yang sangat langka. Warna pink berasal dari fragmen karang dan organisme laut tertentu. Airnya sangat jernih dengan gradasi warna biru yang memukau. Pantai ini masih sangat alami dan belum banyak dikunjungi wisatawan, sehingga keasriannya masih terjaga.',
                'category_id' => 1,
                'author_name' => 'Ariel Noah',
                'author_role' => 'author',
                'published' => true,
                'published_at' => now(),
                'slug' => Str::slug('Pantai Rahasia dengan Pasir Pink'),
                'excerpt' => 'Jelajahi pantai tersembunyi dengan pasir pink yang memukau'
            ]
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
