@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold mb-4">Register</h1>
<form action="{{ route('register.store') }}" method="POST" class="max-w-md space-y-4">
  @csrf
  <div>
    <label class="block mb-1">Nama</label>
    <input name="name" value="{{ old('name') }}" class="w-full border rounded p-2">
    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
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
  <div>
    <label class="block mb-1">Konfirmasi Password</label>
    <input name="password_confirmation" type="password" class="w-full border rounded p-2">
  </div>
  <button class="px-4 py-2 bg-gray-800 text-white rounded">Daftar</button>
</form>
@endsection
