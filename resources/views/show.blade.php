@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex">
            <div class="game-cover flex-none">
                <img src="images/zelda-btw.jpg" alt="game cover">
            </div>
            <div class="game-info ml-12 mr-64">
                <h2 class="font-semibold text-4xl">Zelda: Breathe of Wild</h2>
                <div class="text-gray-400">
                    <span>Adventure, RPG</span>
                    &middot;
                    <span>Squire Enit</span>
                    &middot;
                    <span>Nitendo Switch</span>
                </div>

                <div class="score-and-social-links flex flex-wrap items-center mt-8">
                    <div class="w-16 h-16 rounded-full bg-gray-800">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">90%</div>
                    </div>
                    <div class="ml-4">Member<br>Score</div>
                    <div class="w-16 h-16 rounded-full bg-gray-800 ml-4">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">90%</div>
                    </div>
                    <div class="ml-4">Critic<br>Score</div>
                    <div class="flex items-center space-x-4 ml-6">
                        <div class="flex w-8 h-8 rounded-full bg-gray-800 items-center justify-center">
                            <a href="#">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                        <div class="flex w-8 h-8 rounded-full bg-gray-800 items-center justify-center">
                            <a href="#">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 172 172"><g fill="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M86 10.3a75.7 75.7 0 00-11.3 150.4v-54.6H56V86h18.7V73c0-21.9 10.7-31.5 28.9-31.5 8.7 0 13.3.6 15.5 1v17.3h-12.4c-7.8 0-10.5 7.3-10.5 15.6v10.9H119l-3 19.9H96.1v54.8A75.6 75.6 0 0086 10.3z" fill="#fff"/></g></svg>
                            </a>
                        </div>
                        <div class="flex w-8 h-8 rounded-full bg-gray-800 items-center justify-center">
                            <a href="#">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 172 172"><g fill="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M59.1 18A41.3 41.3 0 0018 59V113A41.3 41.3 0 0059.1 154H113a41.3 41.3 0 0041.2-41.2V59A41.3 41.3 0 00112.9 18zm62.7 25a7.2 7.2 0 110 14.3 7.2 7.2 0 010-14.3zM86 50.2a35.9 35.9 0 110 71.7 35.9 35.9 0 010-71.7zm0 10.7a25 25 0 100 50.2 25 25 0 000-50.2z" fill="#fff"/></g></svg>
                            </a>
                        </div>
                        <div class="flex w-8 h-8 rounded-full bg-gray-800 items-center justify-center">
                            <a href="#">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 172 172"><g fill="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M161.3 35.4a57 57 0 01-17.6 4.9 32.4 32.4 0 0013.8-16.4c-6.3 3.6-12.5 6-19.4 7.3-6.3-6-14.5-9.7-23.3-9.7a30.3 30.3 0 00-30 36.4c-32.4 0-54.6-18.2-69.6-36.4a25.3 25.3 0 00-4.4 15.2c0 10.2 5.7 19.4 13.8 24.8-5-.6-10-1.8-13.8-3.6v.6a29.7 29.7 0 0024.5 29.1c-2.5.6-5 1.2-8.2 1.2-1.9 0-3.8 0-5.6-.6 3.7 12.2 21.2 26.1 35 26.1A60 60 0 0116.1 129h-5.3c13.7 8.5 30 10.8 47 10.8 57 0 87.8-45.5 87.8-85v-3.6a63.6 63.6 0 0015.7-15.8" fill="#fff"/></g></svg>
                            </a>
                        </div>
                    </div>
                </div> <!-- end socre-and-social-links -->

                <p class="text-gray-400 mt-12">
                    Step into a world of discovery, exploration and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series. Travel across fields, through forests and to mountain peaks as you discover what has become of the ruined kingdom of Hyrule in this stunning open-air adventure.
                </p>

                <div class="mt-12">
                    <button class="button flex bg-blue-500 hover:bg-blue-600 font-semibold flex items-center px-4 py-4 rounded transition ease-in-out duration-150">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 172 172"><g fill="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M85.7 14.3a71.7 71.7 0 100 143.4 71.7 71.7 0 000-143.4zM70 58c.8 0 1.7.2 2.5.6l43.2 22.7c1.7 1 2.8 2.8 2.8 4.8s-1 3.8-2.8 4.8l-43.2 22.7a5.4 5.4 0 01-5.3-.2 5.3 5.3 0 01-2.6-4.6V63.3a5.3 5.3 0 015.4-5.4z" fill="#fff"/></g></svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>

            </div> <!-- end game-info -->
        </div> <!-- end game-details -->

        <div class="images-container mt-12 border-b border-gray-800 pb-12">
            <h2 class="font-semibold text-blue-500 uppercase tracking-wide">Images</h2>
            <div class="grid grid-cols-3 gap-12 mt-8">
                <div>
                    <a href="#">
                        <img src="images/zelda-screenshot.png" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="images/zelda-screenshot.png" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="images/zelda-screenshot.png" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
            </div>
        </div> <!-- end images-container -->

        <div class="similar-games mt-12 mb-12">
            <h2 class="font-semibold text-blue-500 uppercase tracking-wide">Similar Games</h2>
            <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="#">
                            <img src="/images/zelda-btw.jpg"
                                alt="game cover"
                                class="hover:opacity-75 transition ease-in-out duration-150"
                            >
                        </a>
                        <div class="absolute b0ttom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                            style="right: -20px; bottom:-20px"
                        >
                            <div class="text-sm font-semiblod flex items-center justify-center h-full">90%</div>
                        </div>
                    </div>
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                        Zela: Breath of Wild
                    </a>
                <div class="text-gray-400 mt-1">Nitendo Switch</div>
                </div>
            </div> <!-- end popular-games -->
        </div> <!-- end similar-games -->
    </div>
@endsection