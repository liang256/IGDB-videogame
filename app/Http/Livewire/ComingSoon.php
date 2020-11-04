<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http as Http;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function load()
    {
        $current = Carbon::now()->timestamp;

        $this->comingSoon = Http::withHeaders(config('services.igdb'))->withBody("
            fields name,first_release_date,cover.url;
            sort first_release asc;
            where first_release_date >= {$current} & platforms = (48,49,130) & cover.url != null;
            limit 4;
        ",'raw')->post('https://api.igdb.com/v4/games')->json();
    }

    public function render()
    {
        return view('livewire.coming-soon',['comingSoon' => $this->comingSoon]);
    }
}
