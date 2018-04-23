<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['Product'];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Model::unguard();

        // foreach ($this->toTruncate as $table) {
        //     DB::table($table)->truncate();
        // }

        $this->call([
            ProductSeeder::class,
            CategorySeeder::class,
        ]);

        // Model::reguard();
    }
}
