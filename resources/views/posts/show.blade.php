@extends('layouts.app')

@section('content')
<article class="max-w-2xl mx-auto px-4 py-8 prose prose-sm sm:prose lg:prose-lg xl:prose-xl bg-white/70 backdrop-blur-md rounded-2xl shadow-md border border-white/30">

  {{-- Judul Post --}}
  <h1 class="text-2xl font-extrabold
             bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
             bg-clip-text text-transparent mb-4">
    {{ $post->title }}
  </h1>

  {{-- Info Post --}}
  <p class="text-sm text-gray-500 mb-4">
    {{ $post->category->name }} • by {{ $post->author->user->name }} •
    {{ optional($post->published_at)->format('d M Y H:i') }}
  </p>

  {{-- Featured Image --}}
  @if($post->featured_image)
    <img src="{{ asset('storage/'.$post->featured_image) }}"
         alt="Featured Image"
         class="w-full rounded-xl shadow-lg my-6 border border-gray-10">
  @endif

  {{-- Konten --}}
  <div class="text-gray-800 leading-relaxed">
    {!! nl2br(e($post->content)) !!}
  </div>

</article>
@endsection
