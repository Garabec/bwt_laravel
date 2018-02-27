<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

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
      for ($i=0;$i<10;$i++) {
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->safeEmail,
            'role'=>$faker->randomElement(['admin', 'seller']),
            'password' => bcrypt(str_random(10)),
            'remember_token' => str_random(10),
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now'),
        ]);
      }
      
     User::create(array(
     'name'=>'admin',
     'email' => 'admin@admin.com',
     'role'=>'admin',
     'password' => bcrypt('admin'),
     'remember_token' => str_random(10),
      'created_at' => $faker->dateTime($max = 'now'),
      'updated_at' => $faker->dateTime($max = 'now'),
     )); 
      
        
        
    }
}
