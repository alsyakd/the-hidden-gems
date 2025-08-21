@extends('layouts.app')

@section('title', 'Kelola Kategori')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Kategori</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Kategori
        </a>
    </div>

    @if($categories->isEmpty())
        <div class="text-center py-8">
            <p class="text-gray-500">Belum ada kategori yang tersedia.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2 text-left text-gray-700">Nama</th>
                        <th class="px-4 py-2 text-left text-gray-700">Jumlah Artikel</th>
                        <th class="px-4 py-2 text-left text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <span class="font-semibold text-gray-800">{{ $category->name }}</span>
                            @if($category->description)
                                <p class="text-sm text-gray-600 mt-1">{{ $category->description }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-gray-700">{{ $category->posts_count }} artikel</td>
                        <td class="px-4 py-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('categories.edit', $category) }}" class="text-green-600 hover:underline">Edit</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
