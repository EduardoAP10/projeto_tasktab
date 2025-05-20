<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'difficulty',
        'xp',
        'reward',
        'due_date',
        'status',
    ];
}
