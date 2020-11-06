<div class="relative inline-block">
    <a href="{{ $game['link'] }}">
        <img src="{{ $game['coverImageUrl'] }}"
            alt="game cover"
            class="hover:opacity-75 transition ease-in-out duration-150"
        >
    </a>
    @if($game['rating'])
    <div class="absolute b0ttom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
        style="right: -20px; bottom:-20px"
    >
        <div class="text-sm font-semiblod flex items-center justify-center h-full">
            {{ $game['rating'] }}
        </div>
    </div>
    @endif
</div>