<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register UMKM - Negodux</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

        <main class="max-w-4xl mx-auto px-8 pt-32 pb-16">
            <!-- Breadcrumb -->
            <div class="mb-6">
                <a href="/umkm" class="text-sm font-medium text-gray-500 hover:text-gray-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to UMKM List
                </a>
            </div>

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold mb-2">Register New UMKM</h1>
                <p class="text-gray-500 text-sm">Fill in the details below to register your business and connect with mentors.</p>
            </div>

            <!-- Form -->
            <form action="/umkm" method="POST" class="space-y-8" x-data="{ milestones: [''] }">
                @csrf

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 mt-0.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            <div>
                                <h3 class="font-bold text-red-900 text-sm mb-2">There were some errors with your submission:</h3>
                                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Business Information -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>
                        Business Information
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-xs font-bold text-gray-700 mb-1">Business Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <div>
                            <label for="category" class="block text-xs font-bold text-gray-700 mb-1">Category *</label>
                            <select id="category" name="category" required class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400 bg-white">
                                <option value="">Select Category</option>
                                <option value="F&B" {{ old('category') == 'F&B' ? 'selected' : '' }}>F&B</option>
                                <option value="Fashion" {{ old('category') == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                <option value="Manufacturing" {{ old('category') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                <option value="Beauty" {{ old('category') == 'Beauty' ? 'selected' : '' }}>Beauty</option>
                                <option value="Technology" {{ old('category') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                <option value="Agriculture" {{ old('category') == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label for="description" class="block text-xs font-bold text-gray-700 mb-1">Business Description *</label>
                            <textarea id="description" name="description" rows="3" required class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">{{ old('description') }}</textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label for="image" class="block text-xs font-bold text-gray-700 mb-1">Image URL *</label>
                            <input type="url" id="image" name="image" value="{{ old('image') }}" required placeholder="https://example.com/image.jpg" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                            <p class="text-xs text-gray-400 mt-1">Provide a direct link to your business image</p>
                        </div>
                    </div>
                </div>

                <!-- Owner Information -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        Owner & Contact Information
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="owner" class="block text-xs font-bold text-gray-700 mb-1">Owner Name *</label>
                            <input type="text" id="owner" name="owner" value="{{ old('owner') }}" required class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <div>
                            <label for="location" class="block text-xs font-bold text-gray-700 mb-1">Location *</label>
                            <input type="text" id="location" name="location" value="{{ old('location') }}" required placeholder="City, Province" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-bold text-gray-700 mb-1">Email *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <div>
                            <label for="phone" class="block text-xs font-bold text-gray-700 mb-1">Phone *</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="+62 812-3456-7890" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <div>
                            <label for="established" class="block text-xs font-bold text-gray-700 mb-1">Established Year *</label>
                            <input type="text" id="established" name="established" value="{{ old('established') }}" required placeholder="2020" maxlength="4" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <div>
                            <label for="employees" class="block text-xs font-bold text-gray-700 mb-1">Number of Employees *</label>
                            <select id="employees" name="employees" required class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400 bg-white">
                                <option value="">Select Range</option>
                                <option value="1-5" {{ old('employees') == '1-5' ? 'selected' : '' }}>1-5</option>
                                <option value="5-10" {{ old('employees') == '5-10' ? 'selected' : '' }}>5-10</option>
                                <option value="10-20" {{ old('employees') == '10-20' ? 'selected' : '' }}>10-20</option>
                                <option value="20-50" {{ old('employees') == '20-50' ? 'selected' : '' }}>20-50</option>
                                <option value="50+" {{ old('employees') == '50+' ? 'selected' : '' }}>50+</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Mentorship Details -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                        Mentorship Requirements
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label for="needs" class="block text-xs font-bold text-gray-700 mb-1">Required Expertise *</label>
                            <textarea id="needs" name="needs" rows="2" required placeholder="e.g., Digital marketing and e-commerce platform development" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">{{ old('needs') }}</textarea>
                        </div>
                        <div>
                            <label for="reward" class="block text-xs font-bold text-gray-700 mb-1">Equity Stake Offered *</label>
                            <input type="text" id="reward" name="reward" value="{{ old('reward') }}" required placeholder="15%" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                            <p class="text-xs text-gray-400 mt-1">Include the % symbol</p>
                        </div>
                    </div>
                </div>

                <!-- Milestones -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Advisory Terms & Milestones *
                    </h2>
                    <p class="text-xs text-gray-500 mb-4">Define the milestones mentors need to achieve to earn the equity stake</p>
                    <div class="space-y-3">
                        <template x-for="(milestone, index) in milestones" :key="index">
                            <div class="flex items-start gap-2">
                                <input type="text" :name="'milestones[' + index + ']'" x-model="milestones[index]" required placeholder="e.g., Help grow revenue by 10% within 2 months" class="flex-1 px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                                <button type="button" @click="milestones.splice(index, 1)" x-show="milestones.length > 1" class="px-3 py-2 border border-red-200 text-red-600 rounded text-xs font-bold hover:bg-red-50">
                                    Remove
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="milestones.push('')" class="text-xs font-bold text-gray-900 flex items-center gap-1 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add Another Milestone
                        </button>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end gap-4 pt-4">
                    <a href="/umkm" class="px-6 py-2.5 border border-gray-200 rounded text-sm font-bold hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-gray-900 text-white rounded text-sm font-bold hover:bg-gray-800">
                        Register UMKM
                    </button>
                </div>
            </form>
        </main>

        <!-- Footer -->
        <footer class="max-w-7xl mx-auto px-8 py-8 text-center border-t border-gray-100 mt-12">
            <p class="text-[10px] text-gray-400">
                &copy; 2025 Negodux. All rights reserved.
            </p>
        </footer>
    </body>
</html>
