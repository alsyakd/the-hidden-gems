<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Blog' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-pink-100 via-purple-100 to-blue-100 text-gray-800">

  {{-- Navbar --}}
  @include('partials.navbar')

  {{-- Flash message --}}
  @if(session('success'))
    <div class="max-w-4xl mx-auto mt-6 px-4">
      <div class="p-4 rounded-lg bg-green-100/80 text-green-800 shadow-md border-l-4 border-green-500 animate-pulse">
        ✅ {{ session('success') }}
      </div>
    </div>
  @endif

  {{-- Main content --}}
  <main class="flex-grow flex items-start justify-center px-2 py-14">
    <div
      class="w-full max-w-3xl bg-white/70 backdrop-blur-lg rounded-2xl shadow-xl border border-white/50
             p-8 transform transition duration-300 hover:scale-[1.02] hover:shadow-2xl">
      @yield('content')
    </div>
  </main>

  {{-- Footer --}}
  @include('partials.footer')

</body>
</html>
