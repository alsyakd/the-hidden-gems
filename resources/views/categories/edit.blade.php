@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="w-full max-w-xs mx-auto">
  {{-- Judul --}}
  <h1 class="text-lg font-extrabold mb-5 text-center
             bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
             bg-clip-text text-transparent">
    Edit Kategori
  </h1>

  {{-- Form --}}
  <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    {{-- Nama Kategori --}}
    <div>
      <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Nama Kategori</label>
      <input type="text" name="name" id="name" required
             class="w-full px-3 py-2 rounded-md border border-gray-300
                    focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm"
             value="{{ old('name', $category->name) }}">
      @error('name')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Deskripsi --}}
    <div>
      <label for="description" class="block mb-1 text-sm font-medium text-gray-700">Deskripsi (opsional)</label>
      <textarea name="description" id="description" rows="3"
                class="w-full px-3 py-2 rounded-md border border-gray-300
                       focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm">{{ old('description', $category->description) }}</textarea>
      @error('description')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Aksi --}}
    <div class="flex justify-between items-center">
      <a href="{{ route('categories.index') }}"
         class="px-4 py-2 rounded-md bg-gray-400 text-white hover:bg-gray-500 transition">
        Batal
      </a>
      <button type="submit"
              class="px-4 py-2 rounded-md bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
                     text-white font-semibold shadow-md hover:shadow-lg hover:scale-[1.02] transition transform">
        Update Kategori
      </button>
    </div>
  </form>
</div>
@endsection
