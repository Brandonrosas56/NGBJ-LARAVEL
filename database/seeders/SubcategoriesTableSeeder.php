<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subcategory;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            [
                'name' => 'Paquetes',
            ],
            [
                'name' => 'Gaseosas',
            ],
            [
                'name' => 'Jugos',
            ],
            [
                'name' => 'Dulces',
            ],
            [
                'name' => 'Enlatados',
            ],
            [
                'name' => 'Galletas',
            ],
            [
                'name' => 'Agua',
            ],

        ];
        foreach ($subcategories as $subcategory) {
            Subcategory::create([
                'name' => $subcategory['name'],
            ]);
        }
    }
}
