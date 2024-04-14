<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\BranchEmployeeWorkingDay;
use App\Models\DayOfWeek;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchEmployeeWorkingDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = Branch::all();
        $employees = User::all();
        $daysOfWeek = DayOfWeek::all();

        // Para cada filial, atribuir um conjunto de dias de funcionamento ativos para cada funcionário
        foreach ($branches as $branch) {
            foreach ($employees as $employee) {
                // Supondo que o dia de funcionamento ativo seja baseado no ID da filial
                $activeDays = $this->getActiveDaysForBranch($branch->id);

                // Criar um registro para cada dia de funcionamento ativo para o funcionário nesta filial
                foreach ($activeDays as $day) {
                    BranchEmployeeWorkingDay::create([
                        'branch_id' => $branch->id,
                        'employee_id' => $employee->id,
                        'day_of_week_id' => $day
                    ]);
                }
            }
        }
    }

    private function getActiveDaysForBranch($branchId)
    {
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
