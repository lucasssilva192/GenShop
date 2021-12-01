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
                'profile_pic' => 'anjos.png',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Associação de Pesca de Mondstadt',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Pesca',
                'profile_pic' => 'pesca_mond.png',
                'address' => 'Lago de Sidra, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Caçador de Cervos',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Restaurante',
                'profile_pic' => 'cervo.png',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Hopkins, O Maravilhoso',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Lembranças',
                'profile_pic' => 'hopkins.png',
                'address' => 'Vale Termal, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Timaeus',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Alquimia',
                'profile_pic' => 'timaeus.png',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],
            
            [
                'user_id' => 1,
                'name' => 'Vento da Glória',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Lembranças',
                'profile_pic' => 'vento.png',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Loja de Mondstadt',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Mercado',
                'profile_pic' => 'loja_mond.png',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Suspiro das Flores',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Paisagismo',
                'profile_pic' => 'flores.png',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Ferraria do Wagner',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Ferraria',
                'profile_pic' => 'wagnao.png',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],

            [
                'user_id' => 1,
                'name' => 'Goethe',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Móveis',
                'profile_pic' => 'goethe.png',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Cauda do Gato',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Restaurante',
                'profile_pic' => 'gato.png',
                'address' => 'Cidade de Mondstadt, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Adega do Alvorecer',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(11900000000, 11999999999),
                'telephone' => mt_rand(1100000000, 1199999999),
                'type' => 'Restaurante',
                'profile_pic' => 'adega.png',
                'address' => 'Terras Altas das Lamentações, Mondstadt'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Albergue Wangshu',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Restaurante',
                'profile_pic' => 'wangshu.png',
                'address' => 'Estuário de Qiongji, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Verr Goldet',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Paisagismo',
                'profile_pic' => 'goldet.png',
                'address' => 'Estuário de Qiongji, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Carpintaria de Fanmu',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Móveis',
                'profile_pic' => 'mestre_lu.png',
                'address' => 'Vila Qingce, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Biblioteca Wanwen',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Livraria',
                'profile_pic' => 'biblioteca.png',
                'address' => 'Porto de Liyue, Liyue'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Joalheria Mingxing',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Lembranças',
                'profile_pic' => 'pastelaria.png',
                'address' => 'Porto de Liyue, Liyue'
            ],
        
            [
                'user_id' => 1,
                'name' => 'Restaurante Wanmin',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Restaurante',
                'profile_pic' => 'wanmin.png',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Pavilhão Liuli',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Restaurante',
                'profile_pic' => 'liuli.png',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Quiosque Xinyue',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Restaurante',
                'profile_pic' => 'xinyue.png',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Segunda Vida',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Mercado',
                'profile_pic' => 'segunda_vida.png',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Ferro de Hanfeng',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Ferraria',
                'profile_pic' => 'zhang.png',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Associação de Pesca de Liyue',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(15900000000, 15999999999),
                'telephone' => mt_rand(1500000000, 1599999999),
                'type' => 'Pesca',
                'profile_pic' => 'pesca_liyue.png',
                'address' => 'Porto de Liyue, Liyue'
            ],

            [
                'user_id' => 1,
                'name' => 'Associação de Pesca de Inazuma',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Pesca',
                'profile_pic' => 'pesca_inazuma.png',
                'address' => 'Planície Byakko, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Ferraria Amenoma',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Ferraria',
                'profile_pic' => 'amenoma.png',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Restaurante Kiminami',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Restaurante',
                'profile_pic' => 'kiminami.png',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Editora Yae',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Livraria',
                'profile_pic' => 'editora.png',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Restaurante Shimura',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Restaurante',
                'profile_pic' => 'restaurante.png',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Construções Netsuke no Gen',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Lembranças',
                'profile_pic' => 'netsuke.png',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Mercearia Tsukumomono',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Mercado',
                'profile_pic' => 'mercearia.png',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Tomoki',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Restaurante',
                'profile_pic' => 'tomoki.png',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Restaurante Uyuu',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(24900000000, 24999999999),
                'telephone' => mt_rand(2400000000, 2499999999),
                'type' => 'Restaurante',
                'profile_pic' => 'uyuu.png',
                'address' => 'Cidade de Inazuma, Inazuma'
            ],

            [
                'user_id' => 1,
                'name' => 'Tubby',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(84900000000, 84999999999),
                'telephone' => mt_rand(8400000000, 8499999999),
                'type' => 'Móveis',
                'profile_pic' => 'tubby.png',
                'address' => 'Bule de Relachá'
            ],

            [
                'user_id' => 1,
                'name' => 'Chubby',
                'cnpj' => mt_rand(10000000000000, 99999999999999),
                'cellphone' => mt_rand(84900000000, 84999999999),
                'telephone' => mt_rand(8400000000, 8499999999),
                'type' => 'Paisagismo',
                'profile_pic' => 'chubby.png',
                'address' => 'Bule de Relachá'
            ]
        ];

        Store::insert($stores);
    }
}