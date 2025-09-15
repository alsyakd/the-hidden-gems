@extends('layouts.app')
@section('content')

<h1 class="text-2xl font-extrabold mb-6
           bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
           bg-clip-text text-transparent">
  Postingan Terbaru
</h1>

@auth
  <div class="mb-6">
    <a href="{{ route('posts.create') }}"
       class="inline-block px-4 py-2 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white rounded shadow-md hover:shadow-lg hover:scale-[1.02] transition transform">
      Tulis Post
    </a>
  </div>
@endauth

@if($posts->count())
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
      <a href="{{ route('posts.show', $post) }}"
         class="block bg-white/80 backdrop-blur-md border border-white/50 rounded-2xl overflow-hidden shadow-md transform transition duration-300 hover:scale-[1.02] hover:shadow-xl">

        {{-- Featured Image --}}
        @if($post->featured_image)
          <img src="{{ asset('storage/'.$post->featured_image) }}"
               alt=""
               class="w-full h-40 object-cover">
        @endif

        <div class="p-4">
          {{-- Title --}}
          <h2 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h2>

          {{-- Info --}}
          <p class="text-sm text-gray-500 mt-1">
            {{ $post->category->name }} • by {{ $post->author->user->name }} • {{ optional($post->published_at)->diffForHumans() }}
          </p>

          {{-- Excerpt --}}
          <p class="mt-2 text-gray-700 text-sm">{{ $post->excerpt }}</p>
        </div>
      </a>
    @endforeach
  </div>

  {{-- Pagination --}}
  <div class="mt-6">{{ $posts->links() }}</div>
@else
  <p class="text-gray-600">Belum ada postingan.</p>
@endif

@endsection
