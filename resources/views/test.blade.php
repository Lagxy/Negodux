<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Page - Negodux</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-red-50">
    <div class="min-h-screen flex flex-col">
        <x-navbar />
        
        <main class="flex-1">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h1 class="text-2xl font-semibold text-gray-900">Test Page</h1>
                    <p class="mt-4 text-gray-600">This is a test page to verify the navbar functionality.</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>