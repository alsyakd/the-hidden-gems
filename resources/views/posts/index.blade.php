@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold mb-6">Postingan Terbaru</h1>

@auth
  <a href="{{ route('posts.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded">Tulis Post</a>
@endauth

@if($posts->count())
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
      <article class="bg-white border rounded-lg overflow-hidden">
        @if($post->featured_image)
          <img src="{{ asset('storage/'.$post->featured_image) }}" alt="" class="w-full h-40 object-cover">
        @endif
        <div class="p-4">
          <a href="{{ route('posts.show',$post) }}" class="text-lg font-semibold hover:underline">{{ $post->title }}</a>
          <p class="text-sm text-gray-500 mt-1">
            {{ $post->category->name }} • by {{ $post->author->user->name }} • {{ optional($post->published_at)->diffForHumans() }}
          </p>
          <p class="mt-2 text-gray-700">{{ $post->excerpt }}</p>
        </div>
      </article>
    @endforeach
  </div>

  <div class="mt-6">{{ $posts->links() }}</div>
@else
  <p>Belum ada postingan.</p>
@endif
@endsection
