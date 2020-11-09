<div class="relative" x-data="{ isVisiable: true }" @click.away="isVisiable=false">
    <input
        wire:model.debounce.300ms="search" 
        type="text"
        class="bg-gray-800 text-sm rounded-full w-64 px-3 pl-8 py-1
            focus:outline-none foucus:shadow-outline"
        placeholder="search (press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isVisiable = true"
        @keydown.escape.window="isVisiable = false"
        @keydown="isVisiable = true"
        @keydown.shift.tab="isVisiable = false"
    >

    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="w-4 fill-current text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
        </svg>
    </div>    

    <div wire:loading class="spinner right-0 top-0 mt-3 mr-4" style="position:absolute"></div>

    @if(strlen($search)>=2)
    <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2" x-show.transition.opacity.duration.200="isVisiable">
        <ul>
            @if(count($searchResults)>0)
                @foreach($searchResults as $game)
                    <li class="border-b border-gray-700">
                        <a href="{{$game['link']}}" class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150"
                            @if($loop->last) @keydown.tab="isVisiable = false" @endif
                        >
                            <img src="{{$game['coverImageUrl']}}" alt="game cover" class="w-10">
                            <span class="ml-4">{{$game['name']}}</span>
                        </a>
                    </li>
                @endforeach
            @else
                No results for "{{$search}}"
            @endif
        </ul>
    </div>
    @endif
</div>
