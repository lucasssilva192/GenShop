<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\API\Customer;
use App\Models\API\Product;
use App\Models\API\Store;
use DateTime;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        for($i = 1; $i <= 10; $i++){
            Store::insert(
            [
                'user_id' => $i,
                'name' => Str::random(10),
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => '11911112222',
                'telephone' => '11933334444',
                'profile_pic' => '...',
                'address' => Str::random(10)
            ]);

            Product::insert([
                'store_id' => $i,
                'name' => Str::random(10),
                'description' => Str::random(50),
                'price' => mt_rand(5, 100),
                'picture' => '...'
            ]);

            Customer::insert([
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'birth_date' => date("Y/m/d"),
                'cpf' => mt_rand(10000000000, 99999999999),
                'cellphone' => '11911112222',
                'telephone' => '11933334444',
                'profile_pic' => '...'
            ]);
        }
    }
}
