<div wire:init="load">
@forelse($comingSoon as $game)
    <div class="coming-soon-container space-y-10 mt-8">
        <div class="game flex">
            <a href="#">
                <img src="{{ Str::replaceFirst('thumb','cover_small',$game['cover']['url']) }}"
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
@empty
    <div class="spinner my-8"></div>
@endforelse
</div>
