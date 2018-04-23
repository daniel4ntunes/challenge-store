<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['Product'];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call([
            ProductSeeder::class,
            CategorySeeder::class,
            ProductCategorySeeder::class,
        ]);
    }
}
