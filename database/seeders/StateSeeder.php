<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Acre', 'abb' => 'AC'],
            ['name' => 'Alagoas', 'abb' => 'AL'],
            ['name' => 'Amapá', 'abb' => 'AP'],
            ['name' => 'Amazonas', 'abb' => 'AM'],
            ['name' => 'Bahia', 'abb' => 'BA'],
            ['name' => 'Ceará', 'abb' => 'CE'],
            ['name' => 'Distrito Federal', 'abb' => 'DF'],
            ['name' => 'Espírito Santo', 'abb' => 'ES'],
            ['name' => 'Goiás', 'abb' => 'GO'],
            ['name' => 'Maranhão', 'abb' => 'MA'],
            ['name' => 'Mato Grosso', 'abb' => 'MT'],
            ['name' => 'Mato Grosso do Sul', 'abb' => 'MS'],
            ['name' => 'Minas Gerais', 'abb' => 'MG'],
            ['name' => 'Pará', 'abb' => 'PA'],
            ['name' => 'Paraíba', 'abb' => 'PB'],
            ['name' => 'Paraná', 'abb' => 'PR'],
            ['name' => 'Pernambuco', 'abb' => 'PE'],
            ['name' => 'Piauí', 'abb' => 'PI'],
            ['name' => 'Rio de Janeiro', 'abb' => 'RJ'],
            ['name' => 'Rio Grande do Norte', 'abb' => 'RN'],
            ['name' => 'Rio Grande do Sul', 'abb' => 'RS'],
            ['name' => 'Rondônia', 'abb' => 'RO'],
            ['name' => 'Roraima', 'abb' => 'RR'],
            ['name' => 'Santa Catarina', 'abb' => 'SC'],
            ['name' => 'São Paulo', 'abb' => 'SP'],
            ['name' => 'Sergipe', 'abb' => 'SE'],
            ['name' => 'Tocantins', 'abb' => 'TO'],
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
