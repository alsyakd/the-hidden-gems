@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold mb-4">Tambah Kategori</h1>
<form action="{{ route('categories.store') }}" method="POST" class="max-w-md space-y-4">
  @csrf
  <div>
    <label class="block mb-1">Nama</label>
    <input name="name" class="w-full border rounded p-2" value="{{ old('name') }}">
    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
  <button class="px-4 py-2 bg-gray-800 text-white rounded">Simpan</button>
</form>
@endsection
