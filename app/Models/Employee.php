<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
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
}
