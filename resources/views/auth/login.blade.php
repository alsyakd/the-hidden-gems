@extends('layouts.app')

@section('content')
  <div class="w-full max-w-xs mx-auto">
    <h1 class="text-lg font-extrabold mb-5 text-center
               bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
               bg-clip-text text-transparent">
      Login
    </h1>

    <form action="{{ route('login.attempt') }}" method="POST" class="space-y-3">
      @csrf

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
                      focus:ring-2 focus:r  ing-pink-400 focus:outline-none text-sm">
        @error('password')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Remember me --}}
      <label class="inline-flex items-center gap-2 text-gray-700 text-sm">
        <input type="checkbox" name="remember" value="1"
               class="rounded border-gray-300 text-pink-500 focus:ring-pink-400">
        <span>Ingat saya</span>
      </label>

      {{-- Submit button --}}
      <button
        class="w-full px-3 py-2 rounded-md bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
               text-white font-semibold text-sm shadow-md hover:shadow-lg hover:scale-[1.02] transition">
        Masuk
      </button>
    </form>
  </div>
@endsection
