<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'barbershop_id', 'city_id', 'opening_time', 'closing_time'];

    public function barbershop()
    {
        return $this->belongsTo(Barbershop::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
