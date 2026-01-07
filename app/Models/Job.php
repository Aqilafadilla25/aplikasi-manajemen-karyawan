<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'judul',
        'divisi',
        'lokasi',
        'tipe',
        'deskripsi',
        'status',
    ];
}
