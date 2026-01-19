@extends('layout.app')

@section('title', 'Flight Details')
@section('Header', 'Flight Details')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">

    <!-- Header -->
    <div class="bg-indigo-600 px-6 py-4">
        <h2 class="text-xl font-bold text-white">
            Flight Information
        </h2>
        <p class="text-indigo-100 text-sm">
            Detailed information for this flight
        </p>
    </div>

    <!-- Flight Info -->
    <div class="p-6 space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p><span class="font-medium text-gray-700">Flight Number:</span> {{ $flight->flight_number }}</p>
                <p><span class="font-medium text-gray-700">From:</span> {{ $flight->origin }}</p>
                <p><span class="font-medium text-gray-700">To:</span> {{ $flight->destination }}</p>
            </div>
            <div>
                <p><span class="font-medium text-gray-700">Departure:</span> {{ $flight->departure_time }}</p>
                <p><span class="font-medium text-gray-700">Arrival:</span> {{ $flight->arrival_time }}</p>
                <p><span class="font-medium text-gray-700">Seats Available:</span> {{ $flight->seats_available }}</p>
                <p><span class="font-medium text-gray-700">Price:</span> ${{ number_format($flight->price, 2) }}</p>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex justify-end gap-3 p-6 border-t">
        <a href="{{ route('flights.index') }}"
           class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
            Back
        </a>

        <a href="{{ route('flights.edit', $flight->id) }}"
           class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">
            Edit
        </a>
    </div>

</div>

@endsection
