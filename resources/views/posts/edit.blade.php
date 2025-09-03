@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold mb-4">Edit Post</h1>
<form action="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-2xl">
  @csrf @method('PUT')
  <div>
    <label class="block mb-1">Judul</label>
    <input name="title" value="{{ old('title',$post->title) }}" class="w-full border rounded p-2">
    @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="block mb-1">Kategori</label>
    <select name="category_id" class="w-full border rounded p-2">
      @foreach($categories as $c)
        <option value="{{ $c->id }}" @selected(old('category_id',$post->category_id)==$c->id)>{{ $c->name }}</option>
      @endforeach
    </select>
  </div>
  <div>
    <label class="block mb-1">Konten</label>
    <textarea name="content" rows="8" class="w-full border rounded p-2">{{ old('content',$post->content) }}</textarea>
  </div>
  <div>
    <label class="block mb-1">Featured Image (opsional ganti)</label>
    <input type="file" name="featured_image" class="w-full">
  </div>
  <label class="inline-flex items-center gap-2">
    <input type="checkbox" name="published" value="1" {{ old('published',$post->published)?'checked':'' }}>
    <span>Published</span>
  </label>
  <div class="flex gap-2">
    <button class="px-4 py-2 bg-gray-800 text-white rounded">Update</button>
    <a href="{{ route('dashboard') }}" class="px-4 py-2 border rounded">Kembali</a>
  </div>
</form>
@endsection
