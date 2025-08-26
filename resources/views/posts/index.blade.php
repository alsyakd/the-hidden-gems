@extends('layouts.app')

@section('title', 'Semua Artikel')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Semua Artikel</h1>
        {{-- @if(in_array(session('user_role'), ['author', 'admin'])) --}}
        <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Artikel Baru
        </a>
        {{-- @endif --}}
    </div>

    @if($posts->isEmpty())
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <p class="text-gray-500 text-lg">Belum ada artikel yang tersedia.</p>
            @if(in_array(session('user_role'), ['author', 'admin']))
            <a href="{{ route('posts.create') }}" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Buat Artikel Pertama
            </a>
            @endif
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="p-4">
                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-100 mb-2">
                        {{ $post->category->name }}
                    </span>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>Oleh: {{ $post->author_name }}</span>
                        <span>{{ $post->published_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">Baca</a>
                        @if(session('user_role') === 'admin' || (session('user_role') === 'author' && session('user_name') === $post->author_name))
                        <a href="{{ route('posts.edit', $post) }}" class="text-green-600 hover:underline">Edit</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($posts->hasPages())
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
        @endif
    @endif
</div>
@endsection
