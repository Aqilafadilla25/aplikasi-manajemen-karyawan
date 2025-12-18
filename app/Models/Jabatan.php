<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = ['nama_jabatan', 'gaji'];

    // 1 Jabatan punya banyak Employee
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
