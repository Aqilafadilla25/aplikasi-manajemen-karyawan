<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Salary;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salary::create([
            'employee_id' => 1,
            'gaji_pokok' => 4000000,
            'tunjangan' => 500000,
            'potongan' => 200000,
            'total_gaji' => 4300000,
            'bulan' => now(),
        ]);
    }
}
