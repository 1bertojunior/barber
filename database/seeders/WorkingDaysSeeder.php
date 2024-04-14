<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\DayOfWeek;
use App\Models\WorkingDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkingDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obter todas as filiais
        $branches = Branch::all();

        // Para cada filial, atribuir um conjunto de dias de funcionamento ativos
        foreach ($branches as $branch) {
            $activeDays = $this->getActiveDaysForBranch($branch->id);

            foreach (DayOfWeek::all() as $dayOfWeek) {
                $active = in_array($dayOfWeek->id, $activeDays);

                WorkingDay::create([
                    'branch_id' => $branch->id,
                    'day_of_week_id' => $dayOfWeek->id,
                    'active' => $active
                ]);
            }
        }
    }

    private function getActiveDaysForBranch($branchId)
    {
        // Definindo os dias de funcionamento ativos com base no ID da filial
        switch ($branchId) {
            case 1:
                return [1, 2, 4, 5, 7]; // Dias ativos para a filial 1
            case 2:
                return [3, 6]; // Dias ativos para a filial 2
            default:
                return []; // Por padrão, não há dias ativos
        }
    }
}
