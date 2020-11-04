<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http as Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames=[];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $this->popularGames = Cache::remember('popular-games', 7, function () use($before, $after){
            return Http::withHeaders(config('services.igdb'))->withBody("
                fields name,rating,platforms.abbreviation,first_release_date,cover.url;
                sort rating desc;
                where (first_release_date >= {$before} & first_release_date <= {$after}) & platforms = (48,49,130) & rating > 40;
                limit 12;
            ",'raw')->post('https://api.igdb.com/v4/games')->json();
        });

        
    }

    public function render()
    {
        return view('livewire.popular-games',['popularGames'=>$this->popularGames]);
    }
}
