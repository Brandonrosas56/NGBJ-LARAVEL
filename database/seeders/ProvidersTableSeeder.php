<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            [
                'business_name' => 'Margarita',
                'admin_name' => 'Sandra Ortiz',
                'cellphone' => '3124005050',
                'email' => 'sandra@gmail.com',
                'address' => 'Calle 123 Cra12 # 12-78',
            ],
            [
                'business_name' => 'Cocacola',
                'admin_name' => 'Edgar Parra',
                'cellphone' => '3124505050',
                'email' => 'edgar@gmail.com',
                'address' => 'Calle 33 Cra5 # 89-2',
            ],
            [
                'business_name' => 'Jet',
                'admin_name' => 'Juan torres',
                'cellphone' => '3102805678',
                'email' => 'juan@gmail.com',
                'address' => 'Calle 85 # 74 b - 85',
            ]
        ];
        foreach ($providers as $provider) {
            Provider::create([
                'business_name' => $provider['business_name'],
                'admin_name' => $provider['admin_name'],
                'cellphone' => $provider['cellphone'],
                'email' => $provider['email'],
                'address' => $provider['address']
            ]);
        }
    }
}
