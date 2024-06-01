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
    ];
    protected $hidden = [
        'task_name',
        'task_desc',
        'task_checkpoints',
        'task_due',
    ];
    protected function casts(): array
    {
        return [
            'task_checkpoints' => 'array'
        ];
    }
}
