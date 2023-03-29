<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 1,
                'name' => 'pen',
                'price' => 100
            ],
            [
                'id' => 2,
                'name' => 'box',
                'price' => 150
            ]
        ];

        foreach($products as $product) {
            DB::table('products')->insert([
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
