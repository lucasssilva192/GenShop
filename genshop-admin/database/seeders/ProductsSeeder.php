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
                'picture' => 'suco_gancho.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 1,
                'name' => 'Bebida de Bagas e Menta',
                'price' => 15.00,
                'description' => 'Bebida de menta adornada com baga',
                'picture' => 'bagas_menta.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 1,
                'name' => 'Sidra de Maçã',
                'price' => 15.00,
                'description' => 'Suco de maçã levemente gaseificado',
                'picture' => 'sidra_maca.png',
                'category' => 'Comidas/Bebidas'
            ],
            
            /* Pesca Mond */
            [
                'store_id' => 2,
                'name' => 'Emaranhador do Vento',
                'price' => 250,
                'description' => 'Vara de pescar customizada com a bênção do Arconte Anemo',
                'picture' => 'vara_mond.png',
                'category' => 'Iscas/Varas'
            ],

            [
                'store_id' => 2,
                'name' => 'Isca de Frutas',
                'price' => 1.99,
                'description' => 'Isca feita com Fruto do Pôr do Sol e Trigo',
                'picture' => 'isca_frutas.png',
                'category' => 'Iscas/Varas'
            ],

            [
                'store_id' => 2,
                'name' => 'Isca de Milhete Vermelho',
                'price' => 4.50,
                'description' => 'Isca feita com Dendróbio e Carne',
                'picture' => 'isca_milhete.png',
                'category' => 'Iscas/Varas'
            ],

            [
                'store_id' => 2,
                'name' => 'Isca de Verme Falso',
                'price' => 8.90,
                'description' => 'Isca em forma de minhoca com aroma de frutas',
                'picture' => 'isca_minhoca.png',
                'category' => 'Iscas/Varas'
            ],

            [
                'store_id' => 2,
                'name' => 'Isca de Mosca Falsa',
                'price' => 10,
                'description' => 'Isca de cores vibrantes sem cheiro',
                'picture' => 'isca_mosca.png',
                'category' => 'Iscas/Varas'
            ],

            /* Caçador de Cervos */
            [
                'store_id' => 3,
                'name' => 'Ovo Frito de Teyvat',
                'price' => 1.80,
                'description' => 'Ovo frito',
                'picture' => 'ovo_frito.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 3,
                'name' => 'Espeto de Frango com Cogumelos',
                'price' => 4.50,
                'description' => 'Espeto grelhado de frango e cogumelos',
                'picture' => 'espeto.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 3,
                'name' => 'Pão de Pescador',
                'price' => 9.20,
                'description' => 'Torrada coberta com cebola',
                'picture' => 'pao_pescador.png',
                'category' => 'Comidas/Bebidas'
            ],

            /* Hopkins */
            [
                'store_id' => 4,
                'name' => 'Água de Banho da Barbara',
                'price' => 300,
                'description' => 'Um souvenir requintado para os fãs da maior idol de Teyvat',
                'picture' => 'agua_banho.png',
                'category' => 'Muamba'
            ],

            /* Timaeus */
            [
                'store_id' => 5,
                'name' => 'Óleo Essencial Flamejante',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Pyro',
                'picture' => 'pocao_fogo.png',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial de Torrente',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Hydro',
                'picture' => 'pocao_agua.png',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial Congelante',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Cryo',
                'picture' => 'pocao_gelo.png',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial Vendaval',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Anemo',
                'picture' => 'pocao_vento.png',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial Chocante',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Electro',
                'picture' => 'pocao_raio.png',
                'category' => 'Poções'
            ],

            [
                'store_id' => 5,
                'name' => 'Óleo Essencial de Rocha',
                'price' => 20,
                'description' => 'Poção para aumentar o dano Geo',
                'picture' => 'pocao_pedra.png',
                'category' => 'Poções'
            ],

            /* Vento da Glória */
            [
                'store_id' => 6,
                'name' => 'Protótipo de Espada do Território do Norte',
                'price' => 225,
                'description' => 'Protótipo para criação de espada',
                'picture' => 'prototipo_espada.png',
                'category' => 'Muamba'
            ],

            /* Loja Mond */
            [
                'store_id' => 7,
                'name' => 'Sal',
                'price' => 2.50,
                'description' => 'Sal refinado',
                'picture' => 'sal.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Pimenta',
                'price' => 4.50,
                'description' => 'Pimenta moída',
                'picture' => 'pimenta.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Cebola',
                'price' => 3.50,
                'description' => 'Cebola',
                'picture' => 'cebola.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Leite',
                'price' => 2.50,
                'description' => 'Leite integral',
                'picture' => 'leite.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Tomate',
                'price' => 3,
                'description' => 'Tomate',
                'picture' => 'tomate.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Repolho',
                'price' => 2,
                'description' => 'Repolho',
                'picture' => 'repolho.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 7,
                'name' => 'Batata',
                'price' => 2.50,
                'description' => 'Batata',
                'picture' => 'batata.png',
                'category' => 'Ingredientes'
            ],
            
            [
                'store_id' => 7,
                'name' => 'Trigo',
                'price' => 3.50,
                'description' => 'Trigo',
                'picture' => 'trigo.png',
                'category' => 'Ingredientes'
            ],

            /* Suspiro das Flores */
            [
                'store_id' => 8,
                'name' => 'Flor Doce',
                'price' => 2,
                'description' => 'Flor de aroma forte com sabor doce',
                'picture' => 'flor_doce.png',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 8,
                'name' => 'Cecília',
                'price' => 10,
                'description' => 'Flor rara encontrada em locais com ventos fortes',
                'picture' => 'cecilia.png',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 8,
                'name' => 'Lâmpada de Grama',
                'price' => 10,
                'description' => 'Flor selvagem que emite luz à noite',
                'picture' => 'lampada_grama.png',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 8,
                'name' => 'Moinho de Vento Aster',
                'price' => 10,
                'description' => 'Flor símbolo de Mondstadt, descrita como a flor que adora o vento',
                'picture' => 'moinho_aster.png',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 8,
                'name' => 'Lótus de Leite',
                'price' => 10,
                'description' => 'Flor que cresce perto de fontes de água',
                'picture' => 'lotus_leite.png',
                'category' => 'Árvores/Flores'
            ],

            /* WAGNÃO */
            [
                'store_id' => 9,
                'name' => 'Protótipo Rancor',
                'price' => 500,
                'description' => 'Antiga espada longa descoberta na Forja do Penhasco Obscuro',
                'picture' => 'rancor.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 9,
                'name' => 'Protótipo',
                'price' => 500,
                'description' => 'Protótipo de arco descoberto na Forja do Penhasco Obscuro',
                'picture' => 'crescente.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 9,
                'name' => 'Protótipo Arcaico',
                'price' => 500,
                'description' => 'Espadão antigo descoberto na Forja do Penhasco Obscuro',
                'picture' => 'arcaico.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 9,
                'name' => 'Protótipo Âmbar',
                'price' => 500,
                'description' => 'Catalisador dourado guardado secretamente na Forja do Penhasco Obscuro',
                'picture' => 'ambar.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 9,
                'name' => 'Protótipo Estelar',
                'price' => 500,
                'description' => 'Lança descoberta na Forja do Penhasco Obscuro',
                'picture' => 'estelar.png',
                'category' => 'Armas/Utilitários'
            ],

            /* Goethe */
            [
                'store_id' => 10,
                'name' => 'Placa de Madeira Morta',
                'price' => 150,
                'description' => 'Placa utilizada pela Guilda de Aventureiros para marcar seus acampamentos',
                'picture' => 'placa.png',
                'category' => 'Decorações/Móveis'
            ],

            [
                'store_id' => 10,
                'name' => 'Tenda com Proteção Contra Raios',
                'price' => 300,
                'description' => 'Tenda espaçosa equipada com para-raios',
                'picture' => 'tenda_raio.png',
                'category' => 'Decorações/Móveis'
            ],

            [
                'store_id' => 10,
                'name' => 'Tenda Simples para Uma Pessoa',
                'price' => 100,
                'description' => 'Tenda confortável para uma pessoa',
                'picture' => 'tenda.png',
                'category' => 'Decorações/Móveis'
            ],

            /* Albergue Wangshu */
            [
                'store_id' => 13,
                'name' => 'Tofu de Amêndoas',
                'price' => 15.50,
                'description' => 'Pedaços de tofu com amêndoas',
                'picture' => 'tofu_amendoa.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 13,
                'name' => 'Enroladinho de Carne com Matsutake',
                'price' => 17.75,
                'description' => 'Carne moída envolta por matsutake',
                'picture' => 'enroladinho',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 13,
                'name' => 'Frango de Pimenta de Jueyun',
                'price' => 19.25,
                'description' => 'Tiras de frango frio com molho de pimenta de jueyun',
                'picture' => 'frango_jueyun.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 13,
                'name' => 'Macarrão com Delícias das Montanhas',
                'price' => 15.50,
                'description' => 'Macarrão ao molho de carne e legumes',
                'picture' => 'macarrao_montanha',
                'category' => 'Comidas/Bebidas'
            ],

            /* Verr Goldet */
            [
                'store_id' => 14,
                'name' => 'Flor de Seda',
                'price' => 10,
                'description' => 'Flor utilizada para confeccção de tecidos',
                'picture' => 'seda.png',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 14,
                'name' => 'Violeta',
                'price' => 10,
                'description' => 'Pequena flor com forte vitalidade e cores vibrantes',
                'picture' => 'violeta.png',
                'category' => 'Árvores/Flores'
            ],

            /* Mestre Lu */
            [
                'store_id' => 15,
                'name' => 'Fardos do Aventureiro',
                'price' => 80,
                'description' => 'Pilha de itens usados por um aventureiro',
                'picture' => 'fardo.png',
                'category' => 'Decorações/Móveis'
            ],

            /* Biblioteca Wanwen */
            [
                'store_id' => 16,
                'name' => 'Rex Incognito',
                'price' => 15,
                'description' => 'Romance que retrata as excursões de Rex lapis no mundo mortal',
                'picture' => 'rex_incognito.png',
                'category' => 'Livros'
            ],

            [
                'store_id' => 16,
                'name' => 'Pérola de Coração',
                'price' => 15,
                'description' => 'A jornada de um homem para encontrar o homem que devolveu a pulseira de pérolas de Zixin',
                'picture' => 'perola_coracao.png',
                'category' => 'Livros'
            ],

            [
                'store_id' => 16,
                'name' => 'Espada Solitária em Terra Estéril',
                'price' => 30,
                'description' => 'Romance de artes marciais de um mundo sem alquimia e poderes elementais',
                'picture' => 'espada_solitaria.png',
                'category' => 'Livros'
            ],

            [
                'store_id' => 16,
                'name' => 'A Queda de Shenxiao',
                'price' => 30,
                'description' => 'Uma jornada épica em busca da alabarda do Rei Deus',
                'picture' => 'shenxiao.png',
                'category' => 'Livros'
            ],

            /* Pastelaria */
            [
                'store_id' => 17,
                'name' => 'Protótipo de Arco do Território do Norte',
                'price' => 225,
                'description' => 'Protótipo para criação de arco',
                'picture' => 'prototipo_arco.png',
                'category' => 'Muamba'
            ],

            [
                'store_id' => 17,
                'name' => 'Protótipo de Espadão do Território do Norte',
                'price' => 225,
                'description' => 'Protótipo para criação de espadão',
                'picture' => 'prototipo_espadao.png',
                'category' => 'Muamba'
            ],

            [
                'store_id' => 17,
                'name' => 'Protótipo de Catalisador do Território do Norte',
                'price' => 225,
                'description' => 'Protótipo para criação de catalisador',
                'picture' => 'prototipo_catalisador.png',
                'category' => 'Muamba'
            ],

            [
                'store_id' => 17,
                'name' => 'Protótipo de Lança do Território do Norte',
                'price' => 225,
                'description' => 'Protótipo para criação de lança',
                'picture' => 'prototipo_lança.png',
                'category' => 'Muamba'
            ],

            /* Restaurante Wanmin */
            [
                'store_id' => 18,
                'name' => 'Ovo Frito de Teyvat',
                'price' => 1.80,
                'description' => 'Ovo frito',
                'picture' => 'ovo_frito.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 18,
                'name' => 'Espeto de Frango com Cogumelos',
                'price' => 4.50,
                'description' => 'Espeto grelhado de frango e cogumelos',
                'picture' => 'espeto.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 18,
                'name' => 'Pão de Pescador',
                'price' => 9.20,
                'description' => 'Torrada coberta com cebola',
                'picture' => 'pao_pescador.png',
                'category' => 'Comidas/Bebidas'
            ],

            /* Pavilhão Liuli */
            [
                'store_id' => 19,
                'name' => 'Iguarias do Porto de Pedra',
                'price' => 19.25,
                'description' => 'Vegatais típicos de Liyue fritos',
                'picture' => 'iguarias_porto.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 19,
                'name' => 'Macarrão com Delícias das Montanhas',
                'price' => 21.50,
                'description' => 'Macarrão ao molho de carne e legumes',
                'picture' => 'macarrao_montanha.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 19,
                'name' => 'Porco Curado com Matsutake',
                'price' => 72.75,
                'description' => 'Carne de porco frita com molho de matsutake picante',
                'picture' => 'porco_curado.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 19,
                'name' => 'Carne de Tianshu',
                'price' => 120,
                'description' => 'Corte nobre de carne defumado e assado',
                'picture' => 'carne_tianshu.png',
                'category' => 'Comidas/Bebidas'
            ],

            /* Quiosque Xinyue */
            [
                'store_id' => 20,
                'name' => 'Macarrão com Peixe Frito',
                'price' => 13.75,
                'description' => 'Macarrão de arroz frito e peixe pré-cozido',
                'picture' => 'macarrao_peixe.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 20,
                'name' => 'Almôndegas Douradas de Camarão',
                'price' => 57,
                'description' => 'Camarão frito envolto em batatas crocantes',
                'picture' => 'almondegas_camarao.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 20,
                'name' => 'Ovo de Lua Cheia',
                'price' => 57.75,
                'description' => 'Bolinhos de camarão e peixe cozidos a vapor',
                'picture' => 'ovo_lua.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 20,
                'name' => 'Caranguejo Dourado',
                'price' => 122,
                'description' => 'Caranguejo cozido em pedaços',
                'picture' => 'caranguejo.png',
                'category' => 'Comidas/Bebidas'
            ],

            /* Segunda Vida */
            [
                'store_id' => 21,
                'name' => 'Sal',
                'price' => 2.50,
                'description' => 'Sal refinado',
                'picture' => 'sal.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Pimenta',
                'price' => 4.50,
                'description' => 'Pimenta moída',
                'picture' => 'pimenta.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Cebola',
                'price' => 3.50,
                'description' => 'Cebola',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Leite',
                'price' => 2.50,
                'description' => 'Leite integral',
                'picture' => 'cebola.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Tomate',
                'price' => 3,
                'description' => 'Tomate',
                'name' => 'Tomate',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Repolho',
                'price' => 2,
                'description' => 'Repolho',
                'picture' => 'repolho.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Batata',
                'price' => 2.50,
                'description' => 'Batata',
                'picture' => 'batata.png',
                'category' => 'Ingredientes'
            ],
            
            [
                'store_id' => 21,
                'name' => 'Trigo',
                'price' => 3.50,
                'description' => 'Trigo',
                'picture' => 'trigo.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Arroz',
                'price' => 5.50,
                'description' => 'Arroz tipo 1',
                'picture' => '...',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Camarão',
                'price' => 10,
                'description' => 'Camarão fresco',
                'picture' => 'camarao.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Tofu',
                'price' => 6.50,
                'description' => 'Tofu fresco',
                'picture' => 'tofu.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 21,
                'name' => 'Amêndoa',
                'price' => 4.50,
                'description' => 'Pacote de amêndoas',
                'picture' => 'amendoa.png',
                'category' => 'Ingredientes'
            ],

            /* Mestre Zhang */
            [
                'store_id' => 22,
                'name' => 'Espinho de Ferro',
                'price' => 500,
                'description' => 'Espada exótica, leve, ágil e afiada',
                'picture' => 'espinho.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 22,
                'name' => 'Arco Composto',
                'price' => 500,
                'description' => 'Arco de liga metálica com rodas que esticam a corda',
                'picture' => 'composto.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 22,
                'name' => 'Sombra Branca',
                'price' => 500,
                'description' => 'Espadão exótico com uma lâmina que ficou sem corte',
                'picture' => 'sombra.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 22,
                'name' => 'Mappa Mare',
                'price' => 500,
                'description' => 'Um mapa bastante detalhado sobre as águas ao redor de Teyvat',
                'picture' => 'mappa.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 22,
                'name' => 'Pique Crescente',
                'price' => 500,
                'description' => 'Uma arma exótica com uma lâmina comprida no topo e uma crescente na parte de baixo',
                'picture' => 'pique.png',
                'category' => 'Armas/Utilitários'
            ],

            /* Pesca Liyue */
            [
                'store_id' => 23,
                'name' => 'Realizador de Desejos',
                'price' => 250,
                'description' => 'Vara de pescar de bambu feita por um eremita de Liyue',
                'picture' => 'vara_liyue.png',
                'category' => 'Iscas/Varas'
            ], 
            
            [
                'store_id' => 23,
                'name' => 'Piscina da Nuvem de Espíritos',
                'price' => 1000,
                'description' => 'Lago artificial para criação de peixes',
                'picture' => 'aquario.png',
                'category' => 'Iscas/Varas'
            ],

            /* Pesca Inazuma */
            [
                'store_id' => 24,
                'name' => 'Narukawa Ukai',
                'price' => 250,
                'description' => 'Vara criada para celebrar o método de pesca Ukai',
                'picture' => 'vara_inazuma.png',
                'category' => 'Iscas/Varas'
            ], 
            
            [
                'store_id' => 24,
                'name' => 'A Fisgada',
                'price' => 500,
                'description' => 'Antigo tridente utilizado por um famoso bandido de Inazuma',
                'picture' => 'fisgada.png',
                'category' => 'Iscas/Varas'
            ],

            /* Ferraria Amenoma */
            [
                'store_id' => 25,
                'name' => 'Lâmina Amenoma Kageuta',
                'price' => 500,
                'description' => 'Uma lâmina que dizem ter sido feita sob encomenda por um samurai',
                'picture' => 'amenoma.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 25,
                'name' => 'Arco Quebra-Demônios',
                'price' => 500,
                'description' => 'Arco de guerra utilizado por uma bruxa do templo',
                'picture' => 'hamayumi.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 25,
                'name' => 'Espada Grande de Katsuragi',
                'price' => 500,
                'description' => 'Espadão forjado em Tatarasuna',
                'picture' => 'nagamasa.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 25,
                'name' => 'Anel de Hakushin',
                'price' => 500,
                'description' => 'Catalisador que guarda a memória de Kitsune Saiguu',
                'picture' => 'hakushin.png',
                'category' => 'Armas/Utilitários'
            ],

            [
                'store_id' => 25,
                'name' => 'Lança Cruzada de Kitain',
                'price' => 500,
                'description' => 'Lança especial que foi usada por um guerreiro famoso que guardava o Tatarigami',
                'picture' => 'kitain.png',
                'category' => 'Armas/Utilitários'
            ],

            /* Restaurante Kiminami */
            [
                'store_id' => 26,
                'name' => 'Cozido Misto do Mercado Delicioso',
                'price' => 74.25,
                'description' => 'Sopa leve com ingredientes locais de Inazuma',
                'picture' => 'cozido.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 26,
                'name' => 'Pizza de Cogumelos',
                'price' => 60.75,
                'description' => 'Pizza coberta de queijo e cogumelos',
                'picture' => 'pizza.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 26,
                'name' => 'Pizza de Cogumelos Especial',
                'price' => 60.75,
                'description' => 'Pizza coberta de queijo, cogumelos e melão de lavanda',
                'picture' => 'pizza_especial.png',
                'category' => 'Comidas/Bebidas'
            ],

            /* Editora Yae */
            [
                'store_id' => 27,
                'name' => 'Hex & Hound',
                'price' => 30,
                'description' => 'A história de uma grande maga e seu fiel companheiro canino',
                'picture' => 'hex.png',
                'category' => 'Livros'
            ],

            [
                'store_id' => 27,
                'name' => 'A Lenda da Espada',
                'price' => 30,
                'description' => 'Romance que retrata uma guerra em meio ao mar de estrelas que giram ao contrário',
                'picture' => 'lenda_espada.png',
                'category' => 'Livros'
            ],

            [
                'store_id' => 27,
                'name' => 'Flores para a Princesa Fischl',
                'price' => 30,
                'description' => 'Edição de colecionador que reúne todos os volumes do best-seller aclamado pelo público',
                'picture' => 'fischl.png',
                'category' => 'Livros'
            ],

            /* Restaurante Shimura */
            [
                'store_id' => 28,
                'name' => 'Ovo Frito de Teyvat',
                'price' => 1.80,
                'description' => 'Ovo frito',
                'picture' => 'ovo_frito.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 28,
                'name' => 'Espeto de Frango com Cogumelos',
                'price' => 4.50,
                'description' => 'Espeto grelhado de frango e cogumelos',
                'picture' => 'espeto.png',
                'category' => 'Comidas/Bebidas'
            ],

            [
                'store_id' => 28,
                'name' => 'Pão de Pescador',
                'price' => 9.20,
                'description' => 'Torrada coberta com cebola',
                'picture' => 'pao_pescador.png',
                'category' => 'Comidas/Bebidas'
            ],

            /* Mercearia Tsukumomono */
            [
                'store_id' => 30,
                'name' => 'Sal',
                'price' => 2.50,
                'description' => 'Sal refinado',
                'picture' => 'sal.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 30,
                'name' => 'Pimenta',
                'price' => 4.50,
                'description' => 'Pimenta moída',
                'picture' => 'pimenta.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 30,
                'name' => 'Cebola',
                'price' => 3.50,
                'description' => 'Cebola',
                'picture' => 'cebola.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 30,
                'name' => 'Leite',
                'price' => 2.50,
                'description' => 'Leite integral',
                'picture' => 'leite.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 30,
                'name' => 'Tomate',
                'price' => 3,
                'description' => 'Tomate',
                'picture' => 'tomate.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 30,
                'name' => 'Repolho',
                'price' => 2,
                'description' => 'Repolho',
                'picture' => 'repolho.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 30,
                'name' => 'Batata',
                'price' => 2.50,
                'description' => 'Batata',
                'picture' => 'batata.png',
                'category' => 'Ingredientes'
            ],
            
            [
                'store_id' => 30,
                'name' => 'Trigo',
                'price' => 3.50,
                'description' => 'Trigo',
                'picture' => 'trigo.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 30,
                'name' => 'Arroz',
                'price' => 5.50,
                'description' => 'Arroz tipo 1',
                'picture' => 'arroz.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 30,
                'name' => 'Camarão',
                'price' => 10,
                'description' => 'Camarão fresco',
                'picture' => 'camarao.png',
                'category' => 'Ingredientes'
            ],

            [
                'store_id' => 30,
                'name' => 'Tofu',
                'price' => 6.50,
                'description' => 'Tofu fresco',
                'picture' => 'tofu.png',
                'category' => 'Ingredientes'
            ],

            /* Tomoki */
            [
                'store_id' => 31,
                'name' => 'Leite de Dango',
                'price' => 15,
                'description' => 'Leite batido com dango',
                'picture' => 'leite_dango.png',
                'category' => 'Ingredientes'
            ],

            /* Tubby */
            [
                'store_id' => 33,
                'name' => 'Cama Suave Como a Brisa',
                'price' => 250,
                'description' => 'Cama padrão dos dormitórios dos Cavaleiros de Favonius',
                'picture' => 'cama.png',
                'category' => 'Decorações/Móveis'
            ],

            [
                'store_id' => 33,
                'name' => 'Fogão Portátil',
                'price' => 100,
                'description' => 'Fogão leve e conveniente para ser levado para qualquer ambiente',
                'picture' => 'fogao.png',
                'category' => 'Decorações/Móveis'
            ],

            [
                'store_id' => 33,
                'name' => 'Mesa Redonda de Cedro Vermelho',
                'price' => 150,
                'description' => 'Mesa de centro redonda',
                'picture' => 'mesa.png',
                'category' => 'Decorações/Móveis'
            ],

            /* Chubby */
            [
                'store_id' => 34,
                'name' => 'Árvore Cuihua',
                'price' => 80,
                'description' => 'Madeira de lei de folhas verdes e vida longa',
                'picture' => 'cuihua.png',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 34,
                'name' => 'O Ganso Errante em Si',
                'price' => 80,
                'description' => 'Bordo de Amur de cores vermelhas',
                'picture' => 'ganso.png',
                'category' => 'Árvores/Flores'
            ],

            [
                'store_id' => 34,
                'name' => 'Entre Nove Passos',
                'price' => 120,
                'description' => 'Árvore de Sakura alta, reta e com coloração arroxeada',
                'picture' => 'sakura.png',
                'category' => 'Árvores/Flores'
            ],
        ];

        Product::insert($products);
    }
}