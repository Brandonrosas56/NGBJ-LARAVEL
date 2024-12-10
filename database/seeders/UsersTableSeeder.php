<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Naime',
                'surname' => 'Montoya',
                'document_number' => '1010900345',
                'address' => 'Calle 45 # 22 a - 54',
                'cellphone' => '3124314528',
                'email' => 'na@gmail.com',
                'gender' => 'femenino',
                'document_id' => '1',
                'rol_id' => '1',
                'company_id' => '1',
                'password' => 'prueba123'
            ],


            [
                'name' => 'Guillermo',
                'surname' => 'Alba',
                'document_number' => '1083814045',
                'address' => 'Cra 106 b # 74 - 58',
                'cellphone' => '3124314512',
                'email' => 'gu@gmail.com',
                'gender' => 'masculino',
                'document_id' => '2',
                'rol_id' => '2',
                'company_id' => '1',
                'password' => 'prueba123'
            ],
            [
                'name' => 'Jean',
                'surname' => 'Gomez',
                'document_number' => '1083814089',
                'address' => 'TV 41 # 84 - 52',
                'cellphone' => '3124314556',
                'email' => 'je@gmail.com',
                'gender' => 'masculino',
                'document_id' => '3',
                'rol_id' => '3',
                'company_id' => '1',
                'password' => 'prueba123'
            ],
        ];
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'surname' => $user['surname'],
                'document_number' => $user['document_number'],
                'address' => $user['address'],
                'cellphone' => $user['cellphone'],
                'email' => $user['email'],
                'gender' => $user['gender'],
                'document_id' => $user['document_id'],
                'rol_id' => $user['rol_id'],
                'company_id' => $user['company_id'],
                'password' => Hash::make($user['password']),

            ]);
        }
    }
}
