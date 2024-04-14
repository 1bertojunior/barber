<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTypes = ['SysAdmin', 'Admin', 'Funcionário', 'Cliente'];
        User::create([
            'user_type_id' => 1,
            'first_name' => 'Sys',
            'last_name' => 'Admin',
            'email' => 'sysadmin@barbereasy.com',
            'phone' => '123456780',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'user_type_id' => 2,
            'first_name' => 'Dono',
            'last_name' => 'Barbearia',
            'email' => 'dono@barbereasy.com',
            'phone' => '123456781',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'user_type_id' => 3,
            'first_name' => 'João',
            'last_name' => 'do Corte',
            'email' => 'joao@barbereasy.com',
            'phone' => '123456782',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'user_type_id' => 3,
            'first_name' => 'Jorginho',
            'last_name' => 'do Corte',
            'email' => 'jorginho@barbereasy.com',
            'phone' => '123456783',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'user_type_id' => 4,
            'first_name' => 'Mini',
            'last_name' => 'Silva',
            'email' => 'mini@barbereasy.com',
            'phone' => '123456784',
            'password' => bcrypt('password'),
        ]);

    }
}
