<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bookable_id' => $this->faker->numberBetween(0, 5),
            'from' => $this->faker->dateTimeInInterval('now', '+2 weeks'),
            'to' => $this->faker->dateTimeInInterval('+7 day', '+3 weeks'),
            'review_key' => Str::uuid(),
            'price' => random_int(200, 5000)
        ];
    }
}
