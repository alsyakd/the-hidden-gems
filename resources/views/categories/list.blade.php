@extends('layouts.app')
@section('content')

<h1 class="text-2xl font-bold mb-6 text-center text-gray-800
           bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
           bg-clip-text text-transparent">
  Kategori
</h1>

@auth
  @if(auth()->user()->isAdmin())
    <div class="text-center mb-6">
      <a href="{{ route('categories.create') }}"
         class="inline-block px-4 py-2 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
                text-white rounded-md shadow hover:scale-[1.05] transition transform">
        + Tambah Kategori
      </a>
    </div>
  @endif
@endauth

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
  @foreach($categories as $c)
    <div class="bg-white border rounded-xl p-5 shadow hover:shadow-lg transform hover:-translate-y-1 transition">
      <div class="font-semibold text-gray-800 text-lg">{{ $c->name }}</div>
      <div class="text-sm text-gray-500 mt-1">
        <span class="inline-block px-2 py-1 bg-gray-100 text-gray-700 rounded-full">
          {{ $c->posts_count }} post
        </span>
      </div>
    </div>
  @endforeach
</div>

@endsection
