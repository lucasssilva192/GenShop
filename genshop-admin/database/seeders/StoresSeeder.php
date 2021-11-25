<?php

namespace Database\Seeders;

use App\Models\API\Store;
use Illuminate\Database\Seeder;

class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
            [
                'user_id' => 1,
                'name' => 'Presente dos Anjos',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Associação de Pesca de Mondstadt',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Pesca',
                'profile_pic' => '...',
                'address' => 'Lago de Sidra, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Caçador de Cervos',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Hopkins, O Maravilhoso',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Lembranças',
                'profile_pic' => '...',
                'address' => 'Vale Termal, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Timaeus',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Alquimia',
                'profile_pic' => '...',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],
            
            [
                'user_id' => 1,
                'name' => 'Vento da Glória',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Lembranças',
                'profile_pic' => '...',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Loja de Mondstadt',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Mercado',
                'profile_pic' => '...',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Suspiro das Flores',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Paisagismo',
                'profile_pic' => '...',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Ferraria do Wagner',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Ferraria',
                'profile_pic' => '...',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Goethe',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Móveis',
                'profile_pic' => '...',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Cauda do Gato',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Adega do Alvorecer',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Terras Altas das Lamentações, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Albergue Wangshu',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Estuário de Qiongji, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Verr Goldet',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Paisagismo',
                'profile_pic' => '...',
                'address' => 'Estuário de Qiongji, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Mestre Lu',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Móveis',
                'profile_pic' => '...',
                'address' => 'Estuário de Qiongji, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Biblioteca Wanwen',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Livraria',
                'profile_pic' => '...',
                'address' => 'Porto de Liyue, Liyue'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Joalheria Mingxing',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Lembranças',
                'profile_pic' => '...',
                'address' => 'Porto de Liyue, Liyue'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Restaurante Wanmin',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Pavilhão Liuli',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Quiosque Xinyue',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Segunda Vida',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Mercado',
                'profile_pic' => '...',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Mestre Zhang',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Ferraria',
                'profile_pic' => '...',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Associação de Pesca de Liyue',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Pesca',
                'profile_pic' => '...',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Associação de Pesca de Inazuma',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Pesca',
                'profile_pic' => '...',
                'address' => 'Planície Byakko, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Ferraria Amenoma',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Ferraria',
                'profile_pic' => '...',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Restaurante Kiminami',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Editora Yae',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Livraria',
                'profile_pic' => '...',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Restaurante Shimura',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Construções Netsuke no Gen',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Lembranças',
                'profile_pic' => '...',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Mercearia Tsukumomono',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Mercado',
                'profile_pic' => '...',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Tomoki',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Restaurante Uyuu',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Restaurante',
                'profile_pic' => '...',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Tubby',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(84900000000, 84999999999),
                'telephone' => mt_rand(8400000000, 8499999999),
                'type' => 'Móveis',
                'profile_pic' => '...',
                'address' => 'Bule de Relachá'
            ],

            [
                'user_id' => 1,
                'name' => 'Chubby',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(84900000000, 84999999999),
                'telephone' => mt_rand(8400000000, 8499999999),
                'type' => 'Paisagismo',
                'profile_pic' => '...',
                'address' => 'Bule de Relachá'
            ]
        ];

        Store::insert($stores);
    }
}
