@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Popular Games
        </h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
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
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
                <div class="recently-reviewed-container space-y-12 mt-8">
                    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                        <div class="relative flex-none">
                            <a href="#">
                                <img src="/images/zelda-btw.jpg"
                                    alt="game cover"
                                    class="w-48 hover:opacity-75 transition ease-in-out duration-150"
                                >
                            </a>
                            <div class="absolute b0ttom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                                style="right: -20px; bottom:-20px"
                            >
                                <div class="text-sm font-semiblod flex items-center justify-center h-full">90%</div>
                            </div>
                        </div> <!-- end relative -->    
                        <div class="ml-12">
                            <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                                Zela: Breath of Wild
                            </a>
                            <div class="text-gray-400 mt-1">Nitendo Switch</div>
                            <p class="hidden lg:block mt-6 text-gray-400">
                            Step into a world of discovery, exploration and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series. Travel across fields, through forests and to mountain peaks as you discover what has become of the ruined kingdom of Hyrule in this stunning open-air adventure.
                            </p>
                        </div>
                    </div>
                </div> <!-- end recently-reviewed -->
            </div>
            <div class="most-anticipate lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="/images/zelda-btw.jpg"
                                alt="game cover"
                                class="w-16 hover:opacity-75 transition ease-in-out duration-150"
                            >    
                        </a>
                        <div class="ml-4">
                            <a href="#">Zelda: Breath of Wild</a>
                            <div class="text-gray-400 text-sm mt-1">Sep 16, 2020</div>
                        </div>    
                    </div> 
                </div> <!-- end most-anticipated -->

                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-6">Coming Soon</h2>
                <div class="coming-soon-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="/images/zelda-btw.jpg"
                                alt="game cover"
                                class="w-16 hover:opacity-75 transition ease-in-out duration-150"
                            >    
                        </a>
                        <div class="ml-4">
                            <a href="#">Zelda: Breath of Wild</a>
                            <div class="text-gray-400 text-sm mt-1">Sep 16, 2020</div>
                        </div>    
                    </div> 
                </div> <!-- end coming-soon -->
            </div>
        </div>
    </div> <!-- end container -->
@endsection