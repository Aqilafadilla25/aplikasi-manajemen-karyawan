<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'employee_id',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

