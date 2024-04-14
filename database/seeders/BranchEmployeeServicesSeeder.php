<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\BranchEmployeeService;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchEmployeeServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtenha todas as filiais, funcionários e serviços
        $branches = Branch::all();
        $employees = User::all();
        $services = Service::all();

        // Para cada combinação de filial, funcionário e serviço, crie um registro na tabela 'branch_employee_services'
        foreach ($branches as $branch) {
            foreach ($employees as $employee) {
                foreach ($services as $service) {
                    $isActive = 1;

                    BranchEmployeeService::create([
                        'branch_id' => $branch->id,
                        'employee_id' => $employee->id,
                        'service_id' => $service->id,
                        'active' => $isActive
                    ]);
                }
            }
        }
    }
}
