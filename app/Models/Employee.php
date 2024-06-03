<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'tasks_id',
        'user_id',
    ];
    protected $hidden = [
        'tasks_id',
        'user_id',
    ];
    protected function casts(): array
    {
        return [
            'tasks_id' => 'array',
        ];
    }
}
