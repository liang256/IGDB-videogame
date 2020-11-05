<div wire:init="load">
@forelse($comingSoon as $game)
    <div class="coming-soon-container space-y-10 mt-8">
        <div class="game flex">
            <a href="{{ $game['link'] }}">
                <img src="{{ $game['coverImageUrl'] }}"
                    alt="game cover"
                    class="w-16 hover:opacity-75 transition ease-in-out duration-150"
                >    
            </a>
            <div class="ml-4">
                <a href="{{ $game['link'] }}">{{$game['name']}}</a>
                <div class="text-gray-400 text-sm mt-1">
                    {{ $game['release_date'] }}
                </div>
            </div>    
        </div> 
    </div> <!-- end coming-soon -->
@empty
    <div class="spinner my-8"></div>
@endforelse
</div>
