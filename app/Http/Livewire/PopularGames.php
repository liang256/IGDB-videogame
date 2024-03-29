<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http as Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PopularGames extends Component
{
    public $popularGames=[];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $unformatGames = Cache::remember('popular-games', 7, function () use($before, $after){
            $resp =  Http::withHeaders(config('services.igdb'))->withBody("
                fields name,rating,platforms.abbreviation,first_release_date,cover.url,slug;
                sort rating desc;
                where (first_release_date >= {$before} & first_release_date <= {$after}) & platforms = (48,49,130) & rating > 40;
                limit 12;
            ",'raw')->post('https://api.igdb.com/v4/games');

            if ($resp->getStatusCode() == 200) {
                return $resp->json();
            } else {
                dd($resp->json());
            }
        });

        $this->popularGames = $this->formatForView($unformatGames);
    }

    public function render()
    {
        return view('livewire.popular-games',['popularGames'=>$this->popularGames]);
    }

    private function formatForView($games)
    {
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl' => isset($game['cover'])?Str::replaceFirst('thumb','cover_big',$game['cover']['url']):null,
                'platforms' => isset($game['platforms'])?collect($game['platforms'])->pluck('abbreviation')->implode(', '):null,
                'rating' => isset($game['rating'])?round($game['rating']):null,
                'link' => isset($game['slug'])?route('games.show', $game['slug']):null,
            ]);
        })->toArray();
    }
}
