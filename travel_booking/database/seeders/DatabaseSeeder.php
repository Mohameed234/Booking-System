<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Flight;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed flights
        Flight::factory()->create([
            'flight_number'   => 'FL123',
            'origin'          => 'New York',
            'destination'     => 'Los Angeles',
            'departure_time'  => '2024-07-01 08:00:00',
            'arrival_time'    => '2024-07-01 11:00:00',
            'seats_available' => 150,
            'price'           => 199.99,
        ]);

    }
}
