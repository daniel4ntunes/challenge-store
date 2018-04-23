<?php

use Illuminate\Database\Seeder;

class ProductCharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('ProductCharacteristic')->insert([
            'product_id' => 1,
            'characteristic_id' => 1,
        ]);

        DB::table('ProductCharacteristic')->insert([
            'product_id' => 2,
            'characteristic_id' => 1,
        ]);

        DB::table('ProductCharacteristic')->insert([
            'product_id' => 3,
            'characteristic_id' => 2,
        ]);

        DB::table('ProductCharacteristic')->insert([
            'product_id' => 4,
            'characteristic_id' => 1,
        ]);

        DB::table('ProductCharacteristic')->insert([
            'product_id' => 3,
            'characteristic_id' => 3,
        ]);

        DB::table('ProductCharacteristic')->insert([
            'product_id' => 1,
            'characteristic_id' => 4,
        ]);

        DB::table('ProductCharacteristic')->insert([
            'product_id' => 3,
            'characteristic_id' => 5,
        ]);

        DB::table('ProductCharacteristic')->insert([
            'product_id' => 3,
            'characteristic_id' => 6,
        ]);

        DB::table('ProductCharacteristic')->insert([
            'product_id' => 3,
            'characteristic_id' => 7,
        ]);
    }
}
