<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'tanggal',
        'status',
        'keterangan'
    ];

    // Attendance milik satu Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
