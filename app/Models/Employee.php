<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'jabatan_id',
        'nama',
        'alamat',
        'no_hp',
        'status',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
