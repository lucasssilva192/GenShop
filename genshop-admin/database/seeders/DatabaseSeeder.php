<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\API\Customer;
use App\Models\API\Product;
use App\Models\API\Store;
use App\Models\User;
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
        for($x = 1; $x <= 3; $x++){
            switch ($x) {
                case 1:
                    $name = 'Lucao Santos';
                    $email = 'lucas.ssantos192@gmail.com';
                    $password = '23714871';
                    break;
                case 2:
                    $name = 'Nicolas Alberto';
                    $email = 'naranonva@hotmail.com';
                    $password = '44554455';
                    break;
                case 3:
                    $name = 'Henrique Pereira';
                    $email = 'henriquepereira@gmail.com';
                    $password = '123456789';
                    break;
            }
            User::insert([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password)
            ]);

            if($x == 3){
                Customer::insert([
                    'user_id' => $x,
                    'first_name' => Str::random(10),
                    'last_name' => Str::random(10),
                    'birth_date' => date("Y/m/d"),
                    'cpf' => mt_rand(10000000000, 99999999999),
                    'cellphone' => '11911112222',
                    'telephone' => '11933334444',
                    'profile_pic' => '...'
                ]);
            }
            else{
                Store::insert(
                    [
                        'user_id' => $x,
                        'name' => Str::random(10),
                        'cnpj' => mt_rand(10000000000000, 99999999999999),
                        'cellphone' => '11911112222',
                        'telephone' => '11933334444',
                        'profile_pic' => '...',
                        'address' => Str::random(10)
                    ]);
                for($i = 1; $i <= 5; $i++){
                    Product::insert([
                        'store_id' => $x,
                        'name' => Str::random(10),
                        'price' => rand(1, 40),
                        'description' => Str::random(50),
                        'picture' => '...'
                    ]);
                }
            }
        }


    }
}
