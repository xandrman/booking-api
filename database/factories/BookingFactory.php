<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $from = Carbon::parse($this->faker->dateTimeThisMonth())->minutes(0)->seconds(0);
        return [
            'from' => $from,
            'to' => Carbon::parse($from)->addHours(rand(1, 71)),
        ];
    }
}
