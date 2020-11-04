<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http as Http;
use Illuminate\Support\Facades\Cache;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function load()
    {
        $after = Carbon::now()->addMonths(6)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->mostAnticipated = Cache::remember('most-anticipated', 7, function () use($current, $after){
            return Http::withHeaders(config('services.igdb'))->withBody("
                fields name,first_release_date,cover.url;
                sort rating desc;
                where (first_release_date >= {$current} & first_release_date <= {$after}) & platforms = (48,49,130) & cover.url != null;
                limit 4;
            ",'raw')->post('https://api.igdb.com/v4/games')->json();
        });

        //dd($this->mostAnticipated);
        //dd('after '.$after.'   current '.$current.'   release '.$this->mostAnticipated[1]['first_release_date']);
    }

    public function render()
    {
        return view('livewire.most-anticipated',['mostAnticipated' => $this->mostAnticipated]);
    }
}
