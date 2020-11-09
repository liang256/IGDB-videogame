<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Games</title>
    
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/app.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto items-center flex flex-col lg:flex-row justify-between px-4 px-6 my-2">
            <div class="flex flex-col lg:flex-row items-center">
                <a href="/" class="font-semibold">
                    IGDB Video Games
                </a>
                <ul class="flex ml-0 lg:ml-16 space-x-8 mt-4 lg:mt-0">
                    <li><a href="/games" class="hover:text-gray-400">Games</a></li>
                    <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                    <li><a href="#"  class="hover:text-gray-400">Coming Soon</a></li>
                </ul>
            </div>
            <div class="flex items-center mt-4 lg:mt-0">
                <livewire:search-dropdown/>
                <div class="ml-6">
                    <a href="#"><img src="https://avatars.dicebear.com/api/male/.svg"
                    alt="avatar" class="rounded-full w-8 bg-white"></a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered By <a href="#" class="underline hover:text-gray-400">IGDB API</a>    
        </div>
        
    </footer>
    @livewireScripts
    
    @stack('scripts')
</body>
</html>