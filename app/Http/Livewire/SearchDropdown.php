<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http as Http;
use Illuminate\Support\Str;

class SearchDropdown extends Component
{
    public $search = '';
    public $searchResults = [];

    public function render()
    {
        if(strlen($this->search) < 2){
            $this->searchResults = [];
            return view('livewire.search-dropdown');
        }else{
            $unformatGames = Http::withHeaders(config('services.igdb'))->withBody("
                    fields name,cover.url,slug;
                    search \"{$this->search}\";
                    
                    limit 8;
            ",'raw')->post('https://api.igdb.com/v4/games')->json();


            $this->searchResults = $this->formatForView($unformatGames);
            
            
            return view('livewire.search-dropdown');    
        }
    }

    private function formatForView($games)
    {
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl' => isset($game['cover'])?Str::replaceFirst('thumb','cover_small',$game['cover']['url']):null,
                'rating' => isset($game['rating'])?round($game['rating']):null,
                'link' => isset($game['slug'])?route('games.show', $game['slug']):null,
            ]);
        })->toArray();
    }
}
