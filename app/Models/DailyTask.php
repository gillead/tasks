<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function getStat()
    {
        return DailyTaskStat::where('task_id', '=', $this->id)
            ->where('date', '=', date('Y-m-d'))
            ->first();
    }
}
