<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchEmployeeWorkingDay extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'employee_id', 'day_of_week_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    public function dayOfWeek()
    {
        return $this->belongsTo(DayOfWeek::class, 'day_of_week_id');
    }
}
