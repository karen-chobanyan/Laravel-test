<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      DB::table('users')->insert([
          'name' => 'The First',
          'username' => 'the.first',
          'email' => 'thefirst@gmail.com',
          'password' => bcrypt('secret'),
      ]);
      
      foreach (range(1,125) as $index) 
      {
        DB::table('users')->insert([
            'name' => $faker->name,
            'username' => $faker->username,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
        ]);
      }
    }
}
