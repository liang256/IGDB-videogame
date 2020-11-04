<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http as Http;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function load()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->recentlyReviewed = Http::withHeaders(config('services.igdb'))->withBody("
            fields name,rating,platforms.abbreviation,first_release_date,cover.url,summary;
            sort rating desc;
            where (first_release_date >= {$before} & first_release_date <= {$current}) & platforms = (48,49,130) & rating > 70 & rating_count > 5;
            limit 3;
        ",'raw')->post('https://api.igdb.com/v4/games')->json();        
    }

    public function render()
    {
        return view('livewire.recently-reviewed',['recentlyReviewed' => $this->recentlyReviewed]);
    }
}
