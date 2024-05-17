<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'company_id' => '1',
                'product_name' => 'Harley Davidson',
                'price' => '100',
                'stock' => '3',
                'engine' => '883',
                'driving' => '5000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
        ]);
    }
}
