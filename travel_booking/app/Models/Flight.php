<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'flights';

    protected $fillable = [

        'flight_number',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
        'seats_available',
        'price'
    ];

    protected $dates = [
        'departure_time',
        'arrival_time'
    ];


    // Define relationship with Booking model
    public function bookings(){

        return $this->hasMany(Booking::class);
    }


}
