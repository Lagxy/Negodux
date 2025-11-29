<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register as Mentor - Negodux</title>
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
                <a href="/mentors" class="text-sm font-medium text-gray-500 hover:text-gray-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to Mentor List
                </a>
            </div>

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold mb-2">Register as Mentor</h1>
                <p class="text-gray-500 text-sm">Share your expertise and help Indonesian SMEs grow by becoming a mentor.</p>
            </div>

            <!-- Form -->
            <form action="/mentors" method="POST" class="space-y-8" x-data="{ 
                areasOfExpertise: [''], 
                achievements: [''], 
                portfolio: [{ title: '', description: '' }] 
            }">
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

                <!-- Basic Information -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        Basic Information
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-xs font-bold text-gray-700 mb-1">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <div>
                            <label for="title" class="block text-xs font-bold text-gray-700 mb-1">Professional Title *</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="e.g. Supply Chain Expert" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <div class="md:col-span-2">
                            <label for="photo" class="block text-xs font-bold text-gray-700 mb-1">Photo URL *</label>
                            <input type="url" id="photo" name="photo" value="{{ old('photo') }}" required placeholder="https://example.com/photo.jpg" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                            <p class="text-xs text-gray-400 mt-1">Provide a direct link to your professional photo</p>
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-bold text-gray-700 mb-1">Email *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                    </div>
                </div>

                <!-- Professional Details -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                        </svg>
                        Professional Details
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="expertise" class="block text-xs font-bold text-gray-700 mb-1">Primary Expertise *</label>
                            <select id="expertise" name="expertise" required class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400 bg-white">
                                <option value="">Select Primary Expertise</option>
                                <option value="Supply Chain" {{ old('expertise') == 'Supply Chain' ? 'selected' : '' }}>Supply Chain</option>
                                <option value="Marketing" {{ old('expertise') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                <option value="Finance" {{ old('expertise') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                <option value="International Trade" {{ old('expertise') == 'International Trade' ? 'selected' : '' }}>International Trade</option>
                                <option value="Operations" {{ old('expertise') == 'Operations' ? 'selected' : '' }}>Operations</option>
                                <option value="Branding" {{ old('expertise') == 'Branding' ? 'selected' : '' }}>Branding</option>
                                <option value="Technology" {{ old('expertise') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                <option value="Human Resources" {{ old('expertise') == 'Human Resources' ? 'selected' : '' }}>Human Resources</option>
                            </select>
                        </div>
                        <div>
                            <label for="years_experience" class="block text-xs font-bold text-gray-700 mb-1">Years of Experience *</label>
                            <input type="text" id="years_experience" name="years_experience" value="{{ old('years_experience') }}" required placeholder="e.g. 15+ years in logistics" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <div class="md:col-span-2">
                            <label for="about" class="block text-xs font-bold text-gray-700 mb-1">About / Professional Summary *</label>
                            <textarea id="about" name="about" rows="3" required placeholder="Describe your professional background and expertise..." class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">{{ old('about') }}</textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label for="education" class="block text-xs font-bold text-gray-700 mb-1">Education *</label>
                            <input type="text" id="education" name="education" value="{{ old('education') }}" required placeholder="e.g. Master in Supply Chain Management, ITB Bandung" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                        </div>
                    </div>
                </div>

                <!-- Areas of Expertise -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                        </svg>
                        Areas of Expertise *
                    </h2>
                    <p class="text-xs text-gray-500 mb-4">List your specific areas of expertise (minimum 1 required)</p>
                    <div class="space-y-3">
                        <template x-for="(area, index) in areasOfExpertise" :key="index">
                            <div class="flex items-start gap-2">
                                <input type="text" :name="'areas_of_expertise[' + index + ']'" x-model="areasOfExpertise[index]" required placeholder="e.g. Logistics Optimization" class="flex-1 px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                                <button type="button" @click="areasOfExpertise.splice(index, 1)" x-show="areasOfExpertise.length > 1" class="px-3 py-2 border border-red-200 text-red-600 rounded text-xs font-bold hover:bg-red-50">
                                    Remove
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="areasOfExpertise.push('')" class="text-xs font-bold text-gray-900 flex items-center gap-1 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add Another Area
                        </button>
                    </div>
                </div>

                <!-- Key Achievements -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                        </svg>
                        Key Achievements *
                    </h2>
                    <p class="text-xs text-gray-500 mb-4">List your professional achievements (minimum 1 required)</p>
                    <div class="space-y-3">
                        <template x-for="(achievement, index) in achievements" :key="index">
                            <div class="flex items-start gap-2">
                                <input type="text" :name="'achievements[' + index + ']'" x-model="achievements[index]" required placeholder="e.g. Reduced logistics costs by 30% for 10+ businesses" class="flex-1 px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                                <button type="button" @click="achievements.splice(index, 1)" x-show="achievements.length > 1" class="px-3 py-2 border border-red-200 text-red-600 rounded text-xs font-bold hover:bg-red-50">
                                    Remove
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="achievements.push('')" class="text-xs font-bold text-gray-900 flex items-center gap-1 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add Another Achievement
                        </button>
                    </div>
                </div>

                <!-- Portfolio / Success Stories -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Portfolio & Success Stories *
                    </h2>
                    <p class="text-xs text-gray-500 mb-4">Share examples of your successful projects (minimum 1 required)</p>
                    <div class="space-y-4">
                        <template x-for="(item, index) in portfolio" :key="index">
                            <div class="border border-gray-100 rounded-lg p-4">
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-xs font-bold text-gray-700">Success Story #<span x-text="index + 1"></span></span>
                                    <button type="button" @click="portfolio.splice(index, 1)" x-show="portfolio.length > 1" class="text-xs font-bold text-red-600 hover:text-red-700">
                                        Remove
                                    </button>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <label :for="'portfolio_title_' + index" class="block text-xs font-bold text-gray-700 mb-1">Project Title *</label>
                                        <input type="text" :id="'portfolio_title_' + index" :name="'portfolio[' + index + '][title]'" x-model="portfolio[index].title" required placeholder="e.g. Kopi Distribution Network" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                                    </div>
                                    <div>
                                        <label :for="'portfolio_description_' + index" class="block text-xs font-bold text-gray-700 mb-1">Description *</label>
                                        <textarea :id="'portfolio_description_' + index" :name="'portfolio[' + index + '][description]'" x-model="portfolio[index].description" rows="2" required placeholder="Briefly describe the project and its results..." class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400"></textarea>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <button type="button" @click="portfolio.push({ title: '', description: '' })" class="text-xs font-bold text-gray-900 flex items-center gap-1 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add Another Success Story
                        </button>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end gap-4 pt-4">
                    <a href="/mentors" class="px-6 py-2.5 border border-gray-200 rounded text-sm font-bold hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-gray-900 text-white rounded text-sm font-bold hover:bg-gray-800">
                        Register as Mentor
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
