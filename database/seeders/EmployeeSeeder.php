<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::insert([
            [
                'jabatan_id' => 1, // Software Engineer
                'nama'       => 'John Doe',
                'alamat'     => 'Jakarta',
                'no_hp'      => '081234567890',
                'status'     => 'aktif',
            ],
            [
                'jabatan_id' => 3, // HR Manager
                'nama'       => 'Jane Smith',
                'alamat'     => 'Bandung',
                'no_hp'      => '082233445566',
                'status'     => 'aktif',
            ],
            [
                'jabatan_id' => 4, // Accountant
                'nama'       => 'Bob Johnson',
                'alamat'     => 'Surabaya',
                'no_hp'      => '083344556677',
                'status'     => 'aktif',
            ],
            [
                'jabatan_id' => 2, // System Analyst
                'nama'       => 'Alice Brown',
                'alamat'     => 'Yogyakarta',
                'no_hp'      => '084455667788',
                'status'     => 'nonaktif',
            ],
        ]);
    }
}
