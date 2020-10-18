<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTaskStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'date'
    ];

    public function dailyTask()
    {
        return $this->belongsTo('App\Models\DailyTask', 'task_id');
    }
}
