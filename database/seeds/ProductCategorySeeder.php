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
            'category_id' => 3,
        ]);

        DB::table('ProductCategory')->insert([
            'product_id' => 1,
            'category_id' => 4,
        ]);

        DB::table('ProductCategory')->insert([
            'product_id' => 1,
            'category_id' => 5,
        ]);
    }
}
