<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Corte de Cabelo',
            'description' => 'Um serviço de corte de cabelo padrão.',
            'duration' => '00:30:00',
            'price' => 15.00 
        ]);

        Service::create([
            'name' => 'Barba',
            'description' => 'Um serviço de barba tradicional.',
            'duration' => '00:30:00',
            'price' => 10.00 
        ]);

        Service::create([
            'name' => 'Corte & Barba',
            'description' => 'Um serviço de corte de cabelo e barba tradicional.',
            'duration' => '01:00:00',
            'price' => 25.00 
        ]);

        Service::create([
            'name' => 'Corte degradê',
            'description' => 'Um serviço de corte de cabelo degradê.',
            'duration' => '01:00:00',
            'price' => 30.00 
        ]);
    }
}
