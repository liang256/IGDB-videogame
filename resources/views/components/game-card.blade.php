<div class="relative inline-block" style="height: 225px;">
    <a href="{{ $game['link'] }}" class="flex items-center h-full">
        <img src="{{ $game['coverImageUrl'] }}"
            alt="game cover"
            class="hover:opacity-75 transition ease-in-out duration-150"
        >
    </a>
    @if($game['rating'])
    <div id="{{ $game['slug'] }}" class="absolute buttom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
        style="right: -20px; bottom:-20px"
    >
        
        @include('_rating',[
            'id' => $game['slug'],
            'rating' => $game['rating'],
            'event' => null,
        ])
        
    </div>
      
    @endif
</div>