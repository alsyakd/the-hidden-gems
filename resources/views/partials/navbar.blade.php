<nav class="sticky top-0 z-50 bg-white/70 border-b border-white/50 shadow-md backdrop-blur-md">
  <div class="max-w-5xl mx-auto flex items-center justify-between px-4 py-3">

    <!-- Back Arrow + Logo -->
    <div class="flex items-center gap-4">
      <!-- Panah balik -->
      <a href="javascript:history.back()" class="text-3xl text-purple-700 hover:text-pink-500 transition">
        <!-- Bisa pakai Unicode panah atau SVG -->
        &#8592; <!-- ← panah -->
      </a>

      <!-- Logo -->
      <a href="{{ route('home') }}"
         class="text-xl font-extrabold tracking-wide bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent">
        The Hidden Gems
      </a>
    </div>

    <!-- Menu -->
    <div class="flex items-center gap-5 font-semibold text-gray-700">

      <!-- Kategori -->
      <a href="{{ route('categories.list') }}" class="relative group">
        <span class="transition group-hover:text-pink-500">Kategori</span>
        <span class="absolute left-0 -bottom-1 h-0.5 w-0 bg-gradient-to-r from-pink-500 to-blue-500 transition-all duration-300 group-hover:w-full"></span>
      </a>

      @auth
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="relative group">
          <span class="transition group-hover:text-pink-500">Dashboard</span>
          <span class="absolute left-0 -bottom-1 h-0.5 w-0 bg-gradient-to-r from-pink-500 to-blue-500 transition-all duration-300 group-hover:w-full"></span>
        </a>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @method('GET')
          @csrf
          <button
            class="px-4 py-2 rounded-xl bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white shadow-md transition transform hover:shadow-lg hover:scale-105">
            Logout
          </button>
        </form>
      @else
        <!-- Login -->
        <a href="{{ route('login') }}"
           class="px-4 py-2 rounded-xl bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white shadow-md transition transform hover:shadow-lg hover:scale-105">
          Login
        </a>

        <!-- Register -->
        <a href="{{ route('register') }}"
           class="px-4 py-2 rounded-xl border border-gray-300 transition hover:border-pink-400 hover:text-pink-500 hover:shadow-md">
          Register
        </a>
      @endauth

    </div>
  </div>
</nav>
