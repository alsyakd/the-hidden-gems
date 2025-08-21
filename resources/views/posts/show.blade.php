@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-100 mb-4">
            {{ $post->category->name }}
        </span>

        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

        <div class="flex items-center text-sm text-gray-500 mb-6">
            <span>Oleh: {{ $post->author_name }}</span>
            <span class="mx-2">•</span>
            <span>{{ $post->published_at->format('d M Y') }}</span>
            @if(session('user_role') === 'admin' || (session('user_role') === 'author' && session('user_name') === $post->author_name))
                <span class="mx-2">•</span>
                <a href="{{ route('posts.edit', $post) }}" class="text-green-600 hover:underline">Edit</a>
            @endif
        </div>

        @if($post->excerpt)
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <p class="text-gray-700 italic">{{ $post->excerpt }}</p>
        </div>
        @endif

        <div class="prose max-w-none text-gray-700 mb-8">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="border-t border-gray-200 pt-6">
            <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Artikel
            </a>
        </div>
    </div>
</div>
@endsection
