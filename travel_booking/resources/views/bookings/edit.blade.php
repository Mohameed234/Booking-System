@extends('layout.app')

@section('title', 'Edit Booking')
@section('Header', 'Edit Booking')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">

    <!-- Header -->
    <div class="bg-indigo-600 px-6 py-4">
        <h2 class="text-xl font-bold text-white">
            Edit Booking #{{ $booking->id }}
        </h2>
        <p class="text-indigo-100 text-sm">
            Update the details of this booking
        </p>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('bookings.update', $booking->id) }}" class="p-6 space-y-6" id="bookingForm">
        @csrf
        @method('PUT')

        <!-- Booking Date -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Booking Date
            </label>
            <input type="date" name="booking_date" id="booking_date"
                   min="{{ now()->format('Y-m-d') }}"
                   value="{{ old('booking_date', $booking->booking_date) }}"
                   class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
            @error('booking_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Flights Dropdown -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Flight
            </label>
            <select name="flight_id" id="flight_id"
                    class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
                <option value="">Loading flights...</option>
            </select>
            @error('flight_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Departure & Arrival -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Departure Time</label>
                <input type="text" id="departure_time" readonly
                       class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 bg-gray-100 text-gray-900 font-medium">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Arrival Time</label>
                <input type="text" id="arrival_time" readonly
                       class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 bg-gray-100 text-gray-900 font-medium">
            </div>
        </div>

        <!-- Seats + Price -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Seats Booked
                </label>
                <input type="number" min="1" name="seats_booked" id="seats_booked"
                       value="{{ old('seats_booked', $booking->seats_booked) }}"
                       class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-900 font-medium">
                @error('seats_booked')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Total Price ($)
                </label>
                <input type="number" step="0.01" min="0" name="total_price" id="total_price"
                       value="{{ old('total_price', $booking->total_price) }}"
                       readonly
                       class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 bg-gray-100 text-gray-900 font-medium">
                @error('total_price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('bookings.index') }}"
               class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
                Cancel
            </a>

            <button type="submit"
                    class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">
                Update Booking
            </button>
        </div>

    </form>

</div>

<!-- AJAX & JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const bookingDate = document.getElementById('booking_date');
    const flightSelect = document.getElementById('flight_id');
    const seatsInput = document.getElementById('seats_booked');
    const totalPriceInput = document.getElementById('total_price');
    const departureInput = document.getElementById('departure_time');
    const arrivalInput = document.getElementById('arrival_time');
    let flightsData = [];

    // Function to load flights for a given date
    function loadFlights(date, selectedFlightId = null) {
        flightSelect.innerHTML = '<option>Loading flights...</option>';
        fetch(`/flights/by-date?date=${date}`)
            .then(res => res.json())
            .then(data => {
                flightsData = data;
                let html = '<option value="">Select a flight</option>';
                data.forEach(flight => {
                    html += `<option value="${flight.id}"
                        data-price="${flight.price}"
                        data-seats="${flight.seats_available}"
                        data-departure="${flight.departure_time}"
                        data-arrival="${flight.arrival_time}"
                        ${selectedFlightId == flight.id ? 'selected' : ''}>
                        ${flight.flight_number} — ${flight.origin} → ${flight.destination}
                    </option>`;
                });
                flightSelect.innerHTML = html;
                updateFlightDetails();
            });
    }

    // Update departure, arrival, total price
    function updateFlightDetails() {
        const flightId = flightSelect.value;
        const seats = parseInt(seatsInput.value) || 0;
        const flight = flightsData.find(f => f.id == flightId);

        if(flight) {
            departureInput.value = new Date(flight.departure_time).toLocaleString();
            arrivalInput.value = new Date(flight.arrival_time).toLocaleString();
            totalPriceInput.value = (seats * flight.price).toFixed(2);
        } else {
            departureInput.value = '';
            arrivalInput.value = '';
            totalPriceInput.value = '';
        }
    }

    // Event listeners
    bookingDate.addEventListener('change', () => loadFlights(bookingDate.value));
    flightSelect.addEventListener('change', updateFlightDetails);
    seatsInput.addEventListener('input', updateFlightDetails);

    // Load flights on page load for existing booking
    loadFlights(bookingDate.value, "{{ $booking->flight_id }}");
});
</script>

@endsection
