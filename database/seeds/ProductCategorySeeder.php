<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('ProductCategory')->insert([
            'product_id' => 1,
            'category_id' => 6,
        ]);

        DB::table('ProductCategory')->insert([
            'product_id' => 2,
            'category_id' => 3,
        ]);

        DB::table('ProductCategory')->insert([
            'product_id' => 3,
            'category_id' => 2,
        ]);

        DB::table('ProductCategory')->insert([
            'product_id' => 4,
            'category_id' => 1,
        ]);

        DB::table('ProductCategory')->insert([
            'product_id' => 4,
            'category_id' => 3,
        ]);

        DB::table('ProductCategory')->insert([
            'product_id' => 1,
            'category_id' => 7,
        ]);
    }
}
