@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">

  {{-- Judul --}}
  <h1 class="text-2xl font-extrabold mb-6
             bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
             bg-clip-text text-transparent">
    Dashboard
  </h1>

  {{-- Salam --}}
  <p class="mb-4 text-gray-700">Hai, <strong>{{ $user->name }}</strong> ({{ $user->role }})</p>

  {{-- Info berdasarkan role --}}
  @auth
    @if($user->isAdmin())
      <p class="mb-4 text-gray-600">Sebagai admin, kamu bisa mengelola kategori dan semua post.</p>
    @else
      <p class="mb-4 text-gray-600">Sebagai author, kamu bisa menulis dan mengelola postmu sendiri.</p>
      <a href="{{ route('posts.create') }}"
         class="inline-block mb-6 px-4 py-2 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500
                text-white rounded-lg shadow hover:shadow-lg hover:scale-105 transition transform">
        Tulis Post
      </a>
    @endif
  @endauth

  {{-- Table Post --}}
  @if($posts->count())
    <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200 bg-white">
      <table class="min-w-full text-sm divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="text-left p-3 font-medium text-gray-600">Judul</th>
            <th class="text-left p-3 font-medium text-gray-600">Kategori</th>
            <th class="text-left p-3 font-medium text-gray-600">Status</th>
            <th class="text-left p-3 font-medium text-gray-600">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @foreach($posts as $p)
            <tr class="hover:bg-gray-50 transition">
              <td class="p-3">{{ $p->title }}</td>
              <td class="p-3">{{ $p->category->name ?? '-' }}</td>
              <td class="p-3">
                @if($p->published)
                  <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">
                    Published
                  </span>
                @else
                  <span class="px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded-full">
                    Draft
                  </span>
                @endif
              </td>
              <td class="p-3 flex gap-2">
                <a href="{{ route('posts.edit',$p) }}"
                   class="px-2 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition">
                  Edit
                </a>
                <form onsubmit="return confirm('Yakin?')" action="{{ route('posts.destroy',$p) }}" method="POST">
                  @csrf @method('DELETE')
                  <button class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Hapus
                  </button>
                </form>
                @if($p->published)
                  <a href="{{ route('posts.show',$p) }}"
                     class="px-2 py-1 border border-gray-300 rounded hover:bg-gray-100 transition">
                    Lihat
                  </a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
      {{ $posts->links() }}
    </div>
  @else
    <p class="text-gray-500 mt-6">Belum ada post.</p>
  @endif

</div>
@endsection
