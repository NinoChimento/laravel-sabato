<?php

use Illuminate\Database\Seeder;
use App\Room;
use App\User;
use Faker\Generator as Faker;
class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newRoom = new Room;
            $idUtente = User::inRandomOrder()->first();
            $newRoom->user_id = $idUtente->id;
            $newRoom->beds = rand(1,4);
            $newRoom->floor = rand(1,4);
            $newRoom->name = $faker->word();
            $newRoom->save();
        }
    }
}
