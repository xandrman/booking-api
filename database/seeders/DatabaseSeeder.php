<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private const COUNT = 10;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(self::COUNT)->create()->each(function (Customer $customer, int $key) {
            Booking::query()->create([
                'from' => now()->subDays(self::COUNT - $key)->hours(rand(2, 15))->minute(0)->seconds(0),
                'to' => now()->subDays(self::COUNT - $key)->hours(rand(16, 24))->minute(0)->seconds(0),
                'customer_id' => $customer->id,
            ]);
        });
    }
}
