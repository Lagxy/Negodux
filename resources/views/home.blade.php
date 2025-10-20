<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home - Negodux</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <body class="bg-gray-50">
        <x-navbar />


        <section class="min-h-[calc(100vh-80px)] flex items-center justify-center px-4 py-20 bg-[#121212] w-full gap-24">
                <div class="mb-8 bg-blue h-[80vh] w-[40%] flex flex-col justify-center items-center">
                    <img src="../images/logo.png" class="w-[70%] h-[70%] mb-4" alt="Negodux Logo">
                    <p class="text-7xl font-extrabold text-white font-sans ml-4">Negodux</p>
                </div>

                <div class="mb-8 h-[80vh] w-[40%] text-center flex flex-col justify-center items-center">
                    <p class="text-7xl font-extrabold text-white font-sans ml-4">Welcome</p>
                    <br>
                    <p class="text-7xl font-extrabold text-white font-sans ml-4">To Negodux</p>

                </div>
        </section>

        <section class="bg-[#121212] h-[100vh] flex items-center justify-center w-full gap-12">
            <div class="mb-8 h-[80vh] w-[100%] text-center flex flex-col justify-center items-center">
                <p class="text-7xl font-extrabold text-white font-sans ml-4">Our <br> Mission</p>
            </div>

            <div class="mb-8 h-[80vh] w-[100%] text-left flex justify-center items-center">
                <p class="text-3xl font-extrabold text-white font-sans ml-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis odio architecto tenetur sed facere beatae tempora enim sapiente ipsum soluta, fugiat inventore cumque et aspernatur praesentium reprehenderit, minima fugit similique.</p>
            </div>

        </section>



        
        <section class="bg-[#121212] h-[100vh] flex items-center justify-center w-full gap-12">
            <div class="mb-8 h-[80vh] w-[100%] text-right flex justify-center items-center">
                <p class="text-3xl font-extrabold text-white font-sans ml-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis odio architecto tenetur sed facere beatae tempora enim sapiente ipsum soluta, fugiat inventore cumque et aspernatur praesentium reprehenderit, minima fugit similique.</p>
            </div>

            <div class="mb-8 h-[80vh] w-[100%] text-center flex flex-col justify-center items-center">

                <p class="text-7xl font-extrabold text-white font-sans ml-4">Benefits</p>

            </div>

        </section>

        
    </body>
</html>
