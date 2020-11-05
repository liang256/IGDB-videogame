<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http as Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function load()
    {
        $after = Carbon::now()->addMonths(6)->timestamp;
        $current = Carbon::now()->timestamp;

        $unformat = Cache::remember('most-anticipated', 7, function () use($current, $after){
            return Http::withHeaders(config('services.igdb'))->withBody("
                fields name,first_release_date,cover.url, slug;
                sort rating desc;
                where (first_release_date >= {$current} & first_release_date <= {$after}) & platforms = (48,49,130) & cover.url != null;
                limit 4;
            ",'raw')->post('https://api.igdb.com/v4/games')->json();
        });
        
        $this->mostAnticipated = $this->formatForView($unformat);
    }

    public function render()
    {
        return view('livewire.most-anticipated',['mostAnticipated' => $this->mostAnticipated]);
    }

    private function formatForView($games)
    {
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl' => $game['cover']?Str::replaceFirst('thumb','cover_small',$game['cover']['url']):null,
                'link' => route('games.show', $game['slug']),
                'release_date' => Carbon::parse($game['first_release_date'])->format('M d, Y'),
            ]);
        })->toArray();
    }
}
