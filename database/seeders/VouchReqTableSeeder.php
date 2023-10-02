<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vouchreqs;
use App\Models\Customers;
use Faker\Factory as Faker;

class VouchReqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $customers = Customers::get();

        // Use 'first()' to get a single record
        
        for ($i = 1; $i <= 25; $i++) {
            // Fetch a random customer record
            $randomCustomer = $customers->random();
    
             $cust = Customers::where('id', $randomCustomer->id)->first();

            Vouchreqs::create([
                'particulars' => $faker->sentence,
                'amount' => rand(235033, 2362363),
                'requested_by' => $faker->name,
                'check_by' => $faker->name,
                'cust_id' => $cust->id,
                'comments' => $faker->sentence,
            ]);
        }

    }
}
