<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Bookings;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::all();

           // أضف خاصية available_seats لكل رحلة
              // أضف خاصية available_seats لكل رحلة
    $flights->map(function($flight) {
        $bookedSeats = Bookings::where('flight_id', $flight->id)->sum('seats_booked');
        $flight->available_seats = $flight->seats_available - $bookedSeats;
        return $flight;
    });
        return view('flights.index', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('flights.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the request data
        $request->validate([
            'flight_number' => 'bail|required|string|max:10|unique:flights,flight_number',
            'departure_time' => 'bail|required|date',
            'arrival_time' => 'bail|required|date|after:departure_time',
            'origin' => 'bail|required|string|max:100',
            'destination' => 'bail|required|string|max:100',
            'seats_available' => 'bail|required|numeric|min:0',
            'price' => 'bail|required|numeric|min:0'
        ]);

        // create a new flight
        $flight = new Flight();
        $flight->flight_number = $request->input('flight_number');
        $flight->departure_time = $request->input('departure_time');
        $flight->arrival_time = $request->input('arrival_time');
        $flight->origin = $request->input('origin');
        $flight->destination = $request->input('destination');
        $flight->seats_available = $request->input('seats_available');
        $flight->price = $request->input('price');
        $flight->save();

        return redirect()->route('flights.index')->with('success', 'Flight created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flight = Flight::findOrFail($id);

        return view('flights.show', compact('flight'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $flight = Flight::findOrFail($id);

        return view('flights.edit', compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate the request data
        $request->validate([
            'flight_number' => 'bail|required|string|max:10|unique:flights,flight_number,' . $id,
            'departure_time' => 'bail|required|date',
            'arrival_time' => 'bail|required|date|after:departure_time',
            'origin' => 'bail|required|string|max:100',
            'destination' => 'bail|required|string|max:100',
            'price' => 'bail|required|numeric|min:0'
        ]);

        // find the flight and update its details
        $flight = Flight::findOrFail($id);
        $flight->flight_number = $request->input('flight_number');
        $flight->departure_time = $request->input('departure_time');
        $flight->arrival_time = $request->input('arrival_time');
        $flight->origin = $request->input('origin');
        $flight->destination = $request->input('destination');
        $flight->seats_available = $request->input('seats_available');
        $flight->price = $request->input('price');
        $flight->save();

        return redirect()->route('flights.index')->with('success', 'Flight updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
