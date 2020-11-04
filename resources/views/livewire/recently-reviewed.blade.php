<div wire:init="load">
@forelse($recentlyReviewed as $game)
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
@empty
    <div class="spinner my-8"></div>
@endforelse
</div>
