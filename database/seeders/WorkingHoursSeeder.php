<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Time;
use App\Models\WorkingHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkingHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obter todas as filiais
        $branches = Branch::all();

        // Obter todos os horários disponíveis
        $times = Time::all();

        // Para cada filial, criar horários de funcionamento para todos os dias da semana
        foreach ($branches as $branch) {
            $daysOfWeek = range(1, 7); // Array contendo os dias da semana de 1 a 7

            foreach ($daysOfWeek as $dayOfWeek) {
                WorkingHour::create([
                    'branch_id' => $branch->id,
                    'day_of_week_id' => $dayOfWeek,
                    'opening_time' => '08:00:00',
                    'closing_time' => '17:00:00',
                ]);
            }
        }
    }
}
