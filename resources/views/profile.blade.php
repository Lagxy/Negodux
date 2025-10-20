<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile - Negodux</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gray-50">
        <x-navbar />
        <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-lg shadow-md p-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-8">Your Profile</h1>

                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Full Name</label>
                            <p class="text-lg text-gray-900">{{ Auth::user()->name }}</p>
                        </div>

                        <div class="border-b border-gray-200 pb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Email Address</label>
                            <p class="text-lg text-gray-900">{{ Auth::user()->email }}</p>
                        </div>

                        <div class="border-b border-gray-200 pb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Member Since</label>
                            <p class="text-lg text-gray-900">{{ Auth::user()->created_at->format('M d, Y') }}</p>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <a href="/dashboard" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition duration-200">← Back to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
