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
