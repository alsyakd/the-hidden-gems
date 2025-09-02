<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Blog' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">

    @include('partials.navbar')

        @if(session('success'))
            <div class="max-w-5xl mx-auto mt-4 px-4">
            <div class="p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
            </div>
        @endif

        <main class="max-w-5xl mx-auto px-4 py-6">
            @yield('content')
        </main>

   @include('partials.footer')
</body>
</html>
