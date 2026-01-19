@extends('layout.app')

@section('title', 'Bookings List')
@section('Header', 'Bookings List')

@section('content')

<!-- Success message -->
@if(session('success'))
    <div class="mb-6 rounded-md bg-green-50 p-4 border border-green-100">
        <p class="text-green-800 font-medium">{{ session('success') }}</p>
    </div>
@endif

<!-- Header + New Booking -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">All Bookings</h2>
    <a href="{{ route('bookings.create') }}"
       class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
        + New Booking
    </a>
</div>

<!-- Bookings Table -->
<div class="overflow-x-auto bg-white rounded-xl shadow-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Flight</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Seats</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Booking Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $booking->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $booking->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $booking->flight->flight_number ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $booking->seats_booked }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">${{ number_format($booking->total_price, 2) }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $booking->booking_date }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold
                            {{ $booking->status == 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-700' }}">
                            {{ $booking->status ?? 'Pending' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('bookings.show', $booking->id) }}"
                           class="text-indigo-600 hover:underline">View</a>
                        <a href="{{ route('bookings.edit', $booking->id) }}"
                           class="text-yellow-600 hover:underline">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-6 text-center text-gray-500">
                        No bookings found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
