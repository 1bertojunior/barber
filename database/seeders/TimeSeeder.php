<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    public function run()
    {
        $start = strtotime('00:00:00');
        $end = strtotime('23:59:59');

        while ($start <= $end) {
            $time = date('H:i:s', $start);
            Time::create(['time' => $time]);
            $start += 1800; // Intervalo de 30 minutos
        }
    }
}
