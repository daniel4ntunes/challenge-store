<?php

use Illuminate\Database\Seeder;

class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('Characteristic')->insert([
            'title' => 'Plataformas',
            'des' => 'PlayStation 4, Xbox One, Microsoft Windows',
        ]);

        DB::table('Characteristic')->insert([
            'title' => 'Plataformas',
            'des' => 'PlayStation 4, Xbox One',
        ]);

        DB::table('Characteristic')->insert([
            'title' => 'Motor',
            'des' => 'Ignite',
        ]);

        DB::table('Characteristic')->insert([
            'title' => 'Modos de jogo',
            'des' => 'Single Player, multiplayer',
        ]);

        DB::table('Characteristic')->insert([
            'title' => 'Estúdios',
            'des' => 'Electronic Arts, EA Sports',
        ]);

        DB::table('Characteristic')->insert([
            'title' => 'Gêneros',
            'des' => 'Jogo eletrônico de luta, Jogo eletrônico de esporte',
        ]);

        DB::table('Characteristic')->insert([
            'title' => 'Desenvolvedor',
            'des' => 'EA Canada',
        ]);
    }
}
