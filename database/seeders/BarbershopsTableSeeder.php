<?php

namespace Database\Seeders;

use App\Models\Barbershop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarbershopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barbershop::create([
            'name' => 'Barbearia Visual',
            'email' => 'contato@barbeariavisual.com',
            'phone' => '(89) 99400-0000',
            'city_id' => 1,
        ]);
    }
}
