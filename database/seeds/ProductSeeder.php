<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('Product')->insert([
            'name' => 'DOOM',
            'description' => 'Doom é um videojogo do género first-person shooter produzido pela id Software e publicado pela Bethesda Softworks. ',
            'image' => 'doom.jpg',
            'price' => 150,
            'category_id' => 6,
        ]);

        DB::table('Product')->insert([
            'name' => 'Fallout 4',
            'description' => 'Jogo eletrônico do gênero RPG de ação ambientado em mundo aberto produzido pela Bethesda Game Studios.',
            'image' => 'fallout.jpg',
            'price' => 200,
            'category_id' => 3,
        ]);

        DB::table('Product')->insert([
            'name' => 'EA Sports UFC 3',
            'description' => 'Jogo de artes marciais mistas desenvolvido pela Eletronic Arts para Playstation 4 e Xbox One.',
            'image' => 'ufc.jpg',
            'price' => 100,
            'category_id' => 2,
        ]);

        DB::table('Product')->insert([
            'name' => 'Zombi',
            'description' => 'O Jogo é um survival horror em primeira pessoa, desenvolvido pela Ubisoft Montpellier para o console de jogo Wii U. ',
            'image' => 'zombi.png_large',
            'price' => 79.90,
            'category_id' => 1,
        ]);
    }
}
