<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('Category')->insert([
            'name' => 'Terror',
        ]);

        DB::table('Category')->insert([
            'name' => 'Luta',
        ]);

        DB::table('Category')->insert([
            'name' => 'Ação',
        ]);

        DB::table('Category')->insert([
            'name' => 'Aventura',
        ]);

        DB::table('Category')->insert([
            'name' => 'Guerra',
        ]);

        DB::table('Category')->insert([
            'name' => 'Tiro',
        ]);

        DB::table('Category')->insert([
            'name' => 'RPG',
        ]);
    }
}
