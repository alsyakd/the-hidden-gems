@extends('layouts.app')
@section('content')
<article class="prose max-w-none">
  <h1>{{ $post->title }}</h1>
  <p class="text-sm text-gray-500">
    {{ $post->category->name }} • by {{ $post->author->user->name }} • {{ optional($post->published_at)->format('d M Y H:i') }}
  </p>
  @if($post->featured_image)
    <img src="{{ asset('storage/'.$post->featured_image) }}" alt="" class="rounded my-4">
  @endif
  <div>{!! nl2br(e($post->content)) !!}</div>
</article>
@endsection
