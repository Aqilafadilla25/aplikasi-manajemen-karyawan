<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'position',
        'department',
        'salary',
        'status',
        'photo',
        'hire_date',
        'email',
        'phone',
    ];

    protected $casts = [
        'salary' => 'decimal:2',
        'hire_date' => 'date',
    ];
}
