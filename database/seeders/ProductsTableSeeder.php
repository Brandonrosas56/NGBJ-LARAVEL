<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Papas margarita',
                'reference' => '001',
                'description' => 'Papas margarita',
                'stock' => '40',
                'price' => '2500',
                'company_id' => '1',
                'provider_id' => '1',
                'subcategory_id' => '1',
                'user_id' => '1'
            ],

            [
                'name' => 'Cocacola',
                'reference' => '002',
                'description' => 'Bebida de cocacola',
                'stock' => '25',
                'price' => '8000',
                'company_id' => '1',
                'provider_id' => '2',
                'subcategory_id' => '2',
                'user_id' => '2'
            ],
            [
                'name' => 'Chocolatina Jet',
                'reference' => '003',
                'description' => 'Chocolatina jet pequeña',
                'stock' => '12',
                'price' => '800',
                'company_id' => '1',
                'provider_id' => '3',
                'subcategory_id' => '4',
                'user_id' => '3'
            ],
        ];
        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'reference' => $product['reference'],
                'description' => $product['description'],
                'stock' => $product['stock'],
                'price' => $product['price'],
                'company_id' => $product['company_id'],
                'provider_id' => $product['provider_id'],
                'subcategory_id' => $product['subcategory_id'],
                'user_id' => $product['user_id'],

            ]);
        }
    }
}
