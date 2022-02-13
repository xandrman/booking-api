<?php

namespace Database\Seeders;

use App\Exceptions\BookingBusyException;
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
        Customer::factory(self::COUNT)->create()->each(function (Customer $customer) {
            try {
                Booking::factory(rand(1, 2))->create(['customer_id' => $customer['id'],]);
            } catch (BookingBusyException $e) {}
        });
    }
}
