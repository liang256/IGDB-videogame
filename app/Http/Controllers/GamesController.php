<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http as Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $popularGames = Http::withHeaders(config('services.igdb'))->withBody("
            fields name,rating,platforms.abbreviation,first_release_date,cover.url;
            sort rating desc;
            where (first_release_date >= {$before} & first_release_date <= {$after}) & platforms = (48,49,130) & rating > 40;
            limit 12;
        ",'raw')->post('https://api.igdb.com/v4/games')->json();

        $recentlyReviewed = Http::withHeaders(config('services.igdb'))->withBody("
            fields name,rating,platforms.abbreviation,first_release_date,cover.url,summary;
            sort rating desc;
            where (first_release_date >= {$before} & first_release_date <= {$current}) & platforms = (48,49,130) & rating > 70 & rating_count > 5;
            limit 3;
        ",'raw')->post('https://api.igdb.com/v4/games')->json();

        $mostAnticipated = Http::withHeaders(config('services.igdb'))->withBody("
            fields name,first_release_date,cover.url;
            sort rating desc;
            where (first_release_date >= {$current} & first_release_date <= {$after}) & platforms = (48,49,130);
            limit 4;
        ",'raw')->post('https://api.igdb.com/v4/games')->json();

        $comingSoon = Http::withHeaders(config('services.igdb'))->withBody("
            fields name,first_release_date,cover.url;
            sort first_release asc;
            where first_release_date >= {$current} & platforms = (48,49,130);
            limit 4;
        ",'raw')->post('https://api.igdb.com/v4/games')->json();

        dump($comingSoon,$mostAnticipated);

        return view('index',compact(['popularGames','recentlyReviewed','mostAnticipated','comingSoon']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
