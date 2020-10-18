<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArterialPressure extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'value1',
        'value2',
        'pulse',
        'comment'
    ];

}
