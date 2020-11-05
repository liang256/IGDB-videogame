<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http as Http;
use Illuminate\Support\Str;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
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
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game = Http::withHeaders(config('services.igdb'))->withBody("
            fields name, websites.*, videos.*, similar_games.name, similar_games.platforms.*, similar_games.rating, similar_games.slug, similar_games.cover.url, platforms.abbreviation, first_release_date, cover.url, slug, summary, screenshots.url, genres.name, aggregated_rating, rating, involved_companies.company.*;
            where slug = \"{$slug}\";
            limit 1;
        ",'raw')->post('https://api.igdb.com/v4/games')->json();

        abort_if(!$game, 404);

        return view('show', [
            'game' => $this->formatForView($game[0])
        ]);
    }

    private function formatForView($game)
    {
        return collect($game)->merge([
            'coverImageUrl' => $game['cover']?Str::replaceFirst('thumb','cover_big',$game['cover']['url']):null,
            'link' => route('games.show', $game['slug']),
            'release_date' => Carbon::parse($game['first_release_date'])->format('M d, Y'),
            'rating' => isset($game['rating'])?round($game['rating']).'%':null,
            'aggregated_rating' => isset($game['aggregated_rating'])?round($game['aggregated_rating']).'%':null,
            'platforms' => isset($game['platforms'])?collect($game['platforms'])->pluck('abbreviation')->implode(', '):null,
            'genres' => isset($game['genres'])?collect($game['genres'])->pluck('name')->implode(', '):null,
            'involved_companies' => isset($game['involved_companies'])?collect($game['involved_companies'])->pluck('company.name')->implode(', '):null,
            'screenshots' => collect($game['screenshots'])->map(function($screenshot){
                return[
                    'big' => Str::replaceFirst('thumb','screenshot_big',$screenshot['url']),
                    'huge' => Str::replaceFirst('thumb','screenshot_big',$screenshot['url']),
                ];
            }),
            'trailerUrl' => isset($game['videos'])?"https://youtube.com/watch/".$game['videos'][0]['video_id']:'#',
            'similar_games' => collect($game['similar_games'])->map(function($game){
                return collect($game)->merge([
                    'coverImageUrl' => $game['cover']?Str::replaceFirst('thumb','cover_small',$game['cover']['url']):null,
                    'link' => route('games.show', $game['slug']),
                    'rating' => isset($game['rating'])?round($game['rating']).'%':null,
                    'platforms' => $game['platforms']?collect($game['platforms'])->pluck('abbreviation')->implode(', '):null,
                ]);
            }),
            'social' => [
                'website' => collect($game['websites'])->first(),
                'facebook' => collect($game['websites'])->filter(function($website){
                    return Str::contains($website['url'],'facebook');
                })->first(),
                'twitter' => collect($game['websites'])->filter(function($website){
                    return Str::contains($website['url'],'twitter');
                })->first(),
                'instagram' => collect($game['websites'])->filter(function($website){
                    return Str::contains($website['url'],'instagram');
                })->first(),
            ],
        ])->toArray();
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
