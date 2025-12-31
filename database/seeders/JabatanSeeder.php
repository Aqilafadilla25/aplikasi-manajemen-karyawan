<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        Jabatan::insert([
            [
                'division_id' => 1, // IT
                'nama_jabatan' => 'Software Engineer',
            ],
            [
                'division_id' => 1, // IT
                'nama_jabatan' => 'System Analyst',
            ],
            [
                'division_id' => 2, // HRD
                'nama_jabatan' => 'HR Manager',
            ],
            [
                'division_id' => 3, // Finance
                'nama_jabatan' => 'Accountant',
            ],
        ]);
    }
}
