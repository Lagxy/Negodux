<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register - Negodux</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col">
            <x-navbar />
            <div class="h-[100vh] flex items-center justify-center px-4 py-20 bg-[#121212]">
                <div class="w-full max-w-md">
                    <div class="bg-[#1e1e1e] rounded-lg shadow-xl p-8 ring-1 ring-white/10">
                        <h1 class="text-4xl font-extrabold text-center mb-8 text-white">Create Account</h1>

                        @if ($errors->any())
                            <div class="bg-red-900/50 border border-red-500/50 rounded-lg px-4 py-3 mb-6">
                                @foreach ($errors->all() as $error)
                                    <p class="text-red-400 text-sm">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="/register" class="space-y-6">
                            @csrf

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                                    class="w-full px-4 py-3 bg-[#2a2a2a] border border-gray-700 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                                    class="w-full px-4 py-3 bg-[#2a2a2a] border border-gray-700 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                                <input type="password" id="password" name="password" required 
                                    class="w-full px-4 py-3 bg-[#2a2a2a] border border-gray-700 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required 
                                    class="w-full px-4 py-3 bg-[#2a2a2a] border border-gray-700 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                            </div>

                            <button type="submit" 
                                class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition duration-200">
                                Register
                            </button>
                        </form>

                        <div class="mt-6 text-center">
                            <p class="text-gray-400">Already have an account? 
                                <a href="/login" class="text-blue-400 hover:text-blue-300 font-medium">Login here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
