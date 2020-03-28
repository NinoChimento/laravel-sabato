<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=[
        "user_id",
        "beds",
        "floor",
        "name"
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
    
    public function calcPrice($day,$price)
    {
        return $day * $price;
    }
}
