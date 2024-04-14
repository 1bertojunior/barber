<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbershop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'city_id'];
    
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
