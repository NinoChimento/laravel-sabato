<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Room;
use App\Booking;
use Faker\Generator as Faker;
class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) {
            $utente = User::inRandomOrder()->first();
            $id= $utente->id;
            $rooms = Room::where("user_id",$id)->get();
            $roomsId = $rooms[rand(0,count($rooms)-1)];
            $newBooking = new Booking;
            $newBooking->user_id = $id;
            $newBooking->room_id = $roomsId->id;
            $newBooking->check_in = "2020/01/01";
            $newBooking->check_out = "2020/01/01";
            $newBooking->total = $faker->numberBetween(100,900);
            $newBooking->save();
        }
    }
}
