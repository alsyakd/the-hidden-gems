@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold mb-4">Login</h1>
<form action="{{ route('login.attempt') }}" method="POST" class="max-w-md space-y-4">
  @csrf
  <div>
    <label class="block mb-1">Email</label>
    <input name="email" type="email" value="{{ old('email') }}" class="w-full border rounded p-2">
    @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
  <div>
    <label class="block mb-1">Password</label>
    <input name="password" type="password" class="w-full border rounded p-2">
    @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
  <label class="inline-flex items-center gap-2">
    <input type="checkbox" name="remember" value="1"> <span>Ingat saya</span>
  </label>
  <button class="px-4 py-2 bg-gray-800 text-white rounded">Masuk</button>
</form>
@endsection
