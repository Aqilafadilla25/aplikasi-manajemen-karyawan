<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'employee_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'alasan'
    ];

    // Cuti milik satu Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
