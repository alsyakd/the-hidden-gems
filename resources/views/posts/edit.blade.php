@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="w-full max-w-xl mx-auto">

  {{-- Judul --}}
  <h1 class="text-lg font-extrabold mb-5 text-center
             bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
             bg-clip-text text-transparent">
    Edit Post
  </h1>

  {{-- Form --}}
  <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    {{-- Judul --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Judul</label>
      <input name="title" type="text" value="{{ old('title', $post->title) }}"
             class="w-full px-3 py-2 rounded-md border border-gray-300
                    focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm">
      @error('title') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Kategori --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Kategori</label>
      <select name="category_id"
              class="w-full px-3 py-2 rounded-md border border-gray-300
                     focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm">
        <option value="">-- pilih --</option>
        @foreach($categories as $c)
          <option value="{{ $c->id }}" @selected(old('category_id', $post->category_id) == $c->id)>
            {{ $c->name }}
          </option>
        @endforeach
      </select>
      @error('category_id') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Konten --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Konten</label>
      <textarea name="content" rows="6"
                class="w-full px-3 py-2 rounded-md border border-gray-300
                       focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm">{{ old('content', $post->content) }}</textarea>
      @error('content') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Featured Image --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Featured Image (opsional)</label>
      <input type="file" name="featured_image"
             class="w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:ring-2 focus:ring-pink-400">
      @error('featured_image') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
      @if($post->featured_image)
        <p class="text-gray-500 text-xs mt-1">Gambar saat ini: {{ $post->featured_image }}</p>
        <img src="{{ asset('storage/'.$post->featured_image) }}" alt="" class="mt-2 w-full h-40 object-cover rounded">
      @endif
    </div>

    {{-- Publish --}}
    <label class="inline-flex items-center gap-2 text-gray-700 text-sm">
      <input type="checkbox" name="published" value="1" {{ old('published', $post->published) ? 'checked' : '' }}
             class="rounded border-gray-300 text-pink-500 focus:ring-pink-400">
      <span>Publish sekarang</span>
    </label>

    {{-- Buttons --}}
    <div class="flex gap-2">
      <button type="submit"
              class="px-4 py-2 rounded-md bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
                     text-white font-semibold text-sm shadow-md hover:shadow-lg hover:scale-[1.02] transition transform">
        Update
      </button>
      <a href="{{ route('dashboard') }}"
         class="px-4 py-2 rounded-md border border-gray-300 hover:border-pink-500 hover:text-pink-500 transition">
        Batal
      </a>
    </div>

  </form>
</div>
@endsection
