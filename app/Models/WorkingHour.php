<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'day_of_week_id', 'opening_time', 'closing_time', 'active'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function dayOfWeek()
    {
        return $this->belongsTo(DayOfWeek::class, 'day_of_week_id');
    }

    public function hour()
    {
        return $this->belongsTo(Time::class, 'hour_id');
    }
}
