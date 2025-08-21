@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang di The Hidden Gems</h1>
    <p class="text-gray-600 mb-6">Temukan tempat, buku, dan produk underrated yang jarang diketahui orang</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-100 p-4 rounded-lg">
            <h2 class="text-xl font-semibold mb-2">Tempat Tersembunyi</h2>
            <p>Jelajahi lokasi-lokasi menakjubkan yang belum terjamah banyak orang.</p>
        </div>
        <div class="bg-green-100 p-4 rounded-lg">
            <h2 class="text-xl font-semibold mb-2">Buku Langka</h2>
            <p>Temukan karya sastra yang kurang dikenal namun memiliki nilai tinggi.</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-lg">
            <h2 class="text-xl font-semibold mb-2">Produk Unggulan</h2>
            <p>Produk lokal berkualitas yang patut mendapatkan perhatian lebih.</p>
        </div>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-800 mb-4">Artikel Terbaru</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($posts as $post)
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <div class="p-4">
            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-100 mb-2">
                {{ $post->category->name }}
            </span>
            <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
            <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">{{ $post->published_at->format('d M Y') }}</span>
                <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">Baca selengkapnya</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-8">
        <p class="text-gray-500">Belum ada artikel yang tersedia.</p>
    </div>
    @endforelse
</div>

@if($posts->hasPages())
<div class="mt-8">
    {{ $posts->links() }}
</div>
@endif
@endsection
