<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Bookings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $bookings = Bookings::where('user_id', $user->id)->get();

        // $flight = Flight::findOrFail($request->input('flight_id'));

        // $bookedSeats = Bookings::where('flight_id', $flight->id)->sum('seats_booked');

        // $avalilableSeats = $flight->seats_available - $bookedSeats;

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $flights = Flight::all();
        return view('bookings.create', compact('flights'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validate the request data
        $request->validate([
            'flight_id' => 'bail|required|exists:flights,id',
            'seats_booked' => 'bail|required|integer|min:1',
            'total_price' => 'bail|required|numeric|min:0',
            'booking_date' => 'bail|required|date'
        ]);


        $flight = Flight::findOrFail($request->input('flight_id'));

        $bookedSeats = Bookings::where('flight_id', $flight->id)->sum('seats_booked');

        $avalilableSeats = $flight->seats_available - $bookedSeats;

        if($avalilableSeats < $request->input('seats_booked')){

            return redirect()->back()->withErrors([
                'seats_booked' => 'Not enough seats available. Only ' . $avalilableSeats . ' seats left.'
                ])->withInput();

        }



        // create a new booking
        $booking = new Bookings();
        $booking->user_id = auth()->user()->id;
        $booking->flight_id = $request->input('flight_id');
        $booking->seats_booked = $request->input('seats_booked');
        $booking->total_price = $request->input('total_price');
        $booking->booking_date = $request->input('booking_date');

        $booking->save();



        return redirect()->route('bookings.index')->with('success', 'Booking created successfully,');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $booking = Bookings::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $flights = Flight::all();

        $booking = Bookings::findOrFail($id);

        return view('bookings.edit' , compact('flights', 'booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate the request data
        $request->validate([
            'flight_id' => 'bail|required|exists:flights,id',
            'seats_booked' => 'bail|required|integer|min:1',
            'total_price' => 'bail|required|numeric|min:0',
            'booking_date' => 'bail|required|date'
        ]);

        // find the booking
        $booking = Bookings::findOrFail($id);
        $booking->flight_id = $request->input('flight_id');
        $booking->seats_booked = $request->input('seats_booked');
        $booking->total_price = $request->input('total_price');
        $booking->booking_date = $request->input('booking_date');
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }




    // Route for AJAX
    public function getFlightsByDate(Request $request)
    {
        $date = $request->query('date');

        $flights = Flight::whereDate('departure_time', $date)->get();

        return response()->json($flights);
    }
}
