<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressesSeeder extends Seeder
{

     public function run()
     {
               // sample address for customer
         $customer = User::where('email', 'customer@gmail.com')->first();
         $address1 = Address::create([
             'user_id' => $customer->id,
             'name' => 'Neema Plaza',
             'detail' => 'Bandaptai Street, Behind Naivas',
             // Kota Cimahi, Jawa Barat,
             'city' => 'Eldoret',
             'phone' => '0724871111',
         ]);

         $address2 = Address::create([
             'user_id' => $customer->id,
             'name' => 'High Garden',
             'detail' => 'Westlands, kurgung street',
             // Kota Bekasi, Jawa Barat,
             'city' => 'Nairobi',
             'phone' => '0729543970',
         ]);
     }
}
