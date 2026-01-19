@extends('layout.app')

@section('title', 'Flights List')
@section('Header', 'Flights List')

@section('content')

<div>
    @if(session('success'))
        <div class="mb-4 rounded-md bg-green-50 p-4">
            <div class="flex">
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-800">All Flights</h2>
    <a href="{{ route('flights.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">+ New Flight</a>
</div>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Flight Number</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">From</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">To</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Departure</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Arrival</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Seats</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Available Seats</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($flights as $flight)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $flight->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $flight->flight_number }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $flight->origin }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $flight->destination }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $flight->departure_time }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $flight->arrival_time }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $flight->seats_available }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $flight->available_seats }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">${{ $flight->price }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('flights.show', $flight->id)}}" class="text-indigo-600 hover:underline">View</a>
                        <a href="{{ route('flights.edit', $flight->id)}}" class="text-yellow-600 hover:underline">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="px-6 py-6 text-center text-gray-500">No flights found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
