<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=[
        "user_id",
        "room_id",
        "check_in",
        "check_out",
        "total"
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

}
