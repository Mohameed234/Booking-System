<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'flight_id',
        'seats_booked',
        'total_price',
        'booking_date'
    ];

    protected $dates = [
        'booking_date'
    ];

    // Define relateionship with User
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Define relateionship with Flight
    public function flight(){
        return $this->belongsTo(flight::class);
    }
}
