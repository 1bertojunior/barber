<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = State::all();

        foreach ($states as $state) {
            $cities = $this->getCitiesForState($state->name);



            foreach ($cities as $city) {
                City::create([
                    'name' => $city['name'],
                    'abb' => $city['abb'],
                    'state_id' => $state->id,
                ]);
            }
        }
        
    }

    private function getCitiesForState($stateName)
    {
        // Para este exemplo, algumas cidades fictícias.
        $cities = [
            'Piauí' => [
                ['name' => 'Belém do Piauí', 'abb' => 'BPI'],
                ['name' => 'Inhuma', 'abb' => 'INH'],
                ['name' => 'Padre Marcos', 'abb' => 'PDM'],
                ['name' => 'Picos', 'abb' => 'PIC'],
            ],
        ];

        return $cities[$stateName] ?? [];
    }
}
