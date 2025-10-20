<nav class="bg-[#000000] shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex-shrink-0 flex items-center">
                <img src="../../images/logo.png" class="h-8 w-8" alt="" srcset="">
                <a href="/" class="text-2xl font-bold text-white">Negodux</a>
            </div>

            <div class="hidden md:flex md:items-center md:space-x-4">
                @auth
                    <a href="/" class="text-white hover:font-extrabold px-3 py-2">Home</a>
                    <a href="/search" class="text-white hover:font-extrabold px-3 py-2">Search</a>
                    <a href="/dashboard" class="text-white hover:font-extrabold px-3 py-2">Dashboard</a>
                    <div class="relative group">
                        <button class="text-white hover:font-extrabold px-3 py-2 font-medium">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="absolute right-0 w-48 bg-white rounded-lg shadow-xl hidden group-hover:block">
                            <a href="/profile" class="block px-4 py-2 text-gray-900 hover:bg-gray-100 text-sm">Profile</a>
                            <form method="POST" action="/logout" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-gray-900 hover:bg-gray-100 text-sm">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/" class="text-gray-600 hover:text-gray-900 px-3 py-2">Home</a>
                    <a href="/login" class="text-gray-600 hover:text-gray-900 px-3 py-2">Login</a>
                    <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Register</a>
                @endauth
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden pb-4">
            @auth
                <a href="/" class="block px-3 py-2 text-gray-600 hover:bg-gray-100">Home</a>
                <a href="/search" class="block px-3 py-2 text-gray-600 hover:bg-gray-100">Search</a>
                <a href="/dashboard" class="block px-3 py-2 text-gray-600 hover:bg-gray-100">Dashboard</a>
                <a href="/profile" class="block px-3 py-2 text-gray-600 hover:bg-gray-100">Profile</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 text-gray-600 hover:bg-gray-100">Logout</button>
                </form>
            @else
                <a href="/" class="block px-3 py-2 text-gray-600 hover:bg-gray-100">Home</a>
                <a href="/login" class="block px-3 py-2 text-gray-600 hover:bg-gray-100">Login</a>
                <a href="/register" class="block px-3 py-2 text-gray-600 hover:bg-gray-100">Register</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
