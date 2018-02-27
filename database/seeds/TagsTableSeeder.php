<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      $faker = Faker::create();
      for ($i=0;$i<10;$i++) {
        DB::table('tags')->insert([
            'name' => strtoupper($faker->word),
            'created_at' => date_format($faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now'),"Y-m-d"),
            'updated_at' => date_format($faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now'),"Y-m-d"),
        ]);
      }
        //
    }
}
