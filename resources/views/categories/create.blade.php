@extends('layouts.app')
@section('content')

<div class="w-full max-w-xs mx-auto">
  {{-- Judul --}}
  <h1 class="text-lg font-extrabold mb-5 text-center
             bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
             bg-clip-text text-transparent">
    Tambah Kategori
  </h1>

  {{-- Form --}}
  <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
    @csrf

    {{-- Nama Kategori --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Nama</label>
      <input name="name" value="{{ old('name') }}"
             class="w-full px-3 py-2 rounded-md border border-gray-300
                    focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm">
      @error('name')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Submit --}}
    <button type="submit"
            class="w-full px-3 py-2 rounded-md bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
                   text-white font-semibold text-sm shadow-md hover:shadow-lg hover:scale-[1.02] transition transform">
      Simpan
    </button>
  </form>
</div>

@endsection
