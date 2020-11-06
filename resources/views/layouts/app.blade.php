<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Games</title>
    
    <link rel="stylesheet" href="/css/main.css">
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
                <div class="relative">
                    <input type="text"class="bg-gray-800 text-sm rounded-full w-64 px-3 pl-8 py-1
                    focus:outline-none foucus:shadow-outline"
                    placeholder="search...">
                    <div class="absolute top-0 flex items-center h-full ml-2">
                        <svg class="w-4 fill-current text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>    
                </div>
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
</body>
</html>