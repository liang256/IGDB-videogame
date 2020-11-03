@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Popular Games
        </h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
            @foreach($popularGames as $game)
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="#">
                            <img src="{{ Str::replaceFirst('thumb','cover_big',$game['cover']['url']) }}"
                                alt="game cover"
                                class="hover:opacity-75 transition ease-in-out duration-150"
                            >
                        </a>
                        <div class="absolute b0ttom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                            style="right: -20px; bottom:-20px"
                        >
                            <div class="text-sm font-semiblod flex items-center justify-center h-full">{{round($game['rating']).'%'}}</div>
                        </div>
                    </div>
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                        {{ $game['name'] }}
                    </a>
                    <div class="text-gray-400 mt-1">
                        @foreach($game['platforms'] as $platform)
                            @if(array_key_exists('abbreviation',$platform))
                                {{$platform['abbreviation']}},
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div> <!-- end popular-games -->
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
                @foreach($recentlyReviewed as $game)
                    <div class="recently-reviewed-container space-y-12 mt-8">
                        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                            <div class="relative flex-none">
                                <a href="#">
                                    <img src="{{ Str::replaceFirst('thumb','cover_big',$game['cover']['url']) }}"
                                        alt="game cover"
                                        class="w-48 hover:opacity-75 transition ease-in-out duration-150"
                                    >
                                </a>
                                <div class="absolute b0ttom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                                    style="right: -20px; bottom:-20px"
                                >
                                    <div class="text-sm font-semiblod flex items-center justify-center h-full">{{round($game['rating']).'%'}}</div>
                                </div>
                            </div> <!-- end relative -->    
                            <div class="ml-12">
                                <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                                    Zela: Breath of Wild
                                </a>
                                <div class="text-gray-400 mt-1">
                                    @foreach($game['platforms'] as $platform)
                                        @if(array_key_exists('abbreviation',$platform))
                                            {{$platform['abbreviation']}},
                                        @endif
                                    @endforeach
                                </div>
                                <p class="hidden lg:block mt-6 text-gray-400">
                                    {{$game['summary']}}
                                </p>
                            </div>
                        </div>
                    </div> <!-- end recently-reviewed -->
                @endforeach
            </div>
            <div class="most-anticipate lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
                @foreach($mostAnticipated as $game)
                    @if(array_key_exists('cover',$game))
                        <div class="most-anticipated-container space-y-10 mt-8">
                            <div class="game flex">
                                <a href="#">
                                    <img src="{{ Str::replaceFirst('thumb','cover_big',$game['cover']['url']) }}"
                                        alt="game cover"
                                        class="w-16 hover:opacity-75 transition ease-in-out duration-150"
                                    >    
                                </a>
                                <div class="ml-4">
                                    <a href="#">{{$game['name']}}</a>
                                    <div class="text-gray-400 text-sm mt-1">
                                        {{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
                                    </div>
                                </div>    
                            </div> 
                        </div> <!-- end most-anticipated -->
                    @endif
                @endforeach
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-6">Coming Soon</h2>
                @foreach($comingSoon as $game)
                    @if(array_key_exists('cover',$game))
                        <div class="coming-soon-container space-y-10 mt-8">
                            <div class="game flex">
                                <a href="#">
                                    <img src="{{ Str::replaceFirst('thumb','cover_big',$game['cover']['url']) }}"
                                        alt="game cover"
                                        class="w-16 hover:opacity-75 transition ease-in-out duration-150"
                                    >    
                                </a>
                                <div class="ml-4">
                                    <a href="#">{{$game['name']}}</a>
                                    <div class="text-gray-400 text-sm mt-1">
                                        {{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
                                    </div>
                                </div>    
                            </div> 
                        </div> <!-- end coming-soon -->
                    @endif
                @endforeach
            </div>
        </div>
    </div> <!-- end container -->
@endsection