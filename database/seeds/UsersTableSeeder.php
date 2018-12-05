<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'name' => 'Rafael',
            'email' => 'rafael.topan.ti@gmail.com',
            'email_verified_at'=> '2018-11-23 00:00:00',
            'password' => Hash::make('teste1234'),
            'cpf' => '04027838830',
            'register_id' => '789101112',
            'full_adress' => 'Rua General Euclides de Figueiredo',
            'adress_complement' => 'Apartamento 131-Hera',
            'adress_number' => '370',
            'district' => 'SP',
            'city' => 'Praia Grande',
            'state' => 'SP',
            'postal_code' => '11700-780',
            'phone_number' => '1158210782',
            'available_whatsapp' => '1',
            'is_verified' => '1',
            'bond_id' => '1',
            'role_id' => '1',
        ]);
    }
}
