@extends('layouts.app')

@section('content')
<div class="w-full max-w-xs mx-auto">

  {{-- Judul --}}
  <h1 class="text-lg font-extrabold mb-5 text-center
             bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
             bg-clip-text text-transparent">
    Register
  </h1>

  {{-- Form --}}
  <form action="{{ route('register.store') }}" method="POST" class="space-y-3">
    @csrf

    {{-- Nama --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Nama</label>
      <input name="name" value="{{ old('name') }}"
             class="w-full px-3 py-2 rounded-md border border-gray-300
                    focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm">
      @error('name')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Email --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
      <input name="email" type="email" value="{{ old('email') }}"
             class="w-full px-3 py-2 rounded-md border border-gray-300
                    focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm">
      @error('email')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Password --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Password</label>
      <input name="password" type="password"
             class="w-full px-3 py-2 rounded-md border border-gray-300
                    focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm">
      @error('password')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Konfirmasi Password --}}
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700">Konfirmasi Password</label>
      <input name="password_confirmation" type="password"
             class="w-full px-3 py-2 rounded-md border border-gray-300
                    focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm">
    </div>

    {{-- Submit button --}}
    <button
      class="w-full px-3 py-2 rounded-md bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
             text-white font-semibold text-sm shadow-md hover:shadow-lg hover:scale-[1.02] transition">
      Daftar
    </button>
  </form>
</div>
@endsection
