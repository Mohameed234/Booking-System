@extends('layout.app')

@section('title', 'Booking Details')
@section('Header', 'Booking Details')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">

    <!-- Header -->
    <div class="bg-indigo-600 px-6 py-4">
        <h2 class="text-xl font-bold text-white">
            Booking Details
        </h2>
        <p class="text-indigo-100 text-sm">
            Booking #{{ $booking->id }}
        </p>
    </div>

    <!-- Content -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Booking Info -->
        <div class="bg-gray-50 rounded-lg p-5">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                Booking Information
            </h3>

            <ul class="space-y-3 text-sm text-gray-700">
                <li class="flex justify-between">
                    <span class="text-gray-500">Seats Booked</span>
                    <span class="font-semibold">{{ $booking->seats_booked }}</span>
                </li>

                <li class="flex justify-between">
                    <span class="text-gray-500">Total Price</span>
                    <span class="font-semibold text-green-600">
                        ${{ number_format($booking->total_price, 2) }}
                    </span>
                </li>

                <li class="flex justify-between">
                    <span class="text-gray-500">Booking Date</span>
                    <span class="font-semibold">
                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                    </span>
                </li>
            </ul>
        </div>

        <!-- Flight Info -->
        <div class="bg-gray-50 rounded-lg p-5">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                Flight Information
            </h3>

            <ul class="space-y-3 text-sm text-gray-700">
                <li class="flex justify-between">
                    <span class="text-gray-500">Flight Number</span>
                    <span class="font-semibold">
                        {{ $booking->flight->flight_number }}
                    </span>
                </li>

                <li class="flex justify-between">
                    <span class="text-gray-500">From</span>
                    <span class="font-semibold">
                        {{ $booking->flight->origin }}
                    </span>
                </li>

                <li class="flex justify-between">
                    <span class="text-gray-500">To</span>
                    <span class="font-semibold">
                        {{ $booking->flight->destination }}
                    </span>
                </li>

                <li class="flex justify-between">
                    <span class="text-gray-500">Departure</span>
                    <span class="font-semibold">
                        {{ \Carbon\Carbon::parse($booking->flight->departure_time)->format('d M Y - H:i') }}
                    </span>
                </li>

                <li class="flex justify-between">
                    <span class="text-gray-500">Arrival</span>
                    <span class="font-semibold">
                        {{ \Carbon\Carbon::parse($booking->flight->arrival_time)->format('d M Y - H:i') }}
                    </span>
                </li>
            </ul>
        </div>

    </div>

    <!-- Actions -->
    <div class="bg-gray-100 px-6 py-4 flex justify-end gap-3">
        <a href="{{ route('bookings.index') }}"
           class="px-4 py-2 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
            Back
        </a>

        <a href="{{ route('bookings.edit', $booking) }}"
           class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">
            Edit Booking
        </a>
    </div>

</div>


@endsection
