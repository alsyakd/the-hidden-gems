@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard</h1>

<p class="mb-4">Hai, <strong>{{ $user->name }}</strong> ({{ $user->role }})</p>

@auth
  @if($user->isAdmin())
    <p class="mb-4">Sebagai admin, kamu bisa mengelola kategori dan semua post.</p>
  @else
    <p class="mb-4">Sebagai author, kamu bisa menulis dan mengelola postmu sendiri.</p>
    <a href="{{ route('posts.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded">Tulis Post</a>
  @endif
@endauth


@if($posts->count())
  <div class="overflow-x-auto bg-white border rounded">
    <table class="min-w-full text-sm">
      <thead class="bg-gray-50">
        <tr>
          <th class="text-left p-2">Judul</th>
          <th class="text-left p-2">Kategori</th>
          <th class="text-left p-2">Status</th>
          <th class="text-left p-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $p)
          <tr class="border-t">
            <td class="p-2">{{ $p->title }}</td>
            <td class="p-2">{{ $p->category->name ?? '-' }}</td>
            <td class="p-2">
              @if($p->published)
                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Published</span>
              @else
                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">Draft</span>
              @endif
            </td>
            <td class="p-2 flex gap-2">
              <a class="px-2 py-1 border rounded" href="{{ route('posts.edit',$p) }}">Edit</a>
              <form onsubmit="return confirm('Yakin?')" action="{{ route('posts.destroy',$p) }}" method="POST">
                @csrf @method('DELETE')
                <button class="px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
              </form>
              @if($p->published)
                <a class="px-2 py-1 border rounded" href="{{ route('posts.show',$p) }}" target="_blank">Lihat</a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-4">{{ $posts->links() }}</div>
@else
  <p>Belum ada post.</p>
@endif
@endsection
