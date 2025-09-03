@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold mb-4">Tulis Post</h1>
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-2xl">
  @csrf
  <div>
    <label class="block mb-1">Judul</label>
    <input name="title" value="{{ old('title') }}" class="w-full border rounded p-2">
    @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="block mb-1">Kategori</label>
    <select name="category_id" class="w-full border rounded p-2">
      <option value="">-- pilih --</option>
      @foreach($categories as $c)
        <option value="{{ $c->id }}" @selected(old('category_id')==$c->id)>{{ $c->name }}</option>
      @endforeach
    </select>
    @error('category_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="block mb-1">Konten</label>
    <textarea name="content" rows="8" class="w-full border rounded p-2">{{ old('content') }}</textarea>
    @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="block mb-1">Featured Image</label>
    <input type="file" name="featured_image" class="w-full">
    @error('featured_image') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
  <label class="inline-flex items-center gap-2">
    <input type="checkbox" name="published" value="1" {{ old('published')?'checked':'' }}>
    <span>Publish sekarang</span>
  </label>
  <div class="flex gap-2">
    <button class="px-4 py-2 bg-gray-800 text-white rounded">Simpan</button>
    <a href="{{ route('home') }}" class="px-4 py-2 border rounded">Batal</a>
  </div>
</form>
@endsection
