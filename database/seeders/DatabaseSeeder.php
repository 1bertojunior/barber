<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BranchEmployeeService;
use App\Models\BranchEmployeeWorkingDay;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(TimeSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(UserTypeSeeder::class);
        $this->call(BarbershopsTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(DaysOfWeekSeeder::class);
        $this->call(WorkingDaysSeeder::class);
        $this->call(WorkingHoursSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(BranchEmployeeWorkingDaysSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(BranchEmployeeServicesSeeder::class);
    }
}
