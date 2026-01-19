<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Flight;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Flight::class;

    public function definition(): array
    {
        return [
            'flight_number'   => 'FL-' . $this->faker->unique()->numberBetween(100, 999),
            'origin'          => $this->faker->city,
            'destination'     => $this->faker->city,
            'departure_time'  => '2024-07-01 08:00:00',
            'arrival_time'    => '2024-07-01 11:00:00',
            'seats_available' => $this->faker->numberBetween(50, 300),
            'price'           => $this->faker->numberBetween(200, 2000),
        ];
    }
}
