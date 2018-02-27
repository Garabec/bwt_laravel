<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;
use App\Tag;

class TpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $products = Product::all()->lists('id')->toArray();
        $tags = Tag::all()->lists('id')->toArray();
      for ($i=0;$i<100;$i++) {
        DB::table('tp')->insert([
            'product_id' => $faker->randomElement($products),
            'tag_id' => $faker->randomElement($tags),
            
        ]);
      }
        
        //
    }
}
