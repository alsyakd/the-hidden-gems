<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Hidden Gems - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('home') }}" class="text-xl font-bold">The Hidden Gems</a>
                <div class="flex space-x-4 items-center">
                    <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                    <a href="{{ route('posts.index') }}" class="hover:underline">Artikel</a>

                    @if(in_array(session('user_role', 'guest'), ['author', 'admin']))
                        <a href="{{ route('posts.create') }}" class="hover:underline">Tulis Artikel</a>
                    @endif

                    @if(session('user_role') === 'admin')
                        <a href="{{ route('categories.index') }}" class="hover:underline">Kategori</a>
                    @endif

                    <div class="flex items-center space-x-2">
                        <span class="text-sm">Role: {{ session('user_name', 'Pengunjung') }}</span>
                        <a href="{{ route('session.select') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Ubah Role</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} The Hidden Gems. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
