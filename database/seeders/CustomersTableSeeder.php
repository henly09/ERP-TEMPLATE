<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customers; 

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 25; $i++) { // Change the loop count as needed
            Customers::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'contact_Num' => $faker->phoneNumber,
                'address' => $faker->address,
                'status' => $faker->randomElement(['Active', 'Closed','Balance','Paid']),
                'due_Date' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
