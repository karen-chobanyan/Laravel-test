<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rating;
use Carbon\Carbon;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
          DB::table('ratings')->insert([
              'user_id' => $user->id,
              'username' => $user->username,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s')
          ]);
        }
        
        $ratings = Rating::all();
        foreach ($ratings as $key => $rating) {
          
          if($key == 1)
          {
            $partner1_u = $ratings[0]->username; 
            $partner1_r = Rating::where('username', $partner1_u)->first();
            $rating->partner1 = $partner1_u;
            $partner1_r->score += 3;
            $partner1_r->save();
            $rating->save();
          }
          
          if($key == 2)
          {
            $partner1_u = $ratings[1]->username; 
            $partner1_r = Rating::where('username', $partner1_u)->first();
            $rating->partner1 = $partner1_u;
            $rating->partner2 = $ratings[1]->partner1;
            $rating->save();
            $partner1_r->score += 3;
            $partner1_r->save();
            
            $partner2_u = $ratings[1]->partner1;
            $partner2_r = Rating::where('username', $partner2_u)->first();
            $partner2_r->score += 2;
            $partner2_r->save();
            
          }
          
          if ($key > 2) 
          {
            $partner_key = rand(0, $key-1);
            $partner1_u = $ratings[$partner_key]->username;            
            $partner2_u = $ratings[$partner_key]->partner1;
            $partner3_u = $ratings[$partner_key]->partner2;
            
            $rating->partner1 = $partner1_u;
            $rating->partner2 = $partner2_u;
            $rating->partner3 = $partner3_u;
            $rating->save();
            
            $partner1_r = Rating::where('username', $partner1_u)->first();
            $partner1_r->score += 3;
            $partner1_r->save();
            
            if(!empty($partner2_u))
            {
              $partner2_r = Rating::where('username', $partner2_u)->first();
              $partner2_r->score += 2;
              $partner2_r->save();
            }
            if(!empty($partner3_u))
            {
              $partner3_r = Rating::where('username', $partner3_u)->first();
              $partner3_r->score += 1;
              $partner3_r->save();
            }
          }
        }
    }
}
