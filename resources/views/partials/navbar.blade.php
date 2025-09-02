<nav class="bg-white border-b sticky top-0 z-10">
    <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
      <a href="{{ route('home') }}" class="font-bold text-lg">MyBlog</a>
      <div class="flex items-center gap-3">
        <a href="{{ route('categories.list') }}" class="hover:underline">Kategori</a>
        @auth
          <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @method('GET')
            @csrf
            <button class="px-3 py-1 rounded bg-gray-800 text-white">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="px-3 py-1 rounded bg-gray-800 text-white">Login</a>
          <a href="{{ route('register') }}" class="px-3 py-1 rounded border">Register</a>
        @endauth
      </div>
    </div>
  </nav>
