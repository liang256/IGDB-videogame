<div wire:init="load">
@forelse($recentlyReviewed as $game)
    <div class="recently-reviewed-container space-y-12 mt-8">
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="{{ route('games.show', $game['slug']) }}">
                    <img src="{{ Str::replaceFirst('thumb','cover_big',$game['cover']['url']) }}"
                        alt="game cover"
                        class="w-48 hover:opacity-75 transition ease-in-out duration-150"
                    >
                </a>
                <div class="absolute b0ttom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                    style="right: -20px; bottom:-20px"
                >
                    <div class="text-sm font-semiblod flex items-center justify-center h-full">
                        {{ $game['rating'] }}
                    </div>
                </div>
            </div> <!-- end relative -->    
            <div class="ml-12">
                <a href="{{ route('games.show', $game['slug']) }}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                    {{ $game['name'] }}
                </a>
                <div class="text-gray-400 mt-1">
                    {{ $game['platforms'] }}
                </div>
                <p class="hidden lg:block mt-6 text-gray-400">
                    {{ $game['summary'] }}
                </p>
            </div>
        </div>
    </div> <!-- end recently-reviewed -->
@empty
    <div class="spinner my-8"></div>
@endforelse
</div>
