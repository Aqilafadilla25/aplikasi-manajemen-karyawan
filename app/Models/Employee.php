<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
<<<<<<< HEAD
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
=======
        'user_id',
        'jabatan_id',
        'nama',
        'alamat',
        'no_hp',
        'status'
    ];

    // Employee milik satu Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    // Employee punya banyak Attendance
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // Employee punya banyak Cuti
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
>>>>>>> 448fa31e99d3fefb055225e06c71d8e6a4cce79e
}
