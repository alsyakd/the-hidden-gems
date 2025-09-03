@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold mb-4">Kategori</h1>
@auth
  @if(auth()->user()->isAdmin())
    <a href="{{ route('categories.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded">Tambah Kategori</a>
  @endif
@endauth

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
  @foreach($categories as $c)
    <div class="bg-white border rounded p-4">
      <div class="font-semibold">{{ $c->name }}</div>
      <div class="text-sm text-gray-500">{{ $c->posts_count }} post</div>
    </div>
  @endforeach
</div>
@endsection
