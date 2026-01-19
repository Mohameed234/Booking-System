<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;


class Flight extends Model
{

    use HasFactory;
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
