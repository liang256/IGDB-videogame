<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use App\Http\Livewire\PopularGames;

class PopularGamesTest extends TestCase
{
    /** @test */
    public function the_main_page_shows_popular_games()
    {
        Http::fake([
            'https://api.igdb.com/v4/games'=>$this->fakePopularGames()
        ]);

        Livewire::test(PopularGames::class)
            ->assertSet('popularGames',[])
            ->call('loadPopularGames')
            ->assertSee('Fake Dogou Souken')
            ->assertSee('Fake Terra Nova: Strike Force Centauri');
    }

    protected function fakePopularGames()
    {
        return Http::response([
            0 => [
              'id' => 70,
              'cover' => [
                'id' => 71,
                'url' => '//images.igdb.com/igdb/image/upload/t_thumb/ndfzbf3xvuuchijx7v1c.jpg',
              ],
              'first_release_date' => 825984000,
              'name' => 'Fake Terra Nova: Strike Force Centauri',
              'platforms' => [
                0 => [
                  'id' => 13,
                  'abbreviation' => 'DOS',
                ],
              ],
              'rating' => 70.0,
              'slug' => 'terra-nova-strike-force-centauri',
            ],
            1 => [
              'id' => 40104,
              'first_release_date' => 536457600,
              'name' => 'Fake Dogou Souken',
              'platforms' => [
                0 => [
                  'id' => 52,
                  'abbreviation' => 'Arcade',
                ],
              ],
              'slug' => 'dogou-souken',
            ],
            2 => [
              'id' => 51663,
              'name' => 'The Firemen 2: Pete & Danny',
              'slug' => 'the-firemen-2-pete-and-danny',
            ],
            3 => [
              'id' => 86911,
              'cover' => [
                'id' => 62939,
                'url' => '//images.igdb.com/igdb/image/upload/t_thumb/kdgpkzbp8s1dif5yfi38.jpg',
              ],
              'first_release_date' => 1381968000,
              'name' => 'Baccarat - Best Casino Betting Game',
              'platforms' => [
                0 => [
                  'id' => 14,
                  'abbreviation' => 'Mac',
                ],
              ],
              'slug' => 'baccarat-best-casino-betting-game',
            ],
            4 => [
              'id' => 68841,
              'cover' => [
                'id' => 97021,
                'url' => '//images.igdb.com/igdb/image/upload/t_thumb/co22v1.jpg',
              ],
              'first_release_date' => 1506988800,
              'name' => 'Captivus',
              'platforms' => [
                0 => [
                  'id' => 6,
                  'abbreviation' => 'PC',
                ],
              ],
              'slug' => 'captivus',
            ],
            5 => [
              'id' => 33284,
              'first_release_date' => 1457740800,
              'name' => 'One way to exit',
              'platforms' => [
                0 => [
                  'id' => 6,
                  'abbreviation' => 'PC',
                ],
              ],
              'slug' => 'one-way-to-exit',
            ],
            6 => [
              'id' => 104748,
              'name' => 'Space station - build your own ISS',
              'slug' => 'space-station-build-your-own-iss',
            ],
            7 => [
              'id' => 85450,
              'name' => 'Transformers Prime: The Game',
              'slug' => 'transformers-prime-the-game',
            ],
            8 => [
              'id' => 53297,
              'name' => 'Lords of Xulima: The Talisman of Golot Edition',
              'slug' => 'lords-of-xulima-the-talisman-of-golot-edition',
            ],
            9 => [
              'id' => 89616,
              'name' => 'Bubble Whirl Shooter',
              'slug' => 'bubble-whirl-shooter',
            ],
          ], 200); 
    }
}
