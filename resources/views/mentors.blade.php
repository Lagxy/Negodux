<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Professional Mentors - Negodux</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <script defer src="https://cdn.jsd

elivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans text-gray-900 bg-white">
        <!-- Navbar -->
        <nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-100">
            <div class="flex items-center justify-between px-8 py-6 max-w-7xl mx-auto">
                <div class="flex items-center gap-3">
                    <a href="/" class="flex items-center gap-3">
                        <img src="{{ asset('logo.png') }}" alt="Negodux Logo" class="h-8 w-auto">
                        <span class="text-xl font-bold tracking-tight">Negodux</span>
                    </a>
                </div>
                <div class="flex items-center gap-8">
                    <a href="/umkm" class="text-xs font-bold uppercase tracking-wide hover:text-gray-600">UMKM</a>
                    <a href="/mentors" class="text-xs font-bold uppercase tracking-wide hover:text-gray-600">Mentors</a>
                    <a href="/faq" class="text-xs font-bold uppercase tracking-wide hover:text-gray-600">FAQ</a>
                    
                    @auth
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="text-xs font-bold uppercase tracking-wide border border-gray-200 rounded px-4 py-2 hover:bg-gray-50 flex items-center gap-2">
                                {{ Auth::user()->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-xs font-bold uppercase tracking-wide hover:bg-gray-50 rounded-lg">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="text-xs font-bold uppercase tracking-wide border border-gray-200 rounded px-4 py-2 hover:bg-gray-50">Login / Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-8 pt-32 pb-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-2xl font-bold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    Professional Mentors
                </h1>
                <a href="/mentors/create" class="bg-gray-900 text-white px-4 py-2 rounded text-xs font-bold flex items-center gap-2 hover:bg-gray-800">
                    <span>+</span> Register as Mentor
                </a>
            </div>

            <!-- Filters -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </span>
                    <input type="text" id="searchInput" placeholder="Search by mentor name..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                </div>
                <div>
                    <select id="sortSelect" class="w-full px-4 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400 bg-white">
                        <option value="default">Default</option>
                        <option value="name-asc">Name: A-Z</option>
                        <option value="name-desc">Name: Z-A</option>
                        <option value="experience-desc">Most Experienced</option>
                    </select>
                </div>
                <div>
                    <select id="expertiseSelect" class="w-full px-4 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400 bg-white">
                        <option value="all">All Expertise</option>
                        <option value="Supply Chain">Supply Chain</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Finance">Finance</option>
                        <option value="International Trade">International Trade</option>
                        <option value="Operations">Operations</option>
                        <option value="Branding">Branding</option>
                    </select>
                </div>
            </div>

            <!-- Grid -->
            <div id="mentorGrid" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($mentors as $mentor)
                <div class="mentor-card border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow" data-expertise="{{ $mentor->expertise }}" data-name="{{ $mentor->name }}" data-experience="{{ $mentor->years_experience }}">
                    <div class="h-56 bg-gray-200 w-full object-cover">
                        <img src="{{ $mentor->photo }}" alt="{{ $mentor->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="mb-3">
                            <h3 class="font-bold text-base mb-1">{{ $mentor->name }}</h3>
                            <p class="text-xs text-gray-500 mb-2">{{ $mentor->title }}</p>
                            <span class="bg-gray-900 text-white text-[10px] px-2 py-1 rounded font-bold">{{ $mentor->expertise }}</span>
                        </div>
                        
                        <p class="text-xs text-gray-600 mb-3">{{ $mentor->years_experience }}</p>
                        
                        <div class="flex items-center gap-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <span class="text-xs text-gray-600">{{ $mentor->email }}</span>
                        </div>
                        
                        <div class="flex gap-2">
                            <a href="/mentors/{{ $mentor->id }}" class="flex-1 bg-gray-900 text-white py-2 rounded text-xs font-bold hover:bg-gray-800 text-center">View Details</a>
                            <a href="mailto:{{ $mentor->email }}" class="flex-1 border border-gray-200 text-gray-900 py-2 rounded text-xs font-bold hover:bg-gray-50 text-center">Contact Mentor</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>

        <!-- Footer -->
        <footer class="max-w-7xl mx-auto px-8 py-8 text-center border-t border-gray-100 mt-12">
            <p class="text-[10px] text-gray-400">
                &copy; 2025 Negodux. All rights reserved.
            </p>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const sortSelect = document.getElementById('sortSelect');
                const expertiseSelect = document.getElementById('expertiseSelect');
                const grid = document.getElementById('mentorGrid');
                const cards = Array.from(document.querySelectorAll('.mentor-card'));

                function filterAndSort() {
                    const searchTerm = searchInput.value.toLowerCase();
                    const selectedExpertise = expertiseSelect.value;
                    const sortValue = sortSelect.value;

                    // Filter
                    const filteredCards = cards.filter(card => {
                        const name = card.dataset.name.toLowerCase();
                        const expertise = card.dataset.expertise;
                        
                        const matchesSearch = name.includes(searchTerm);
                        const matchesExpertise = selectedExpertise === 'all' || expertise === selectedExpertise;

                        if (matchesSearch && matchesExpertise) {
                            card.style.display = 'block';
                            return true;
                        } else {
                            card.style.display = 'none';
                            return false;
                        }
                    });

                    // Sort
                    if (sortValue !== 'default') {
                        filteredCards.sort((a, b) => {
                            if (sortValue === 'name-asc') {
                                return a.dataset.name.localeCompare(b.dataset.name);
                            } else if (sortValue === 'name-desc') {
                                return b.dataset.name.localeCompare(a.dataset.name);
                            } else if (sortValue === 'experience-desc') {
                                const expA = parseInt(a.dataset.experience);
                                const expB = parseInt(b.dataset.experience);
                                return expB - expA;
                            }
                        });
                    }

                    // Re-append sorted cards
                    filteredCards.forEach(card => grid.appendChild(card));
                }

                searchInput.addEventListener('input', filterAndSort);
                sortSelect.addEventListener('change', filterAndSort);
                expertiseSelect.addEventListener('change', filterAndSort);
            });
        </script>
    </body>
</html>
