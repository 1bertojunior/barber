<?php

namespace Database\Seeders;

use App\Models\Barbershop;
use App\Models\Branch;
use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all();
        $barbershops = Barbershop::all();

        Branch::create([
            'name' => 'Barbearia',
            'barbershop_id' => 1,
            'city_id' => 1,
            'barbershop_id' => 1,
            'opening_time' => '08:00:00',
            'closing_time' => '20:00:00'
        ]);

        Branch::create([
            'name' => 'Barbearia',
            'barbershop_id' => 1,
            'city_id' => 2,
            'barbershop_id' => 1,
            'opening_time' => '08:00:00',
            'closing_time' => '17:00:00'
        ]);
    }
}
