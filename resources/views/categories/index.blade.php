@extends('layouts.app')

@section('title', 'Kelola Kategori')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Kategori</h1>
        <a href="{{ route('categories.create') }}"
           class="px-4 py-2 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
                  text-white rounded-md shadow hover:scale-[1.05] transition transform">
            + Tambah Kategori
        </a>
    </div>

    {{-- Empty state --}}
    @if($categories->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-400 italic">Belum ada kategori yang tersedia.</p>
        </div>
    @else
        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-200 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-gray-700 font-medium">Nama</th>
                        <th class="px-4 py-3 text-left text-gray-700 font-medium">Jumlah Artikel</th>
                        <th class="px-4 py-3 text-left text-gray-700 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                        <td class="px-4 py-3">
                            <span class="font-semibold text-gray-800">{{ $category->name }}</span>
                            @if($category->description)
                                <p class="text-sm text-gray-500 mt-1">{{ $category->description }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-gray-700">{{ $category->posts_count }} artikel</td>
                        <td class="px-4 py-3">
                            <div class="flex space-x-3">
                                <a href="{{ route('categories.edit', $category) }}"
                                   class="px-2 py-1 bg-green-100 text-green-700 rounded hover:bg-green-200 transition">
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-2 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition">
                                        Hapus
                                    </button>
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
