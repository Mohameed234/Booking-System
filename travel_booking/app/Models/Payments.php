<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $tabble = 'payments';

    protected $fillable = [

        'booking_id',
        'amount',
        'payment_date',
        'status'
    ];

    protected $dates = [
        'payment_date'
    ];

    // Define relateionship with Bookings
    public function booking(){
        return $this->belongsTo(Bookings::class);
    }

}
