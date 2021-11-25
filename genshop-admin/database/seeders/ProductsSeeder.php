<?php

namespace Database\Seeders;

use App\Models\API\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            /* Presente dos Anjos */
            [
                'store_id' => 1,
                'name' => 'Suco de Gancho de Lobo',
                'price' => 15.00,
                'description' => 'Suco de gancho de lobo com gelo',
                'picture' => '...',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 1,
                'name' => 'Bebida de Bagas e Menta',
                'price' => 15.00,
                'description' => 'Bebida de menta adornada com baga',
                'picture' => '...',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 1,
                'name' => 'Sidra de Maçã',
                'price' => 15.00,
                'description' => 'Suco de maçã levemente gaseificado',
                'picture' => '...',
                'category' => 'Comidas/Bebidas'
            ],
            
            /* Pesca Mond */
            [
                'store_id' => 2,
                'name' => 'Emaranhador do Vento',
                'price' => 250,
                'description' => 'Vara de pescar customizada com a bênção do Arconte Anemo',
                'picture' => '...',
                'category' => 'Iscas/Varas'
            ],

            [
                'store_id' => 2,
                'name' => 'Isca de Frutas',
                'price' => 1.99,
                'description' => 'Isca feita com Fruto do Pôr do Sol e Trigo',
                'picture' => '...',
                'category' => 'Iscas/Varas'
            ],

            [
                'store_id' => 2,
                'name' => 'Isca de Milhete Vermelho',
                'price' => 4.50,
                'description' => 'Isca feita com Dendróbio e Carne',
                'picture' => '...',
                'category' => 'Iscas/Varas'
            ],

            [
                'store_id' => 2,
                'name' => 'Isca de Verme Falso',
                'price' => 8.90,
                'description' => 'Isca em forma de minhoca com aroma de frutas',
                'picture' => '...',
                'category' => 'Iscas/Varas'
            ],

            [
                'store_id' => 2,
                'name' => 'Isca de Mosca Falsa',
                'price' => 10,
                'description' => 'Isca de cores vibrantes sem cheiro',
                'picture' => '...',
                'category' => 'Iscas/Varas'
            ],

            /* Caçador de Cervos */
            [
                'store_id' => 3,
                'name' => 'Ovo Frito de Teyvat',
                'price' => 1.80,
                'description' => 'Ovo frito',
                'picture' => '...',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 3,
                'name' => 'Espeto de Frango com Cogumelos',
                'price' => 4.50,
                'description' => 'Espeto grelhado de frango e cogumelos',
                'picture' => '...',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 3,
                'name' => 'Pão de Pescador',
                'price' => 9.20,
                'description' => 'Torrada coberta com cebola',
                'picture' => '...',
                'category' => 'Comidas/Bebidas'
            ],

            /* Hopkins */
            [
                'store_id' => 4,
                'name' => 'Água de Banho da Barbara',
                'price' => 300,
                'description' => 'Um souvenir requintado para os fãs da maior idol de Teyvat',
                'picture' => '...',
                'category' => 'Muamba'
            ],

            /* Timaeus */
            [
                'store_id' => 5,
                'name' => 'Óleo Essencial Flamejante',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Pyro',
                'picture' => '...',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial de Torrente',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Hydro',
                'picture' => '...',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial Congelante',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Cryo',
                'picture' => '...',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial Vendaval',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Anemo',
                'picture' => '...',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial Chocante',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Electro',
                'picture' => '...',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial de Rocha',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Geo',
                'picture' => '...',
                'category' => 'Poções'
            ],

            /* Vento da Glória */
            [
                'store_id' => 6,
                'name' => 'Protótipo de Espada do Território do Norte',
                'price' => 225,
                'description' => 'Protótipo para criação de espada',
                'picture' => '...',
                'category' => 'Muamba'
            ],

            [
                'store_id' => 6,
                'name' => 'Lembrança dos Quatro Ventos',
                'price' => 500,
                'description' => 'Constelação perdida do Viajante',
                'picture' => '...',
                'category' => 'Muamba'
            ],

            /* Loja Mond */
            [
                'store_id' => 7,
                'name' => 'Sal',
                'price' => 2.50,
                'description' => 'Sal refinado',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Pimenta',
                'price' => 4.50,
                'description' => 'Pimenta moída',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Cebola',
                'price' => 3.50,
                'description' => 'Cebola',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Leite',
                'price' => 2.50,
                'description' => 'Leite integral',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Tomate',
                'price' => 3,
                'description' => 'Tomate',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Repolho',
                'price' => 2,
                'description' => 'Repolho',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Batata',
                'price' => 2.50,
                'description' => 'Batata',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],
            
            [
                'store_id' => 7,
                'name' => 'Trigo',
                'price' => 3.50,
                'description' => 'Trigo',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],

            /* Suspiro das Flores */
            [
                'store_id' => 8,
                'name' => 'Flor Doce',
                'price' => 2,
                'description' => 'Flor de aroma forte com sabor doce',
                'picture' => '...',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 8,
                'name' => 'Cecília',
                'price' => 10,
                'description' => 'Flor rara encontrada em locais com ventos fortes',
                'picture' => '...',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 8,
                'name' => 'Lâmpada de Grama',
                'price' => 10,
                'description' => 'Flor selvagem que emite luz à noite',
                'picture' => '...',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 8,
                'name' => 'Moinho de Vento Aster',
                'price' => 10,
                'description' => 'Flor símbolo de Mondstadt, descrita como a flor que adora o vento',
                'picture' => '...',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 8,
                'name' => 'Lótus de Leite',
                'price' => 10,
                'description' => 'Flor que cresce perto de fontes de água',
                'picture' => '...',
                'category' => 'Árvores/Flores'
            ],

            /* WAGNÃO */
            [
                'store_id' => 9,
                'name' => 'Protótipo Rancor',
                'price' => 500,
                'description' => 'Antiga espada longa descoberta na Forja do Penhasco Obscuro',
                'picture' => '...',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 9,
                'name' => 'Protótipo',
                'price' => 500,
                'description' => 'Protótipo de arco descoberto na Forja do Penhasco Obscuro',
                'picture' => '...',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 9,
                'name' => 'Protótipo Arcaico',
                'price' => 500,
                'description' => 'Espadão antigo descoberto na Forja do Penhasco Obscuro',
                'picture' => '...',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 9,
                'name' => 'Protótipo Âmbar',
                'price' => 500,
                'description' => 'Catalisador dourado guardado secretamente na Forja do Penhasco Obscuro',
                'picture' => '...',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 9,
                'name' => 'Protótipo Estelar',
                'price' => 500,
                'description' => 'Lança descoberta na Forja do Penhasco Obscuro',
                'picture' => '...',
                'category' => 'Armas/Utilitários'
            ],

            /* Goethe */
            [
                'store_id' => 10,
                'name' => 'Placa de Madeira Morta',
                'price' => 150,
                'description' => 'Placa utilizada pela Guilda de Aventureiros para marcar seus acampamentos',
                'picture' => '...',
                'category' => 'Decorações/Móveis'
            ],

            [
                'store_id' => 10,
                'name' => 'Tenda com Proteção Contra Raios',
                'price' => 300,
                'description' => 'Tenda espaçosa equipada com para-raios',
                'picture' => '...',
                'category' => 'Decorações/Móveis'
            ],

            [
                'store_id' => 10,
                'name' => 'Tenda Simples para Uma Pessoa',
                'price' => 100,
                'description' => 'Tenda confortável para uma pessoa',
                'picture' => '...',
                'category' => 'Decorações/Móveis'
            ],
        ];

        Product::insert($products);
    }
}