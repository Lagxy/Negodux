<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Search - Negodux</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gray-50">
        <x-navbar />
        <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-6">Search</h1>
                    
                    <form method="GET" action="/search" class="space-y-4">
                        <div class="flex gap-2">
                            <input type="text" name="q" placeholder="Enter your search query..." class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition duration-200">Search</button>
                        </div>
                    </form>
                </div>

                @if (request('q'))
                    <div class="bg-white rounded-lg shadow-md p-8">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Search Results for "{{ request('q') }}"</h2>
                        <p class="text-gray-600">No results found. Try a different search query.</p>
                    </div>
                @else
                    <div class="bg-white rounded-lg shadow-md p-8">
                        <p class="text-gray-600 text-center">Enter a search query above to find what you're looking for.</p>
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
