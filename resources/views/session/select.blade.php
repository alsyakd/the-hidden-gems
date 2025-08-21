@extends('layouts.app')

@section('title', 'Pilih Role')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Pilih Role untuk Session Ini</h1>

    <form action="{{ route('session.set') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Pilih Role:</label>
            <div class="space-y-2">
                <div class="flex items-center">
                    <input type="radio" id="guest" name="role" value="guest" class="mr-2" {{ session('user_role', 'guest') === 'guest' ? 'checked' : '' }}>
                    <label for="guest" class="text-gray-700">Pengunjung (Hanya dapat melihat artikel)</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="author" name="role" value="author" class="mr-2" {{ session('user_role') === 'author' ? 'checked' : '' }}>
                    <label for="author" class="text-gray-700">Penulis (Dapat membuat dan mengedit artikel sendiri)</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="admin" name="role" value="admin" class="mr-2" {{ session('user_role') === 'admin' ? 'checked' : '' }}>
                    <label for="admin" class="text-gray-700">Administrator (Akses penuh)</label>
                </div>
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
            Simpan Peran
        </button>
    </form>
</div>
@endsection
