<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingDay extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'day_of_week_id', 'active'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function dayOfWeek()
    {
        return $this->belongsTo(DayOfWeek::class);
    }
}
