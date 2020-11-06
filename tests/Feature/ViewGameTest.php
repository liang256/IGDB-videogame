<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ViewGameTest extends TestCase
{
    /** @test */
    public function gamePageShowsCorrectInfo()
    {
        // Http::fake([
        //     'https://api.igdb.com/v4/games'=>$this->fakeSingleGame()
        // ]);

        $response = $this->get(route('games.show', 'cyberpunk-2077'));
        
        $response->assertSuccessful();
        $response->assertSee('Cyberpunk 2077');
        $response->assertSee('PS4');
        // $response->assertSee('Nintendo');
        // $response->assertSee('Switch');
        // $response->assertSee('86');
        // $response->assertSee('90');
        // $response->assertSee('twitter.com/animalcrossing');
        // $response->assertSee('Escape to a deserted island');
        // $response->assertSee('images.igdb.com/igdb/image/upload/t_screenshot_big/sc6lt7.jpg');
        // $response->assertSee('The Last Journey');
    }

    protected function fakeSingleGame()
    {
        return Http::response([], 200); 
    }
}
