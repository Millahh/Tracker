<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_name',
        'task_desc',
        'task_checkpoints',
        'task_due',
    ];
    protected $hidden = [
        'task_name',
        'task_desc',
        'task_checkpoints',
        'task_due',
    ];
}
