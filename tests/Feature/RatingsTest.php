<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Rating;

class RatingsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
      
      $ratings = Rating::all();
      
      foreach ($ratings as $key => $rating) {
        
        $score = $rating->score;
        
        $partners1 = Rating::where('partner1', $rating->username)->count();
        $partners2 = Rating::where('partner2', $rating->username)->count();
        $partners3 = Rating::where('partner3', $rating->username)->count();
        
        $this->assertTrue($score == $partners1 * 3 + $partners2 * 2 + $partners3 );
        
      }
        
    }
}
