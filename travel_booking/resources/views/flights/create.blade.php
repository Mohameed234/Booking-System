@extends('layout.app')

@section('title', 'Create Flight')
@section('Header', 'Create New Flight')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">

    <!-- Header -->
    <div class="bg-indigo-600 px-6 py-4">
        <h2 class="text-xl font-bold text-white">
            New Flight
        </h2>
        <p class="text-indigo-100 text-sm">
            Fill the form below to add a new flight
        </p>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('flights.store') }}" class="p-6 space-y-6">
        @csrf

        <!-- Flight Number -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Flight Number</label>
            <input type="text" name="flight_number" value="{{ old('flight_number') }}"
                class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
            @error('flight_number')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Origin & Destination -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Origin</label>
                <input type="text" name="origin" value="{{ old('origin') }}"
                    class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
                @error('origin')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Destination</label>
                <input type="text" name="destination" value="{{ old('destination') }}"
                    class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
                @error('destination')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <!-- Departure & Arrival Time -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Departure Time</label>
                <input type="datetime-local" name="departure_time" value="{{ old('departure_time') }}"
                    class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
                @error('departure_time')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Arrival Time</label>
                <input type="datetime-local" name="arrival_time" value="{{ old('arrival_time') }}"
                    class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
                @error('arrival_time')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <!-- Seats & Price -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Seats Available</label>
                <input type="number" name="seats_available" value="{{ old('seats_available') }}"
                    class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
                @error('seats_available')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Price ($)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                    class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
                @error('price')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('flights.index') }}"
               class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
                Cancel
            </a>

            <button type="submit"
                    class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">
                Create Flight
            </button>
        </div>
    </form>
</div>

@endsection
