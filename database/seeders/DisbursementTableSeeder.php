<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vouchreqs;
use App\Models\Customers;
use App\Models\Disbursement;
use Faker\Factory as Faker;

class DisbursementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $customers = Customers::get();
        $vouchreq = Vouchreqs::get(); // errors
        
        for ($i = 1; $i <= 25; $i++) {

            // Fetch a random customer record
            $randomCustomer = $customers->random();

            // Assuming $vouchreq represents the Vouchreqs model
            $randomVouchreq = $vouchreq->random();

            $cust = Customers::where('id', $randomCustomer->id)->first();
            $vreq = Vouchreqs::where('cust_id', $cust->id)->first();

            $vouchId = $vreq ? $vreq->id : null;

            if ($vouchId){
                Disbursement::create([
                    'total_amount' => rand(235033, 2362363),
                    'beg_bank_balance' => rand(235033, 2362363),
                    'col_per_dccr' => rand(235033, 2362363),
                    'dis_per_dccr' => rand(235033, 2362363),
                    'bank_balance' => rand(235033, 2362363),
                    'vouch_id' =>  $vreq->id,
                    'cust_id' => $cust->id,
                ]);
            }
        }
    }
}
