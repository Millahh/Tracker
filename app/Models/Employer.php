<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'task_name',
        'task_desc',
        'task_checkpoints',
        'task_due',
        'task_assignments',
        'file',
        'task_progress',
        'task_percentage',
    ];
    protected $hidden = [
        'task_name',
        'task_desc',
        'task_checkpoints',
        'task_due',
        'task_assignments',
        'file',
        'task_progress',
        'task_percentage',
    ];
    protected function casts(): array
    {
        return [
            'task_checkpoints' => 'array',
            'task_assignments' => 'array',
            'task_progress' => 'array',
        ];
    }
}
